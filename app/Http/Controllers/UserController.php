<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;

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
    public function cetak_data()
    {
        $dataRw = User::where('role', 'rw')->get();
        $data = ([
            'title'=> 'masyarakat',
            'rw' => $dataRw,
            // 'request' => $request->nama,
        ]);
        $pdf = PDF::loadview('layouts/cetak_rw', ['rw'=> $data['rw']])->setPaper('a4', 'potrait');
        return $pdf->stream('Masyarakat.pdf');
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
        $request->validate([
            'nama' => 'required',
            // 'role' =>'required',
            'agama' => 'required',
            'username' => 'required',
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'min:8'],
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            // 'ketua_rw' => 'required',
        ]);
        $data = [
            'nama' => $request->nama,
            'role' => 'rw',
            'agama' => $request->agama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
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
