<table class="table table-borderless text-center">
    <thead>
        <tr>
            <th colspan="12" class="text-center"><h2 style="align-content: center">Data Kendaraan yang sudah selesai</h2></th>
        </tr>
      <tr>          
        <th colspan="3">Nama Kategori</th>
        <th colspan="3">No polisi </th>
        <th colspan="3">Berapa jam</th>
        <th colspan="3">Jam masuk</th>
        <th colspan="3">Jam keluar</th>
        <th colspan="3">Status</th>
        <th colspan="3">Status member</th>
        
      </tr>
    </thead>

  
        
    
    <tbody id="disini">
      <div class="belom">  
        @foreach ($datas as $key )        
      <tr>
       
        <td colspan="3"><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $key->kategori->nm_kategori }}</strong></td>
        <td colspan="3">{{strtoupper($key->no_pol)  }}</td>
        <td colspan="3">{{ $key->berapajam }} Jam</td>
        <td colspan="3">{{ $key->jam_masuk }}</td>
        <td colspan="3">{{ $key->jam_keluar }}</td>
        <td colspan="3">
          @if ($key->status_keluar == NULL)
            Belum keluar
            @else
            <span class="badge bg-label-info me-1">Sudah keluar</span>
          @endif
        </td>
        <td colspan="3">
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