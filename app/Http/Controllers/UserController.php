<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserModel;


class UserController extends Controller
{
    public function index(){
        $users = UserModel::getUser();
        $title = 'Daftar Pengguna';
        return view('list_user', compact('users', 'title'));
    }

    public function create(){
        $kelas = Kelas::getKelas();
        $title = 'Tambah Pengguna Baru';

        return view('create_user', compact('kelas', 'title'));
    }

    public function edit($id){
        $user = UserModel::findOrFail($id);
        $kelas = Kelas::getKelas(); // ambil semua kelas untuk dropdown

        return view('edit_user', [
            'title' => 'Edit User',
            'user' => $user,
            'kelas' => $kelas
        ]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'nama' => 'required',
            'npm' => 'required|integer',
            'kelas_id' => 'required'
        ]);

        $user = UserModel::findOrFail($id);
        $user->update([
            'nama' => $request->input('nama'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
        ]);

        return redirect()->to('/user')->with('success','Data berhasil diperbarui!');
    }


    public function destroy($id){
        $user = UserModel::findOrFail($id);
        $user -> delete();

         return redirect()->to('/user')->with('success','Data berhasil dihapus!');
    }

    public function store(Request $request){
        UserModel::create([
            'nama' => $request->nama,
            'npm' => $request->npm,
            'kelas_id' => $request->kelas_id
        ]);

        return redirect('/user');
    }

}
