<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryMasyarakat extends Model
{
    //
    protected $table = 'tbl_history_masyarakat';
    public $timestamps = true;
    protected $fillable = [
        'nik',
        'id_masyarakat',
        'keterangan',
        'status',
        'tanggal'
    ];
    public function masyarakat()
    {
        return $this->belongsTo(masyarakat::class, 'id_masyarakat', 'id');
    }
}
