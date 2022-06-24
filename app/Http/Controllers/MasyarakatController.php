<?php

namespace App\Http\Controllers;

use App\masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasyarakatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $data = ([
            'title'=> 'kecamatan',
            'masyarakat' => masyarakat::all(),
            // 'request' => $request->nama,
        ]);
        return view('pages/admin/dashboard', $data);
    }
    public function data(Request $request)
    {
        if (Auth::user()->role == "admin") {
            $dataMas = masyarakat::where('status', 'peserta')->get();
        }else {
            $dataMas = masyarakat::where('rw', auth::user()->ketua_rw)->get();
        }

        $data = ([
            'title'=> 'Masyarakat',
            'masyarakat' => $dataMas,
            'login' => Auth::user()
            // 'request' => $request->nama_masyarakat,
            // 'url' => $request->segment(3),
        ]);
        // dd($data);
        return view('pages/admin/masyarakat/index', $data);
    }
    public function dataApprove(Request $request)
    {
        if (auth::user()->role == "admin") {
            $dataMas = masyarakat::where('status', 'approve')->Orwhere('status', 'lolos')->get();
            // $dataLolos = masyarakat::where('status', 'lolos')->get();
            // $dataMas = array_merge($dataApp, $dataLolos);
        } else {
            $dataMas = masyarakat::where('status', 'approve')->where('rw', auth::user()->ketua_rw)->get();
        }
        $data = ([
            'title'=> 'Masyarakat',
            'masyarakat' => $dataMas,
            'login' => Auth::user()
            // 'request' => $request->nama_masyarakat,
            // 'url' => $request->segment(3),
        ]);
        return view('pages/admin/masyarakat/approve', $data);
    }
    public function appData($id)
    {
        $data = masyarakat::find($id);

        $data->status = "approve";
        $data->save();

        return redirect()->to('admin/masyarakat/approve')->with('success', 'Approve data succes');
    }
    public function pesertaData($id)
    {
        $data = masyarakat::find($id);

        $data->status = "peserta";
        $data->save();

        return redirect()->to('admin/masyarakat')->with('success', 'Ajukan data succes');
    }
    public function lolosData($id)
    {
        $data = masyarakat::find($id);

        $data->status = "lolos";
        $data->save();
        // dd($data);
        return redirect()->to('admin/masyarakat/approve')->with('success', 'Lolos data succes');
    }
    public function dataPending(Request $request)
    {
        if (auth::user()->role == "admin") {
            $dataMas = masyarakat::where('status', 'pending')->get();
        } else {
            $dataMas = masyarakat::where(['status'=>'pending', 'rw' => auth::user()->ketua_rw])->get();
        }
        $data = ([
            'title'=> 'Masyarakat',
            'masyarakat' => $dataMas,
            'login' => Auth::user()
            // 'request' => $request->nama_masyarakat,
            // 'url' => $request->segment(3),
        ]);
        return view('pages/admin/masyarakat/pending', $data);
    }
    public function create(Request $request)
    {
        $data = ([
            'title'=> 'masyarakat',
            'masyarakat' => masyarakat::all(),
            // 'request' => $request->nama_masyarakat,
            // 'url' => $request->segment(3),
        ]);
        return view('pages/admin/masyarakat/create', $data);
    }
    public function store(Request $request)
    {
        // $request->validate([
        //     'nama' => 'required',
        //     'alamat' => 'required',
        //     'tanggal_lahir' => 'required',
        //     'jenjang' => 'required',
        //     'image' => 'required|max:1024',
        //     'alamat' => 'required',
        //     'posisi_masyarakat' => 'required',
        // ]);
        $data = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'rt' => $request->rt,
            'nik' => $request->nik,
            'no_kk' => $request->no_kk,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pekerjaan' => $request->pekerjaan,
            'agama' => $request->agama,
            'luas_bangunan' => $request->luas_bangunan,
            'jenis_atap' => $request->jenis_atap,
            'jenis_lantai' => $request->jenis_lantai,
            'jenis_dinding' => $request->jenis_dinding,
            'sumber_listrik' => $request->sumber_listrik,
            'sumber_air' => $request->sumber_air_minum,
            'bahan_masak' => $request->bahan_masak,
            'fasilitas_wc' => $request->fasilitas_wc,
            'lahan_tinggal' => $request->lahan_tinggal,
            'status' => "peserta",
            'rw' => auth::user()->ketua_rw,
            'musdes' => "0"
        ];
        // dd($data);
        masyarakat::create($data);
        return redirect()->to('admin/masyarakat')->with('success', 'Tambah data succes');
    }
    public function edit($id)
    {
        $data = ([
            'title' => 'Ketua Rw',
            'user' => masyarakat::find($id),
        ]);

        return view('pages/admin/masyarakat/edit', $data);
    }
    public function update($id, Request $request)
    {
        $data = masyarakat::find($id);

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
        $data = masyarakat::find($id);
        $delet = $data->delete();
        if ($delet) {
            return redirect()->to('admin/masyarakat')->with('success', 'Hapus data succes');
        }
        return redirect()->to('admin/masyarakat')->with('fail', 'Hapus data succes');
    }
}
