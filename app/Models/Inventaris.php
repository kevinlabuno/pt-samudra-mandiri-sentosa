<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    protected $tables = 'inventaris';
    protected $fillable = ['kode_ikan','nama_ikan','ukuran_ikan','net_weight','drain_weight','flakes','recovery','keadaan_ikan','jumlah'];
}
