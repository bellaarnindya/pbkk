<div class="content">
					<div class="room-section">
						<div class="container">
						<h2>Pesan Surat</h2>
						<form id="form_daftar_karyawan" method="POST" action="pesanSurat">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div>
							<center>
								<label>Keperluan</label><br>
								<select name="id_jenis">
								  <option value="JS001">Aktif Organisasi</option>
								  <option value="JS002">Anggota HMTC</option>
								  <option value="JS003">Izin Keramaian</option>
								  <option value="JS004">Pinjam Alat Musik</option>
								  <option value="JS005">Pinjam Ruangan Jurusan</option>
								  <option value="JS006">Pinjam Ruangan Luar Jurusan</option>
								</select>
							</center>
							</div>
							<br>
							<div>
							<center>
								<label>Nama Kegiatan<br></label>
								<input type="text" name="kegiatan">
							</center>
							</div>
							<br>
							<div>
							<center>
								<label>Tanggal Mulai<br></label>
								<input type="date" name="tgl_mulai">
							</center>
							<br>
							</div>
							<div>
							<center>
								<label>Tanggal Selesai<br></label>
								<input type="date" name="tgl_selesai">
							</center>
							<br>
							</div>
							<div>
							<center>
								<label>Nama Penanggungjawab<br></label>
								<input type="text" name="nama_pemohon">
							</center>
							</div>
							<br>
							<div>
							<center>
								<label>NRP Penanggungjawab<br></label>
								<input type="text" name="nrp_pemohon">
							</center>
							</div>
							<div>
							<center>
								<br>
								<input type="submit" value="Submit">
							</center>
							</div>
						</form>
						</div>
					</div>
				</div>