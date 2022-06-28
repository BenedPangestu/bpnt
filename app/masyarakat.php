<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class masyarakat extends Model
{   
    protected $table = 'tbl_masyarakat';
    public $timestamps = true;
    protected $fillable = [
        'nama',
        'alamat', 
        'tempat_lahir',
        'tanggal_lahir',
        'rt',
        'rw',
        'nik',
        'no_kk',
        'jenis_kelamin',
        'pekerjaan',
        'agama',
        'status',
        'luas_bangunan',
        'jenis_atap',
        'jenis_lantai',
        'jenis_dinding',
        'sumber_listrik',
        'sumber_air',
        'bahan_masak',
        'fasilitas_wc',
        'lahan_tinggal',
        'musdes',
        'l_musdes',
    ];
}
