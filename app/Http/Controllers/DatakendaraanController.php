<?php

namespace App\Http\Controllers;

use App\Models\datakendaraan;
use App\Models\member;
use App\Http\Requests\StoredatakendaraanRequest;
use Redirect;
use App\Http\Requests\UpdatedatakendaraanRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;
class DatakendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambah(Request $request)
    {
        $data = $request->all();
        $model = new datakendaraan;
        $model->userid = $request->userid;
        $model->no_pol = $request->no_pol;
        $model->jam_masuk = $request->jam_masuk;
        $model->berapajam = $request->jam;
        $model->id_kategori = $request->kategori;
        $model->status = $request->status;
        $validasi = Validator::make($data, [
            
            
            'status' => 'required',               
            
            'jam_masuk' => 'required',

        ]);
        if ($validasi->fails()) {
            return redirect()->route('/')->withInput()->withErrors($validasi);
        }
       
        
        $model->save(); 
        if ($request->status === 'member') {
            $member = new member;
            $member->no_pol = $request->no_pol;
            $member->save(); 
        }
        
        return redirect()->route('datakendaraan.index')->with('success','Berhasil di tambah ke pesanan anda!');
    }
      public function keluar(Request $request , $id){
        $datas = datakendaraan::where('userid', $id )->where('id_kategori', $request->id_kategori)->update(['jam_keluar' => $request->jam_keluar ,'status_keluar' => $request->status_keluar]);
        return Redirect::back()->with('success','berhasil memperbarui status anda');
      }
  
    public function index(Request $request)
    {
        $cari = $request->cari;
        $datas =  datakendaraan::with(['kategori'])->whereRelation('kategori','nm_kategori','like',"%".$cari."%")->where('userid', Auth::id())->get();
        return view('user.parkir', compact('datas'));
    }
    public function belum(Request $request)
    {
        $cari = $request->cari;
        $datas =  datakendaraan::with(['kategori'])->whereRelation('kategori','nm_kategori','like',"%".$cari."%")->where('status_keluar', NULL)->get();
        return view('admin.belum', compact('datas'));
    }
    public function sudah(Request $request)
    {
        $cari = $request->cari;
        $datas =  datakendaraan::with(['kategori'])->whereRelation('kategori','nm_kategori','like',"%".$cari."%")->where('status_keluar', 1)->get();
        return view('admin.sudah', compact('datas'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoredatakendaraanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredatakendaraanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\datakendaraan  $datakendaraan
     * @return \Illuminate\Http\Response
     */
    public function show(datakendaraan $datakendaraan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\datakendaraan  $datakendaraan
     * @return \Illuminate\Http\Response
     */
    public function edit(datakendaraan $datakendaraan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedatakendaraanRequest  $request
     * @param  \App\Models\datakendaraan  $datakendaraan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedatakendaraanRequest $request, datakendaraan $datakendaraan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\datakendaraan  $datakendaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy(datakendaraan $datakendaraan)
    {
        //
    }
}
