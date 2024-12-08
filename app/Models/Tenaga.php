<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenaga extends Model
{
    protected $table = 'tenagas';
    protected $fillable = ['skinning','kerja','jumlah'];
}
