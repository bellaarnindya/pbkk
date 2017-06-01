<div class="content">
	@if($pinjam_srt->count())
		<div class="table-responsive">
			<table class="table table-bordered table-striped 
			              table-hover table-condensed tfix">
			<thead align="center">
			<tr><td><b>No Book</b></td><td><b>Id Surat</b></td><td><b>Nama Pemesan</b></td>
			<td><b>NRP Pemesan</b></td><td><b>Tanggal Pemesanan</b></td> 
			    <td colspan="2"><b>Status</b></td></tr>
			</thead>
			@foreach($pinjam_srt as $ps)
			<tr><td>{{ $ps->no_book }}</td><td>{{ $ps->id_surat }}</td><td>{{ $ps->nama_pemesan }}</td>
			<td>{{ $ps->nrp_pemesan }}</td><td>{{ $ps->tanggal_pemesanan }}</td>
			<td align="center" width="30px">
			<a href="/listSurat/{{$ps->no_book}}" class="btn btn-warning btn-sm" 
			role="button"><i class="fa fa-pencil-square"></i> Validasi</a></td>
			</td>
			</tr>
			@endforeach
			</table>
		</div>
		@else
		<div class="alert alert-warning">
			<i class="fa fa-exclamation-triangle"></i> Tidak ada pemesanan surat
		</div>
		@endif
</div>