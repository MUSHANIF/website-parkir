<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta http-equiv="Content-Type" content="text/html" ; charset="utf-8" />
      <title>Laporan</title>
      <style>
         * {
            box-sizing: border-box;
         }

         .table {
            width: 100%;
            border-collapse: collapse;
            page-break-after: always;
         }

         .table td,
         .table th {
            text-align: center;
         }

         .table th {
            background-color: #4154F1;
            color: black;
         }

         .table tbody:nth-child(even) {
            background-color: #f5f5f5;
         }

         .title {
            color: #adadad;
            text-align: center;
         }

         .subtitle a {
            color: white;
            text-decoration: none;
            float: left;
            padding-top: 1px;
         }

         .subtitle a:hover {
            color: #dbd7e6;
            text-decoration: none;
         }

         .form-control {
         }

         .btn {
            background-color: #4154F1;
            color: white;
         }

         body {
            margin: 0;
         }
      </style>
   </head>
   <body>
      <div class="container">
        
         <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 align-self-center text-center">Laporan pdf </h2>
         
<table class="table mt-3" cellpadding="10" cellspace="0">
  
   
    <thead class="align-self-center text-center">
     
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
   
    @foreach ($datas as $key) 
    <tbody>
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
    </tbody>
    @endforeach
   

</table>
			
      </div>
   </body>
</html>
