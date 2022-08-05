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
            $masyarakat = masyarakat::where(['rt' => $rt, 'rw' => $rw])->get();
        } elseif($rt != null){
            $masyarakat = masyarakat::where('rt' , $rt)->get();
        } elseif ($rw != null) {
            $masyarakat = masyarakat::where('rw' , $rw)->get();
        }
        else {
            $masyarakat = masyarakat::all();
        }
        $data = ([
            'title'=> 'kecamatan',
            'masyarakat' => $masyarakat,
            'rt' => $request->rt,
            'rw' => $request->rw,
        ]);
        return view('pages/home', $data);
    }
}
