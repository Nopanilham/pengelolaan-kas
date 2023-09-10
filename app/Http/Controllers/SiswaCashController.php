<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cash;
use App\Http\Requests\AddBendaharaCashRequest;
use App\Http\Requests\EditBendaharaCashRequest;
use App\Kelas;
use Illuminate\Support\Facades\Auth;

class SiswaCashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('siswa.kas.index', [
            'title' => 'Data Kas ' . Auth::user()->kelas->nama,
            'data' => Cash::where('kelas_id', Auth::user()->kelas_id)->latest()->get()
        ]);
    }
}
