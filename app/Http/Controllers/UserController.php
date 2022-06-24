<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dataUser()
    {
        $data = ([
            'title' => 'Ketua Rw',
            'user' => user::where('role', 'rw')->get(),
        ]);

        return view('pages/admin/rw/dashboard', $data);
    }
    public function create()
    {
        $data = ([
            'title' => 'Ketua Rw',
            'user' => user::where('role', 'rw')->get(),
        ]);

        return view('pages/admin/rw/create', $data);
    }
    public function store(Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'role' => 'rw',
            'agama' => $request->agama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => md5($request->password),
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'ketua_rw' => $request->rw,
        ];
        // dd($data);
        $insert = user::create($data);
        if ($insert) {
            return redirect()->to('admin/user/rw')->with('success', 'Tambah data succes');
        } else{
            return redirect()->to('admin/user/rw')->with('fail', 'Tambah data Gagal');
        }
    }
    public function edit($id)
    {
        $data = ([
            'title' => 'Ketua Rw',
            'user' => user::find($id),
        ]);

        return view('pages/admin/rw/edit', $data);
    }
    public function update($id, Request $request)
    {
        $data = user::find($id);

        $data->nama = $request->nama;
        $data->agama = $request->agama;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->alamat = $request->alamat;
        $data->no_hp = $request->no_hp;
        $data->ketua_rw = $request->ketua_rw;

        // dd($data);
        $update = $data->save();
        if ($update) {
            return redirect()->to('admin/user/rw')->with('success', 'Update data succes');
        }
        return redirect()->to('admin/user/rw')->with('fail', 'Update data gagal!');
        // $data->nama = $request->nama;
        // $data->nama = $request->nama;
    }
    public function hapus($id)
    {
        $data = user::find($id);
        $delet = $data->delete();
        if ($delet) {
            return redirect()->to('admin/user/rw')->with('success', 'Hapus data succes');
        }
        return redirect()->to('admin/user/rw')->with('fail', 'Hapus data succes');
    }
}
