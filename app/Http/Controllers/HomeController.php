<?php

namespace App\Http\Controllers;
use App\Models\kategori;
use App\Models\transaksi;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index(){
        $datas = kategori::all();
        $user = Auth::id();
        $kategori =  kategori::count();
        
        
         $json = Http::get('https://newsapi.org/v2/top-headlines?=id&apiKey=c6f664254c6b4a2c8991e7ad94bf7d0b');
      $api = json_decode($json, TRUE);
        return view('welcome',compact('datas','user','api','kategori'));
    }
}
