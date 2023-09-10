<?php

namespace App\Http\Controllers;

use App\Cash;
use App\Kelas;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.laporan.index', [
            'title' => 'Laporan Kas',
            'classes' => Kelas::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'dari_bulan' => 'required',
            'ke_bulan' => 'nullable|different:dari_bulan',
            'kelas_id' => 'nullable'
        ]);

        $query = Cash::query();

        if ($request->filled('ke_bulan')) {
            $tanggal_awal = Carbon::parse($request->dari_bulan)->startOfMonth();
            $tanggal_akhir = Carbon::parse($request->ke_bulan)->endOfMonth();
        } else {
            $tanggal_awal = Carbon::parse($request->dari_bulan)->startOfMonth();
            $tanggal_akhir = Carbon::parse($request->dari_bulan)->endOfMonth();
        }

        $query->whereDate('tanggal', '>=', $tanggal_awal)
              ->whereDate('tanggal', '<=', $tanggal_akhir);

        $kelas = 'Semua';
        if ($request->filled('kelas_id')) {
            $query->where('kelas_id', $request->kelas_id);
            $kelas = Kelas::find($request->kelas_id);
            $kelas = $kelas->nama;
        }

        return view('admin.laporan.hasil', [
            'title' => 'Laporan Kas',
            'data' => $query->get(),
            'kelas' => $kelas,
            'dari_periode' => Carbon::parse($request->dari_bulan)->format('F Y'),
            'ke_periode' => Carbon::parse($request->ke_bulan)->format('F Y'),
        ]);
    }
}
