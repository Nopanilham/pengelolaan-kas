<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Kelas;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pengguna', [
            'title' => 'Data Pengguna',
            'data' => User::with('role', 'kelas')->get(),
            'roles' => Role::all(),
            'classes' => Kelas::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddUserRequest $request)
    {
        User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
            'kelas_id' => $request->kelas_id,
        ]);

        return to_route('pengguna.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, User $pengguna)
    {
        $pengguna->update([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'kelas_id' => $request->kelas_id,
        ]);

        return to_route('pengguna.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $pengguna)
    {
        $pengguna->delete();

        return to_route('pengguna.index')->with('success', 'Data berhasil dihapus');   
    }
}
