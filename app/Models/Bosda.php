<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bosda extends Model
{
    use HasFactory;
    
    protected $table = 'bosdas';

    public $timestamps = true;

    protected $fillable = [
        'sma',
        'smk',
        'slb',
    ];
}
