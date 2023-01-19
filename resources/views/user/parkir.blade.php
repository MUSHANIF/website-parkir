@php
    $today = date("Y-m-d H:i:s");                        
@endphp
@extends('layouts.home')
@section('isi')
@if ($datas->count())
  

<div class="card pb-5">
    <h5 class="card-header">Data kategori</h5>
    <div class="table-responsive text-nowrap">
      <table class="table table-borderless text-center">
        <thead>
          <tr>          
            <th>Nama Kategori</th>
            <th>No polisi </th>
            <th>Untuk berapa jam</th>
            <th>Jam masuk</th>
            <th>Status</th>
            <th>Status member</th>
            <th>Action</th>
          </tr>
        </thead>

      
            
        
        <tbody id="disini">
          <div class="belom">  
            @foreach ($datas as $key )        
          <tr>
           
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $key->kategori->nm_kategori }}</strong></td>
            <td>{{strtoupper($key->no_pol)  }}</td>
            <td>{{ $key->berapajam }} Jam</td>
            <td>{{ $key->jam_masuk }}</td>
            <td>
              @if ($key->status_keluar == NULL)
                Belum keluar
                @else
                <span class="badge bg-label-info me-1">Sudah keluar</span>
              @endif
            </td>
            <td>
              @if ($key->status == 'member' )
              <span class="badge bg-label-success me-1">Member</span>
              @else
              <span class="badge bg-label-danger me-1">Tidak Member</span>
              @endif
            </td>
         
  
            <td>
              <div class="dropdown" style="position: absolute;">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <form action="{{ url('keluar/'.$key->id) }}" method="POST" >
                    @csrf
                    <input type="hidden" name="status_keluar" value="1">
                    <input type="hidden" name="id_kategori" value="{{ $key->kategori->id }}">
                    <input type="hidden" name="jam_keluar" value="{{ $today }}">
                    <button type="submit" class="dropdown-item"><i class="bx bx-edit-alt me-1"></i>Anda sudah Keluar</button>
                    
                </form>
                 
                    
                  <form action="{{ url('kategori/'.$key->id) }}" method="POST" >
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="dropdown-item"><i class="bx bx-trash me-1"></i>Batalkan</button>
                    
                </form>
                
             
                
                
                  
                </div>
              </div>
            </td>
          </tr>
        </div>
        </tbody>
     
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Detail kategori {{  $key->name }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <div class="text-center mb-4">
              <a href="" data-bs-toggle="modal" id="kategoriDetails"  data-bs-target="#exampleModal1"><img src="" id="img" style="height: 100px; width: 150px" /></a>
            </div>
            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-xl">
                 <div class="modal-content">
                    <div class="modal-header">
                       <h5 class="modal-title text-center justify-content-center" id="exampleModalLabel">Detail Foto</h5>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                       <img src="" id="img2" style="height: 100%; width: 100%" />
                    </div>
                 </div>
              </div>
           </div>
         
          </div>
        </div>
        @endforeach
      </table>
    </div>
  </div>
  @else
  <div class="card">
    <h5 class="card-header text-center">Anda belum memesan </h5>
  </div>
  @endif
     
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
  
 



  
     
  
    <script type="text/javascript">
        var route = "{{ url('mtr') }}";
        $('#search').typeahead({
            source: function (query, process) {
                return $.get(route, {
                    query: query
                }, function (data) {
                    return process(data);
                });
            }
        });
    </script>
    
    <script>
      $(document).ready(function () {
        $('#search').on('keyup', function(){
            var value = $(this).val();
        
            
             
              $.ajax({
                type: "GET",
                url: "/kategori",
                data: {'search':value},
                dataType: "json",
                beforeSend: function() {
                    $('.belom');.show();
                } 
                success: function (data) {
                  $('#disini').text(data);
                  
                }
                
            });
            
           
        });
    });
    </script>
@endsection