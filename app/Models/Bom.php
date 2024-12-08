<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bom extends Model
{
    protected $table = 'boms';
    protected $fillable = ['kode','deskripsi','item','item','status','default'];
}
