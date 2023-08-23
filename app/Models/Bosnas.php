<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bosnas extends Model
{
    use HasFactory;

    protected $table = 'bosnas';

    public $timestamps = true;

    protected $fillable = [
        'sma',
        'smk',
        'slb',
    ];
}
