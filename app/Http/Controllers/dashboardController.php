<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\datakendaraan;
use App\Models\kategori;


use App\Models\member;
use Illuminate\Support\Facades\Http;
use Auth;

class dashboardController extends Controller
{
    public function index(Request $request) {
        return view('dashboard',[
            
            'user' => datakendaraan::where('userid','=', Auth::id())->count(),
            'kategori' => kategori::count(),
            'belum' => datakendaraan::where('status_keluar', '=', NULL)->count(),
            'sudah' => datakendaraan::where('status_keluar', '=', 1)->count(),
            
            
           
        ]);
    }
    
            

}

