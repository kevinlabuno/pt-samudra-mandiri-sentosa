<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karton extends Model
{
    protected $table = 'kartons';
    protected $fillable = ['kode','nama','ukuran','jumlah'];
}
