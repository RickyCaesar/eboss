<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggaranBos extends Model
{
    use HasFactory;

    protected $table = 'anggaran_bos';

    public $timestamps = true;

    protected $fillable = [
        'kd_rekening',
        'jenis_bos',
        'pagu',
        'email_sp'
    ];

    public function UraianRekening()
    {
        return $this->belongsTo('App\Models\KodeRekening', 'kd_rekening', 'kode_rekening');
    }
}
