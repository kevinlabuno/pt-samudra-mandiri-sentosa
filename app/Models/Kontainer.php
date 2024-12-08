<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontainer extends Model
{
    protected $table = 'kontainers';
    protected $fillable = ['kode','nama','jumlah'];
}
