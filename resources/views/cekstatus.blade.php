<div class="content">
					<div class="room-section">
						<div class="container">
						<h2>Cek Status Surat</h2>
						<form id="form_daftar_karyawan" method="POST" action="/cekSurat">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div>
							<center>
								<label>Kode Booking<br></label>
								<input type="text" name="no_book">
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