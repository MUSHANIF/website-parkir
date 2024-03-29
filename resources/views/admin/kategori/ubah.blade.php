@extends('layouts.home')
@section('isi')
<div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Ubah kategori</h5>
        {{-- <small class="text-muted float-end">Default label</small>    --}}
      </div>
      <div class="card-body">
        <form action="{{ route('kategori.update', $datas->id) }}" method="POST"  enctype="multipart/form-data" >
          @csrf
          <input type="hidden" name="_method" value="PATCH">
           
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Nama kategori</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="basic-default-name" name="nm_kategori" placeholder="Premium" value="{{ $datas->nm_kategori }}" />
            </div>
          </div>
          
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-company">Harga  per jam</label>
            <div class="col-sm-10">
              <input
                type="number"
                class="form-control"
                id="basic-default-company"
                placeholder="100.000"
                name="harga_1jam"
                value="{{ $datas->harga_1jam }}"
              />
            </div>
          </div>
         
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-phone">Image</label>
            <div class="col-sm-10">
                <input class="form-control" type="file" id="image" name="image" value="{{ $datas->image }}" />
                <img id="preview-image-before-upload"src="/assets/images/kategori/{{ $datas->image }}" alt="" style="width: 250px" class="mt-3" />
            </div>
          </div>
          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Send</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

@endsection