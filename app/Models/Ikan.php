<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ikan extends Model
{
    protected $table = 'ikans';
    protected $fillable = ['kode','nama'];
}
