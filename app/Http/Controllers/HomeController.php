<?php

namespace App\Http\Controllers;

use App\masyarakat;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function realisasi(Request $request)
    {   
        $rt = $request->rt;
        $rw = $request->rw;
        if ($rt != null && $rw != null) {
            $masyarakat = masyarakat::where(['rt' => $rt, 'rw' => $rw])->where('status', 'lolos')->get();
        } elseif($rt != null){
            $masyarakat = masyarakat::where('rt' , $rt)->where('status', 'lolos')->get();
        } elseif ($rw != null) {
            $masyarakat = masyarakat::where('rw' , $rw)->where('status', 'lolos')->get();
        }
        else {
            $masyarakat = masyarakat::where('status', 'lolos')->get();
        }
        $masyarakatValue = masyarakat::all();
        $data = ([
            'title'=> 'kecamatan',
            'masyarakat' => $masyarakat,
            'masyarakatValue' => $masyarakatValue,
            // 'rt' => $request->rt,
            // 'rw' => $request->rw,
        ]);
        return view('pages/home', $data);
    }
}
