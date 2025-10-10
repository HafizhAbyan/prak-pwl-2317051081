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

    public function store(Request $request){
        UserModel::create([
            'nama' => $request->nama,
            'npm' => $request->npm,
            'kelas_id' => $request->kelas_id
        ]);

        return redirect('/user');
    }

}
