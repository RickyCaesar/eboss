<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonfirmasiDataSatuanPendidikan extends Model
{
    use HasFactory;
    
    protected $table = 'konfirmasi_data_satuan_pendidikan';

    public $timestamps = true;

    protected $fillable = [
        'konfirmasi',
        'author',
        'status_k',
        'verifikator',
        'updated_at'
    ];

    public function Author()
    {
        return $this->belongsTo('App\Models\User', 'author', 'email');
    }

    public function Verifikator()
    {
        return $this->belongsTo('App\Models\User', 'verifikator', 'email');
    }

    public function KabKot()
    {
        return $this->belongsTo('App\Models\DataPokokPendidikan', 'author', 'npsn');
    }
}
