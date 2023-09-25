<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPokokPendidikan extends Model
{
    use HasFactory;
    
    protected $table = 'data_pokok_pendidikan';

    public $timestamps = true;

    protected $fillable = [
        'satuan_pendidikan',
        'npsn',
        'bentuk_pendidikan',
        'kab_kota_sp',
        'status',
        'peserta_didik',
        'pagu_bosnas',
        'pagu_bosda',
    ];
}
