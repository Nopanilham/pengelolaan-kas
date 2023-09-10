<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Http\Requests\StoreKelasRequest;
use App\Http\Requests\UpdateKelasRequest;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.kelas', [
            'title' => 'Data Kelas',
            'data' => Kelas::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKelasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKelasRequest $request)
    {
        Kelas::create([
            'nama' => $request->nama,
            'slug' => str($request->nama)->slug()
        ]);

        return to_route('kelas.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKelasRequest  $request
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKelasRequest $request, Kelas $kela)
    {
        $kela->update([
            'nama' => $request->nama,
            'slug' => str($request->nama)->slug()
        ]);

        return to_route('kelas.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kela)
    {
        $kela->delete();

        return to_route('kelas.index')->with('success', 'Data berhasil dihapus');
    }
}
