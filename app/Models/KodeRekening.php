<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodeRekening extends Model
{
    use HasFactory;
    
    protected $table = 'kode_rekening';

    public $timestamps = true;

    protected $fillable = [
        'kode_rekening',
        'uraian_rekening',
        'keterangan'
    ];
}
