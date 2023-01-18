<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\datakendaraan;

use PDF;
use App\Exports\DataExport;
class laporanController extends Controller
{
    public function excel(){
      
        return Excel::download(new DataExport, 'datasudah.xlsx');
      
    }
    public function pdf(){
       
       $datas =  datakendaraan::with(['kategori'])->where('status_keluar', 1)->get();
        $pdf = PDF::loadview('admin.pdf', compact('datas'));
        return $pdf->download('laporanpdf.pdf');
       
    }
}
