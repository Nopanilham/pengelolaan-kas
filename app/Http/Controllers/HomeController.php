<?php

namespace App\Http\Controllers;

use App\Cash;
use App\Kelas;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [];

        $kelas = Kelas::all();
        foreach ($kelas as $kls) {
            $res['kelas'] = $kls->nama;

            $kas = Cash::where('kelas_id', $kls->id)->get();
            $total = 0;
            foreach ($kas as $k) {
                if ($k->tipe == 'masuk') {
                    $total = $total + $k->jumlah;
                } else {
                    $total = $total - $k->jumlah;
                }
            }

            $res['nominal'] = "IDR " . number_format($total, 0, ',', '.');

            array_push($data, $res);
        }

        $jumlah_kelas = Kelas::count();
        $jumlah_transaksi_kas = Cash::count();
        $jumlah_transaksi_kas_masuk = Cash::where('tipe', 'masuk')->count();
        $jumlah_transaksi_kas_keluar = Cash::where('tipe', 'keluar')->count();

        return view('home', compact('data', 'jumlah_kelas', 'jumlah_transaksi_kas', 'jumlah_transaksi_kas_masuk', 'jumlah_transaksi_kas_keluar'));
    }
}
