@extends('layouts.home')
@section('coba')
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
@endsection
@section('search')

<div class="navbar-nav align-items-center">
    <div class="nav-item d-flex align-items-center">
      <i class="bx bx-search fs-4 lh-0"></i>
      <form action="{{ url('sudah') }}" method="GET">
      <input
        type="text"
        class="form-control border-0 shadow-none col-md-12"
        placeholder="Search..."
      
        name="cari"
        id="search"
      />
    </form>
    </div>
  </div>
@endsection
@section("button")
<a href="/pdf" class="btn btn-danger text-end">Download pdf</a>
<a href="/excel" class="btn btn-success text-end">Download excel</a>
@endsection
@section('title')
<h1 class="mb-0 fw-bold">List kategori</h1> 
@endsection
@section('isi')
<div class="card pb-5">
    <h5 class="card-header">Data kategori</h5>
    <div class="table-responsive text-nowrap">
      <table class="table table-borderless text-center">
        <thead>
          <tr>          
            <th>Nama Kategori</th>
            <th>No polisi </th>
            <th>Berapa jam</th>
            <th>Jam masuk</th>
            <th>Jam keluar</th>
            <th>Status</th>
            <th>Status member</th>
            
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
            <td>{{ $key->jam_keluar }}</td>
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
         
  
           
          </tr>
        </div>
        </tbody>
     
        
        @endforeach
      </table>
    </div>
  </div>
     
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
