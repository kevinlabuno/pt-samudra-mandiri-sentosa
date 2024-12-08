<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kaleng extends Model
{
    protected $table = 'kalengs';
    protected $fillable = ['kode','nama','ukuran'];
}
