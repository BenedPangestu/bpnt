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
            $dataMas = masyarakat::where('status', 'calon')->get();
        } else {
            $dataMas = masyarakat::where('rw', Auth::user()->ketua_rw)->get();
        }
        $data = ([
            'title'=> 'masyarakat',
            'masyarakat' => $dataMas,
            'masyarakatApprove' => masyarakat::where('status', 'approve')->get(),
            'masyarakatPending' => masyarakat::where('status', 'pending')->get(),
            'masyarakatTolak' => masyarakat::where('status', 'tolak')->get(),
            // 'request' => $request->nama,
        ]);
        return view('pages/admin/dashboard', $data);
    }
    public function detail($id)
    {
        $data = masyarakat::where('id', $id)->first();
        return json_encode($data);
    }
}
