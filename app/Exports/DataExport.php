<?php

namespace App\Exports;

use App\Models\datakendaraan;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
class DataExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
  
    public function view(): View
    {
        return view('admin.excel', [
            'datas' =>  datakendaraan::with(['kategori'])->where('status_keluar', 1)->get()
        ]);
    }
}
