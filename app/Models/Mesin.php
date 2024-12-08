<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mesin extends Model
{ 
    protected $table = 'mesins';
    protected $fillable = ['kode','kapasitas','efesiensi'];
}
