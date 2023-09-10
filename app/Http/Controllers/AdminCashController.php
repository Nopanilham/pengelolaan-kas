<?php

namespace App\Http\Controllers;

use App\Cash;
use App\Http\Requests\AddAdminCashRequest;
use App\Http\Requests\EditAdminCashRequest;
use App\Kelas;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Nullable;

class AdminCashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.kas.index', [
            'title' => 'Data Kas',
            'data' => Cash::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kas.create', [
            'title' => 'Tambah Data',
            'classes' => Kelas::all(),
            'students' => User::with('kelas')->where('role_id', 3)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddAdminCashRequest $request)
    {
        Cash::create([
            'tipe' => $request->tipe,
            'kode' => $request->kode,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'jumlah' => $request->jumlah,
            'kelas_id' => $request->kelas_id,
            'user_id' => Auth::id(),
        ]);

        return to_route('admin-kas.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cash $admin_ka)
    {
        // return $admin_ka;
        return view('admin.kas.edit', [
            'title' => 'Ubah Data',
            'classes' => Kelas::all(),

            'data' => $admin_ka
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditAdminCashRequest $request, Cash $admin_ka)
    {
        $admin_ka->update([
            'tipe' => $request->tipe,
            'kode' => $request->kode,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'jumlah' => $request->jumlah,
            'kelas_id' => $request->kelas_id,
            'user_id' => Auth::id(),
        ]);

        return to_route('admin-kas.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cash $admin_ka)
    {
        $admin_ka->delete();

        return to_route('admin-kas.index')->with('success', 'Data berhasil dihapus');
    }
}
