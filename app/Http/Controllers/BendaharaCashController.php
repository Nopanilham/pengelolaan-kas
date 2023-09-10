<?php

namespace App\Http\Controllers;

use App\Cash;
use App\Http\Requests\AddBendaharaCashRequest;
use App\Http\Requests\EditBendaharaCashRequest;
use App\Kelas;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BendaharaCashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bendahara.kas.index', [
            'title' => 'Data Kas ' . Auth::user()->kelas->nama,
            'data' => Cash::where('kelas_id', Auth::user()->kelas_id)->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bendahara.kas.create', [
            'title' => 'Tambah Data Kas ' . Auth::user()->kelas->nama,
            'classes' => Kelas::all(),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddBendaharaCashRequest $request)
    {
        Cash::create([
            'tipe' => $request->tipe,
            'kode' => $request->kode,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'jumlah' => $request->jumlah,
            'kelas_id' => Auth::user()->kelas_id,
            'user_id' => Auth::id(),
        ]);

        return to_route('bendahara-kas.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cash $bendahara_ka)
    {
        return view('bendahara.kas.edit', [
            'title' => 'Ubah Data Kas ' . Auth::user()->kelas->nama,
            'classes' => Kelas::all(),

            'data' => $bendahara_ka
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditBendaharaCashRequest $request, Cash $bendahara_ka)
    {
        $bendahara_ka->update([
            'tipe' => $request->tipe,
            'kode' => $request->kode,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'jumlah' => $request->jumlah,
            'kelas_id' => Auth::user()->kelas_id,
            'user_id' => Auth::id(),
        ]);

        return to_route('bendahara-kas.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cash $bendahara_ka)
    {
        $bendahara_ka->delete();

        return to_route('bendahara-kas.index')->with('success', 'Data berhasil dihapus');
    }
}
