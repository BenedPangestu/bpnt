<?php

namespace App\Http\Controllers;

use App\masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {   
        if (auth::user()->role == "admin") {
            $dataMas = masyarakat::where('status', 'calon')->orderBy('id', 'desc')->get();
            $dataApp = masyarakat::where('status', 'approve')->get();
            $dataPend = masyarakat::where('status', 'pending')->get();
            $dataTolak = masyarakat::where('status', 'tolak')->get();
            $dataJum = masyarakat::all();
        } else {
            $dataMas = masyarakat::where('rw', Auth::user()->ketua_rw)->orderBy('id', 'desc')->get();
            $dataApp = masyarakat::where(['rw' => Auth::user()->ketua_rw, 'status' => 'approve'])->get();
            $dataPend = masyarakat::where(['rw' => Auth::user()->ketua_rw, 'status' => 'pending'])->get();
            $dataTolak = masyarakat::where(['rw' => Auth::user()->ketua_rw, 'status' => 'tolak'])->get();
            $dataJum = masyarakat::where('rw', Auth::user()->ketua_rw)->get();
        }
        $data = ([
            'title'=> 'masyarakat',
            'masyarakat' => $dataMas,
            'masyarakatJumlah'=> $dataJum,
            'masyarakatApprove' => $dataApp,
            'masyarakatPending' => $dataPend,
            'masyarakatTolak' => $dataTolak,
            // 'request' => $request->nama,
        ]);
        return view('pages/admin/dashboard', $data);
    }
    public function detail($id)
    {
        $data = masyarakat::with('history')->where('id', $id)->first();
        return json_encode($data);
    }
}
