<?php

namespace App\Http\Controllers;

use App\masyarakat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $data = ([
            'title'=> 'masyarakat',
            'masyarakat' => masyarakat::all(),
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
