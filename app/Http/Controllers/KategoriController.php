<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Http\Requests\StorekategoriRequest;
use App\Http\Requests\UpdatekategoriRequest;
use Illuminate\Http\Request;
class KategoriController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->cari;
        $datas =  kategori::where('nm_kategori','like',"%".$cari."%")->get();
        return view('admin.kategori.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function create()
    {
        $datas =  DB::table('kategoris')->get();
        return view('admin.kategori.create', compact('datas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorekategoriRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $model = new kategori;
      
        $model->nm_kategori = $request->nm_kategori;
        $model->harga_1jam = $request->harga_1jam;
        $validasi = Validator::make($data, [
            'nm_kategori' => 'required|max:191|unique:kategoris',
            'harga_1jam' => 'required|max:191',
        ]);
        if ($validasi->fails()) {
            return redirect()->route('kategori.create')->withInput()->withErrors($validasi);
        }
       
        $model->save();

        toastr()->success('Berhasil di buat!', 'Sukses');
        return redirect('/kategori');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datas = kategori::find($id);
        return view('admin.kategori.ubah',compact('datas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatekategoriRequest  $request
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatekategoriRequest $request, kategori $kategori)
    {
        $data = $request->all();
        $model =  kategori::findOrFail($id);
      
        $model->nm_kategori = $request->nm_kategori;
        $model->harga_1jam = $request->harga_1jam;
        $validasi = Validator::make($data, [
            'nm_kategori' => 'required|max:191|unique:kategoris',
            'harga_1jam' => 'required|max:191',
        ]);
        if ($validasi->fails()) {
            return redirect()->route('kategori.edit')->withInput()->withErrors($validasi);
        }
       
        $model->save();

        toastr()->success('Berhasil di buat!', 'Sukses');
        return redirect('/kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = kategori::find($id);
        $hapus->delete();
        toastr()->info('Berhasil di hapus!', 'Sukses');
        return redirect('kategori');
    }

}
