<?php

namespace App\Http\Controllers;

use App\Cash;
use App\Mutasi;
use App\Http\Requests\StoreMutasiRequest;
use App\Http\Requests\UpdateMutasiRequest;
use App\Kelas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MutasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.mutasi.index', [
            'title' => 'Data Mutasi',
            'data' => Mutasi::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mutasi.create', [
            'title' => 'Tambah Data',
            'classes' => Kelas::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMutasiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMutasiRequest $request)
    {
        // hitung nominal berasal dari_kelas
        $sumber = Cash::where('kelas_id', $request->dari_kelas)->get();

        $nominal = 0;

        foreach ($sumber as $d) {
            if ($d->tipe == 'masuk') {
                $nominal = $nominal + $d->jumlah;
            } else {
                $nominal = $nominal - $d->jumlah;
            }
        }

        DB::beginTransaction();

        try {
            $kode_mutasi = Hash::make($request->dari_kelas.'-'.$request->ke_kelas.'-'.now());
            $kelas_sumber = Kelas::find($request->dari_kelas);
            $kelas_tujuan = Kelas::find($request->ke_kelas);

            // input data keluar
            Cash::create([
                'tipe' => 'keluar',
                'kode' => 'mutasi',
                'kode_mutasi' => $kode_mutasi,
                'tanggal' => now(),
                'keterangan' => 'Mutasi keluar ke ' . $kelas_tujuan->nama,
                'jumlah' => $nominal,
                'user_id' => Auth::id(),
                'kelas_id' => $request->dari_kelas
            ]);

            // input data masuk
            Cash::create([
                'tipe' => 'masuk',
                'kode' => 'mutasi',
                'kode_mutasi' => $kode_mutasi,
                'tanggal' => now(),
                'keterangan' => 'Mutasi masuk dari ' . $kelas_sumber->nama,
                'jumlah' => $nominal,
                'user_id' => Auth::id(),
                'kelas_id' => $request->ke_kelas
            ]);

            // input mutasi
            Mutasi::create([
                'kode_mutasi' => $kode_mutasi,
                'dari_kelas' => $request->dari_kelas,
                'ke_kelas' => $request->ke_kelas,
                'nominal' => $nominal,
                'user_id' => Auth::id(),
            ]);

            DB::commit();

            return to_route('mutasi.index')->with('success', 'Data berhasil ditambahkan');
        } catch (\Exception $ex) {
            //throw $th;
            DB::rollBack();
            return to_route('mutasi.index')->with('success', 'Error: ' . $ex->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mutasi  $mutasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mutasi $mutasi)
    {
        Cash::where('kode_mutasi', $mutasi->kode_mutasi)->delete();

        $mutasi->delete();

        return to_route('mutasi.index')->with('success', 'Data berhasil dihapus');
    }
}
