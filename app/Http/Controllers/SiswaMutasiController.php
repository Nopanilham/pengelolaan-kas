<?php

namespace App\Http\Controllers;

use App\Cash;
use App\Http\Requests\StoreBendaharaMutasiRequest;
use App\Mutasi;
use App\Http\Requests\StoreMutasiRequest;
use App\Http\Requests\UpdateMutasiRequest;
use App\Kelas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SiswaMutasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('siswa.mutasi.index', [
            'title' => 'Data Mutasi ' . Auth::user()->kelas->nama,
            'data' => Mutasi::where('dari_kelas', Auth::user()->kelas_id)->orWhere('ke_kelas', Auth::user()->kelas_id)->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
}
