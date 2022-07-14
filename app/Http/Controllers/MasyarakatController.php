<?php

namespace App\Http\Controllers;

use App\HistoryMasyarakat;
use App\masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;
class MasyarakatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $data = ([
            'title'=> 'masyarakat',
            'masyarakat' => masyarakat::all(),
            // 'request' => $request->nama,
        ]);
        return view('pages/admin/dashboard', $data);
    }
    public function dataCetak(Request $request)
    {   
        $url = url()->previous();
        $pecah = explode('/', $url);
        // dd($pecah);
        if (count($pecah) <= 5) {
            if (Auth::user()->role == "admin") {
                $dataMas = masyarakat::where('status', 'peserta')->get();
            }else {
                $dataMas = masyarakat::where(['rw' => auth::user()->ketua_rw, 'status' => 'peserta'])->get();
            }
        } elseif (count($pecah) >= 5) {
            if ($pecah['5'] == "approve") {
                if (auth::user()->role == "admin") {
                    $dataMas = masyarakat::where('status', 'approve')->Orwhere('status', 'lolos')->orderBy('status', 'desc')->get();
                } else{
                    $dataMas = masyarakat::where(['status'=> 'approve', 'rw' => auth::user()->ketua_rw])->Orwhere('status', 'lolos')->get();
                }
            } elseif ($pecah['5'] == "pending") {
                if (auth::user()->role == "admin") {
                    $dataMas = masyarakat::where('status', 'pending')->get();
                } else {
                    $dataMas = masyarakat::where(['status'=>'pending', 'rw' => auth::user()->ketua_rw])->get();
                }
            }
        }
        $data = ([
            'title'=> 'masyarakat',
            'masyarakat' => $dataMas,
            // 'request' => $request->nama,
        ]);
        $pdf = PDF::loadview('layouts/cetak', ['masyarakat'=> $data['masyarakat']])->setPaper('a4', 'potrait');
        return $pdf->stream('Masyarakat.pdf');
    }
    public function data(Request $request)
    {
        if (Auth::user()->role == "admin") {
            $dataMas = masyarakat::where('status', 'peserta')->orderBy('id', 'desc')->get();
        }else {
            $dataMas = masyarakat::where('rw', auth::user()->ketua_rw)->where('status', 'peserta')->orderBy('id', 'desc')->get();
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
    public function dataHistory()
    {
        if (Auth::user()->role == "admin") {
            $dataMas = HistoryMasyarakat::with('masyarakat')->get();
            $data = masyarakat::all();
        }else {
            $dataMas = masyarakat::where('rw', auth::user()->ketua_rw)->where('status', 'calon')->orderBy('id', 'desc')->get();
            $data = masyarakat::all();
            
        }

        $data = ([
            'title'=> 'Masyarakat',
            'history' => $dataMas,
            'masyarakat' => $data,
            'login' => Auth::user(),
            'tanggal' => Carbon::parse($dataMas[1]->created_at)->translatedFormat('l, d  F Y') ,
            // 'url' => $request->segment(3),
        ]);
        // dd($data);

        return view('pages/admin/masyarakat/history', $data);
    }
    public function historyData($id)
    {
        # code...
        $dataMas = HistoryMasyarakat::with('masyarakat')->where('id_masyarakat', $id)->get();
        return json_encode($dataMas);
    }
    public function dataApprove(Request $request)
    {
        if (auth::user()->role == "admin") {
            $dataMas = masyarakat::where('status', 'approve')->Orwhere('status', 'lolos')->orderBy('status', 'desc')->get();
            // $dataLolos = masyarakat::where('status', 'lolos')->get();
            // $dataMas = array_merge($dataApp, $dataLolos);
        } else {
            $dataMas = masyarakat::where(['status'=> 'approve', 'rw' => auth::user()->ketua_rw])->Orwhere('status', 'lolos')->orderBy('status', 'desc')->get();
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
        $data->musdes = "1";
        $data->save();
        
        $dataHistory = [
            'tanggal' => date(now()),
            'id_masyarakat' => $data['id'],
            'nik' => $data['nik'],
            'keterangan' => 'lolos dalam musdes',
            'status' => $data['status'],
        ];
        HistoryMasyarakat::create($dataHistory);

        return redirect()->to('admin/masyarakat/approve')->with('success', 'Approve data succes');
    }
    public function pendData($id)
    {
        $data = masyarakat::find($id);

        $data->status = "pending";
        $data->save();
        
        $dataHistory = [
            'tanggal' => date(now()),
            'id_masyarakat' => $data['id'],
            'nik' => $data['nik'],
            'keterangan' => 'data di kembalikan ke rw',
            'status' => $data['status'],
        ];
        HistoryMasyarakat::create($dataHistory);

        return redirect()->to('admin/masyarakat')->with('success', 'Pending data succes');
    }
    public function calpesData($id)
    {
        $data = masyarakat::find($id);

        $data->status = "peserta";
        $data->save();
        $dataHistory = [
            'tanggal' => date(now()),
            'id_masyarakat' => $data['id'],
            'nik' => $data['nik'],
            'keterangan' => 'data di jadikan peserta musdes',
            'status' => $data['status'],
        ];
        HistoryMasyarakat::create($dataHistory);

        return redirect()->to('admin/masyarakat')->with('success', 'Pending data succes');
    }
    public function pesData($id)
    {
        $data = masyarakat::find($id);

        $data->status = "peserta";
        $data->l_musdes = "1";
        $data->save();
        
        $dataHistory = [
            'tanggal' => date(now()),
            'id_masyarakat' => $data['id'],
            'nik' => $data['nik'],
            'keterangan' => 'data di jadikan peserta musdes',
            'status' => $data['status'],
        ];
        HistoryMasyarakat::create($dataHistory);

        return redirect()->to('admin/masyarakat')->with('success', 'Pending data succes');
    }
    public function pesertaData($id)
    {
        $data = masyarakat::find($id);

        $data->status = "peserta";
        $data->musdes = "1";
        $data->save();
        $dataHistory = [
            'tanggal' => date(now()),
            'id_masyarakat' => $data['id'],
            'nik' => $data['nik'],
            'keterangan' => 'data di jadikan peserta musdes',
            'status' => $data['status'],
        ];
        HistoryMasyarakat::create($dataHistory);
        
        return redirect()->to('admin/masyarakat')->with('success', 'Ajukan data succes');
    }
    public function lolosData($id)
    {
        $data = masyarakat::find($id);

        $data->status = "lolos";
        $data->save();
        $dataHistory = [
            'tanggal' => date(now()),
            'id_masyarakat' => $data['id'],
            'nik' => $data['nik'],
            'keterangan' => 'data tercantum di kementrian',
            'status' => $data['status'],
        ];
        HistoryMasyarakat::create($dataHistory);
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
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'rt' => 'required',
            'nik' => 'required|unique:tbl_masyarakat',
            'no_kk' => 'required',
            'jenis_kelamin' => 'required',
            'pekerjaan' => 'required',
            'agama' => 'required',
            'luas_bangunan' => 'required',
            'jenis_atap' => 'required',
            'jenis_lantai' => 'required',
            'jenis_dinding' => 'required',
            'sumber_listrik' => 'required',
            'sumber_air_minum' => 'required',
            'bahan_masak' => 'required',
            'fasilitas_wc' => 'required',
            'lahan_tinggal' => 'required'
        ]);
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
            'status' => "calon",
            'rw' => auth::user()->ketua_rw,
            'musdes' => "0"
        ];
        // dd($data);
        $create = masyarakat::create($data);
        $dataHistory = [
            'tanggal' => date(now()),
            'id_masyarakat' => $create['id'],
            'nik' => $create['nik'],
            'keterangan' => 'data menjadi calon',
            'status' => $create['status'],
        ];
        HistoryMasyarakat::create($dataHistory);
        if ($create) {
            return redirect()->to('admin/masyarakat')->with('success', 'Tambah data succes');
        } else {
            return redirect()->to('admin/masyarakat')->with('fail', 'Tambah data gagal');
        }
    }
    public function edit($id)
    {
        $data = ([
            'title' => 'Masyarakat',
            'user' => masyarakat::find($id),
        ]);

        return view('pages/admin/masyarakat/edit', $data);
    }
    public function update($id, Request $request)
    {
        $data = masyarakat::find($id);

        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->rt = $request->rt;
        $data->nik = $request->nik;
        $data->no_kk = $request->no_kk;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->pekerjaan = $request->pekerjaan;
        $data->agama = $request->agama;
        $data->luas_bangunan = $request->luas_bangunan;
        $data->jenis_atap = $request->jenis_atap;
        $data->jenis_lantai = $request->jenis_lantai;
        $data->jenis_dinding = $request->jenis_dinding;
        $data->sumber_listrik = $request->sumber_listrik;
        $data->sumber_air = $request->sumber_air_minum;
        $data->bahan_masak = $request->bahan_masak;
        $data->fasilitas_wc = $request->fasilitas_wc;
        $data->lahan_tinggal = $request->lahan_tinggal;
        // dd($data);
        $update = $data->save();
        if ($update) {
            return redirect()->to('admin/dashboard')->with('success', 'Update data succes');
        }
        return redirect()->to('admin/dashboard')->with('fail', 'Update data gagal!');
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
