<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Permohonan Peminjaman</h2>
   
  @if($data['pinjam_inv']->count())
  <table class="table">
    <thead>
      <tr>
        <th>Kode Booking</th>
        <th>Nama Inventaris</th>
        <th>Nama Pemesan</th>
        <th>NRP Pemesan</th>
        <th>Tanggal Pemesanan</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data['pinjam_inv'] as $p)
      <tr>
        <td>{{$p->no_book}}</td>
        <td>{{$p->nama_inventaris}}</td>
        <td>{{$p->nama_pemesan}}</td>
        <td>{{$p->nrp_pemesan}}</td>
        <td>{{$p->tanggal_pemesanan}}</td>
        <td><a href="{{url('')}}/listInven/pinjam/{{$p->no_book}}" class="btn btn-warning btn-sm" 
    role="button"><i class="fa fa-pencil-square"></i>Edit</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @endif
</div>

<div class="container">
  <h2>Pengembalian Peminjaman</h2>
   
  @if($data['kembali_inv']->count())
  <table class="table">
    <thead>
      <tr>
        <th>Kode Booking</th>
        <th>Nama Inventaris</th>
        <th>Nama Pemesan</th>
        <th>NRP Pemesan</th>
        <th>Tanggal Pemesanan</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data['kembali_inv'] as $k)
      <tr>
        <td>{{$k->no_book}}</td>
        <td>{{$k->nama_inventaris}}</td>
        <td>{{$k->nama_pemesan}}</td>
        <td>{{$k->nrp_pemesan}}</td>
        <td>{{$k->tanggal_pemesanan}}</td>
        <td><a href="/listInven/kembali/{{$k->no_book}}" class="btn btn-warning btn-sm" 
    role="button"><i class="fa fa-pencil-square"></i>Edit</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @endif
</div>

</body>
</html>
