<?php

namespace App\Http\Controllers;

use App\masyarakat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $data = ([
            'title'=> 'kecamatan',
            'masyarakat' => masyarakat::all(),
            // 'request' => $request->nama,
        ]);
        return view('pages/admin/dashboard', $data);
    }
}
