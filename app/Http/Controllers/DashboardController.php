<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Santri;
use App\Tagihan;
use App\Kamar;
use App\Kelas;

class DashboardController extends Controller
{
    public function index()
    {
        $santri = Santri::all();

        
        $data['s'] = count($santri);

        return view('dashboard', $data);

    }
}
