<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventaris;
use App\Models\Bom;
use App\Models\Ikan;

class BerandaController extends Controller
{
    public function index()
    {
        // Hitung total data dari masing-masing model
        $totalInventaris = Inventaris::count();
        $totalBom = Bom::count();
        $totalIkan = Ikan::count();

        return view('beranda', [
            'totalInventaris' => $totalInventaris,
            'totalBom' => $totalBom,
            'totalIkan' => $totalIkan,
        ]);
    }
}
