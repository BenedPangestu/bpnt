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
        $data = ([
            'title'=> 'Masyarakat',
            'masyarakat' => masyarakat::all(),
            'login' => Auth::user()
            // 'request' => $request->nama_masyarakat,
            // 'url' => $request->segment(3),
        ]);
        return view('pages/admin/masyarakat/index', $data);
    }
    public function dataApprove(Request $request)
    {
        $data = ([
            'title'=> 'Masyarakat',
            'masyarakat' => masyarakat::where('status', 'approve')->get(),
            'login' => Auth::user()
            // 'request' => $request->nama_masyarakat,
            // 'url' => $request->segment(3),
        ]);
        return view('pages/admin/masyarakat/approve', $data);
    }
    public function dataPending(Request $request)
    {
        $data = ([
            'title'=> 'Masyarakat',
            'masyarakat' => masyarakat::where('status', 'pending')->get(),
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
            'rt' => $request->rt,
            'rw' => $request->rw,
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
            'status' => "pending",
        ];
        masyarakat::create($data);
        return redirect()->to('admin/masyarakat')->with('success', 'Tambah data succes');
    }
}
