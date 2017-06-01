<html>
    <head>
        <link rel="stylesheet" type="text/css" href="{{url('')}}/css/kube.min.css">
        <link rel="stylesheet" type="text/css" href="{{url('')}}/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="{{url('')}}/css/siadkeu.css">
        <link rel="icon" href="{{url('')}}/img/favicon.png" type="image/png">
<!--        <meta id="token" name="token" value="{{ csrf_token() }}">-->

        <title>SIADKEU HMTC</title>
    </head>
    <body>
        
        <div id="app">
            
            
            
            <div :class="navbar">
                <div class="container">
                    <h3 style="color:#fff; margin-bottom:0" v-if="state == 1">Selamat Datang di</h3>
                    <h1 style="color:#fff; margin-bottom:2rem" :style="sistemInformasi"><span class="backButton" v-if="state != 1" @click="back()"><i class="fa fa-chevron-left"></i></span>Sistem Informasi Administrasi & Keuangan HMTC</h1>
                    <span :class="pillClass"><b>@{{state}}. @{{pillContent}}</b></span>
                </div>
            </div>
            <div class="container-super">
                <div v-if="state == 1">
                    <div class="layanan surat" @click="showLayanan('surat')">
                        <i class="fa fa-edit fa-5x siad-col"></i>
                        <h3 style="margin-top:0.5rem">Pembuatan Surat</h3>
                        <center><hr style="width:5rem; border-width:3px"></center>
                        <p>Layanan kepada anggota HMTC untuk keperluan pengantar, perizinan, rekomendasi, keterangan, dsb.</p>
                    </div>
                    <div class="layanan inven" @click="showLayanan('inven')">
                        <i class="fa fa-cube fa-5x siad-col"></i>
                        <h3 style="margin-top:0.5rem">Peminjaman Inventaris</h3>
                        <center><hr style="width:5rem; border-width:3px"></center>
                        <p style="font-size:">Layanan untuk peminjaman inventaris HMTC, seperti: Ruang HIMA, LCD, peralatan olahraga, dan lain-lain</p>
                    </div>
                    <div class="or">or</div>
                </div>
                
                
                <div v-else-if="state > 1" class="layanan-big">
                    <transition name="slide">
                        <div v-if="state == 2">
                            <div v-if="isSurat">
                                <div class="row gutters align-center" style="margin-top:3rem">
                                    <div class="col col-5">
                                        <center>
                                            <h4>Saya sudah memiliki kode booking surat</h4>
                                            <p>Silahkan masukan kode booking surat untuk memeriksa apakah permohonan surat anda sudah disetujui</p>
                                            <form>
                                                <input type="text" placeholder="Kode Booking Surat" style="margin-bottom:0.7rem">
                                                <a href="#!" class="button primary w100" @click="statusCheck()">Periksa Kode Booking Surat</a>
                                            </form>
                                        </center>
                                    </div>
                                    <div class="col col-1">
                                    </div>
                                    <div class="col col-5">
                                        <center>
                                            <h4>Saya belum memiliki kode booking surat</h4>
                                            <p>Silahkan melanjutkan ke tahap selanjutnya dan memasukkan detil permohonan surat apabila kamu belum mendapatkan kode booking surat.</p>
                                            <a href="#!" class="button primary w100" @click="next()">Ajukan Permohonan</a>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <div v-else-if="isInven">
                                <div class="row gutters align-center" style="margin-top:3rem">
                                    <div class="col col-5">
                                        <center>
                                            <h4>Saya sudah memiliki kode booking inventaris</h4>
                                            <p>Masukan kode booking inventaris untuk memeriksa apakah peminjaman inventaris anda sudah disetujui</p>
                                            <form>
                                                <input type="text" placeholder="Kode Booking Surat" style="margin-bottom:0.7rem">
                                                <a href="#!" class="button primary w100" @click="statusCheck()">Periksa Kode Booking Inventaris</a>
                                            </form>
                                        </center>
                                    </div>
                                    <div class="col col-1">
                                    </div>
                                    <div class="col col-5">
                                        <center>
                                            <h4>Saya belum memiliki kode booking inventaris</h4>
                                            <p>Silahkan melanjutkan ke tahap selanjutnya dan memasukkan detil peminjaman inventaris apabila kamu belum mendapatkan kode booking inventaris.</p>
                                            <a href="#!" class="button primary w100" @click="next()">Ajukan Permohonan</a>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </transition>

                    <transition name="slide">
                        <div v-if="state == 3">
                            <div v-if="isSurat">
                                <div v-if="isChecking">
                                    surat sudah bisa di download
                                </div>
                                <div v-else-if="!isChecking">
                                    <h5>Formulir Pembuatan Surat</h5>
                                    <form method="post" v-on:submit.prevent="mintaSurat">
                                        <div class="form-item">
                                            <label>Perihal Surat</label>
                                            <select name="jenis_surat" class="small" v-model="suratForm.id_jenis">
                                                <option disabled selected>-</option>
                                                @foreach($jenis as $j)
                                                    <option value="{{$j->id_jenis}}">{{$j->jenis}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <hr>
                                        <div v-if="suratForm.id_jenis == 'JS001'">
                                            <div class="row gutters">
                                                <div class="col col-8">
                                                    <label>Nama Pemohon</label>
                                                    <input name="nama_pemohon" v-model="suratForm.nama_pemohon" type="text" style="margin-bottom:1rem" class="small" placeholder="Nama Pemohon">
                                                </div>
                                                <div class="col col-4">
                                                    <label>NRP Pemohon</label>
                                                    <input name="nrp_pemohon" v-model="suratForm.nrp_pemohon" type="number" style="margin-bottom:1rem" class="small" placeholder="NRP Pemohon">
                                                </div>
                                                <div class="col col-12">
                                                    <label>Jabatan Pemohon</label>
                                                    <input name="jabatan" v-model="suratForm.jabatan" type="text" style="margin-bottom:1rem" class="small" placeholder="NRP Pemohon">
                                                </div>
                                            </div>
                                        </div>
                                        <div v-else-if="suratForm.id_jenis == 'JS002'">
                                            <div class="row gutters">
                                                <div class="col col-6">
                                                    <label>Nama Pemohon</label>
                                                    <input name="nama_pemohon" v-model="suratForm.nama_pemohon" type="text" style="margin-bottom:1rem" class="small" placeholder="Nama Pemohon">
                                                </div>
                                                <div class="col col-4">
                                                    <label>NRP Pemohon</label>
                                                    <input name="nrp_pemohon" v-model="suratForm.nrp_pemohon" type="number" style="margin-bottom:1rem" class="small" placeholder="NRP Pemohon">
                                                </div>
                                                <div class="col col-2">
                                                    <label>Angkatan C</label>
                                                    <input name="angkatan_c" v-model="suratForm.angkatan_c" type="text" style="margin-bottom:1rem" class="small" placeholder="Cxx">
                                                </div>
                                            </div>
                                        </div>
                                        <div v-else-if="suratForm.id_jenis == 'JS003'">
                                            <div class="row gutters">
                                                <div class="col col-5">
                                                    <label>Nama Kegiatan</label>
                                                    <input name="kegiatan" v-model="suratForm.kegiatan" type="text" style="margin-bottom:1rem" class="small" placeholder="Nama Kegiatan">
                                                </div>
                                                <div class="col col-3">
                                                    <label>Tanggal Kegiatan</label>
                                                    <input name="tanggal_pelaksanaan" v-model="suratForm.tanggal_pelaksaan" type="date" style="margin-bottom:1rem" class="small" placeholder="Tanggal Kegiatan">
                                                </div>
                                                <div class="col col-2">
                                                    <label>Waktu Mulai</label>
                                                    <input name="waktu_mulai" v-model="suratForm.waktu_mulai" type="time" style="margin-bottom:1rem" class="small" placeholder="Waktu Mulai">
                                                </div>
                                                <div class="col col-2">
                                                    <label>Waktu Selesai</label>
                                                    <input name="waktu_selesai" v-model="suratForm.waktu_selesai" type="time" style="margin-bottom:1rem" class="small" placeholder="Waktu Mulai">
                                                </div>
                                                <div class="col col-5">
                                                    <label>Nama Penanggungjawab</label>
                                                    <input name="nama_ketupel" v-model="suratForm.nama_ketupel" type="text" style="margin-bottom:1rem" class="small" placeholder="Nama Penanggungjawab">
                                                </div>
                                                <div class="col col-3">
                                                    <label>NRP Penanggungjawab</label>
                                                    <input name="nrp_ketupel" v-model="suratForm.nrp_ketupel" type="number" style="margin-bottom:1rem" class="small" placeholder="NRP Penanggungjawab">
                                                </div>
                                                <div class="col col-4">
                                                    <label>Tempat Pelaksanaan</label>
                                                    <input name="tempat_pelaksanaan" v-model="suratForm.tempat_pelaksanaan" type="text" style="margin-bottom:1rem" class="small" placeholder="Templat Pelaksanaan">
                                                </div>
                                            </div>
                                        </div>
                                        <div v-else-if="suratForm.id_jenis == 'JS004'">
                                            <div class="row gutters">
                                                <div class="col col-5">
                                                    <label>Nama Kegiatan</label>
                                                    <input name="kegiatan" v-model="suratForm.kegiatan" type="text" style="margin-bottom:1rem" class="small" placeholder="Nama Kegiatan">
                                                </div>
                                                <div class="col col-3">
                                                    <label>Tanggal Kegiatan</label>
                                                    <input name="tanggal_pelaksanaan" v-model="suratForm.tanggal_pelaksanaan" type="date" style="margin-bottom:1rem" class="small" placeholder="Tanggal Kegiatan">
                                                </div>
                                                <div class="col col-2">
                                                    <label>Waktu Mulai</label>
                                                    <input name="waktu_mulai" v-model="suratForm.waktu_mulai" type="time" style="margin-bottom:1rem" class="small" placeholder="Waktu Mulai">
                                                </div>
                                                <div class="col col-2">
                                                    <label>Waktu Selesai</label>
                                                    <input name="waktu_selesai" v-model="suratForm.waktu_selesai" type="time" style="margin-bottom:1rem" class="small" placeholder="Waktu Mulai">
                                                </div>
                                                <div class="col col-6">
                                                    <label>Nama Penanggungjawab</label>
                                                    <input name="nama_ketupel" v-model="suratForm.nama_ketupel" type="text" style="margin-bottom:1rem" class="small" placeholder="Nama Penanggungjawab">
                                                </div>
                                                <div class="col col-6">
                                                    <label>NRP Penanggungjawab</label>
                                                    <input name="nrp_ketupel" v-model="suratForm.nrp_ketupel" type="number" style="margin-bottom:1rem" class="small" placeholder="NRP Penanggungjawab">
                                                </div>
                                            </div>
                                        </div>
                                        <div v-else-if="suratForm.id_jenis == 'JS005'">
                                            <div class="row gutters">
                                                <div class="col col-5">
                                                    <label>Nama Kegiatan</label>
                                                    <input name="kegiatan" v-model="suratForm.kegiatan" type="text" style="margin-bottom:1rem" class="small" placeholder="Nama Kegiatan">
                                                </div>
                                                <div class="col col-3">
                                                    <label>Tanggal Kegiatan</label>
                                                    <input name="tanggal_pelaksanaan" v-model="suratForm.tanggal_pelaksanaan" type="date" style="margin-bottom:1rem" class="small" placeholder="Tanggal Kegiatan">
                                                </div>
                                                <div class="col col-2">
                                                    <label>Waktu Mulai</label>
                                                    <input name="waktu_mulai" v-model="suratForm.waktu_mulai" type="time" style="margin-bottom:1rem" class="small" placeholder="Waktu Mulai">
                                                </div>
                                                <div class="col col-2">
                                                    <label>Waktu Selesai</label>
                                                    <input name="waktu_selesai" v-model="suratForm.waktu_selesai" type="time" style="margin-bottom:1rem" class="small" placeholder="Waktu Mulai">
                                                </div>
                                                <div class="col col-5">
                                                    <label>Nama Penanggungjawab</label>
                                                    <input name="nama_ketupel" v-model="suratForm.nama_ketupel" type="text" style="margin-bottom:1rem" class="small" placeholder="Nama Penanggungjawab">
                                                </div>
                                                <div class="col col-3">
                                                    <label>NRP Penanggungjawab</label>
                                                    <input name="nrp_ketupel" v-model="suratForm.nrp_ketupel" type="number" style="margin-bottom:1rem" class="small" placeholder="NRP Penanggungjawab">
                                                </div>
                                                <div class="col col-4">
                                                    <label>Tempat yang dipinjam</label>
                                                    <input name="tempat_pinjam" v-model="suratForm.tempat_pinjam" type="text" style="margin-bottom:1rem" class="small" placeholder="Tempat yang dipinjam">
                                                </div>
                                            </div>
                                        </div>
                                        <div v-else-if="suratForm.id_jenis == 'JS006'">
                                            <div class="row gutters">
                                                <div class="col col-4">
                                                    <label>Tujuan Surat</label>
                                                    <input name="tujuan" v-model="suratForm.tujuan" type="text" style="margin-bottom:1rem" class="small" placeholder="Tujuan Surat">
                                                </div>
                                                <div class="col col-4">
                                                    <label>Tempat yang dipinjam</label>
                                                    <input name="tempat_pinjam" v-model="suratForm.tempat_pinjam" type="text" style="margin-bottom:1rem" class="small" placeholder="Tempat yang dipinjam">
                                                </div>  
                                                <div class="col col-4">
                                                    <label>Nama Kegiatan</label>
                                                    <input name="kegiatan" v-model="suratForm.kegiatan" type="text" style="margin-bottom:1rem" class="small" placeholder="Nama Kegiatan">
                                                </div>
                                                <div class="col col-3">
                                                    <label>Tanggal Kegiatan</label>
                                                    <input name="tanggal_pelaksanaan" v-model="suratForm.tanggal_pelaksanaan" type="date" style="margin-bottom:1rem" class="small" placeholder="Tanggal Kegiatan">
                                                </div>
                                                <div class="col col-2">
                                                    <label>Waktu Mulai</label>
                                                    <input name="waktu_mulai" v-model="suratForm.waktu_mulai" type="time" style="margin-bottom:1rem" class="small" placeholder="Waktu Mulai">
                                                </div>
                                                <div class="col col-2">
                                                    <label>Waktu Selesai</label>
                                                    <input name="waktu_selesai" v-model="suratForm.waktu_selesai" type="time" style="margin-bottom:1rem" class="small" placeholder="Waktu Mulai">
                                                </div>
                                                <div class="col col-3">
                                                    <label>Nama PJ</label>
                                                    <input name="nama_ketupel" v-model="suratForm.nama_ketupel" type="text" style="margin-bottom:1rem" class="small" placeholder="Nama Penanggungjawab">
                                                </div>
                                                <div class="col col-2">
                                                    <label>NRP PJ</label>
                                                    <input name="nrp_ketupel" v-model="suratForm.nrp_ketupel" type="number" style="margin-bottom:1rem" class="small" placeholder="51xxxxxxxx">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col col-12">
                                            <button type="submit" class="w100 button primary big" style="margin-top:1rem; text-align:center">Ajukan Permohonan</button>
<!--                                            <a href="#!" class="w100 button primary big" style="margin-top:1rem; text-align:center" @click="pinjamRuang()">Ajukan Permohonan</a>-->
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                            
                            <div v-else-if="isInven">
                                <div v-if="isChecking">
                                    inventaris sudah bisa dipinjam
                                </div>
                                <div v-else-if="!isChecking">
                                    <h5>Formulir Peminjaman Inventaris</h5>
                                    <form>
                                        <div class="row gutters" style="margin-top:2rem">
                                            <div class="col col-6">
                                                <label>Inventaris yang ingin dipinjam</label>
                                                <select name="inventaris" class="small">
                                                    @foreach($inv as $j)
                                                        <option value="{{$j->id_inventaris}}">{{$j->nama_inventaris}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col col-6">
                                                <label>Tanggal peminjaman</label>
                                                <input type="date" style="margin-bottom:1rem" class="small">
                                            </div>
                                            <div class="col col-6">
                                                <label>Nama peminjam</label>
                                                <input type="text" style="margin-bottom:1rem" placeholder="Nama peminjam" class="small">
                                            </div>
                                            <div class="col col-6">
                                                <label>NRP peminjam</label>
                                                <input type="number" style="margin-bottom:1rem" placeholder="NRP peminjam" class="small">
                                            </div>
                                            <div class="col col-6">
                                                <label>Foto diri dengan memegang KTM</label>
                                                <input type="file" style="margin-bottom:1rem" placeholder="Foto" class="small">
                                            </div>
                                            <div class="col col-12">
                                                <a href="#!" class="w100 button primary big" style="margin-top:1rem; text-align:center" @click="next()">Ajukan Permohonan</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </transition>
                        
                    <transition name="slide">
                        <div v-if="state == 4">
                            <div v-if="isSurat">
                                <div class="row align-center">
                                    <div class="col col-8" style="margin-top:2rem">
                                        <center>
                                            <p>Permohonan permintaan surat sudah kami terima. Dimohon untuk menyimpan kode booking untuk kemudian digunakan untuk mencetak surat apabila permintaan anda sudah disetujui.</p>
                                            <hr style="width:5rem; border-width:3px">
                                            <h5><b>Kode Booking Surat</b></h5>
                                            <h1 style="font-size:500%">@{{kodeBookingSurat}}</h1>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <div v-else-if="isInven">
                                <div class="row align-center">
                                    <div class="col col-8" style="margin-top:2rem">
                                        <center>
                                            <p>Permohonan permintaan peminjaman inventaris sudah kami terima. Dimohon untuk menyimpan kode booking untuk kemudian digunakan untuk melihat apabila permohonan peminjaman inventaris anda sudah disetujui.</p>
                                            <hr style="width:5rem; border-width:3px">
                                            <h5><b>Kode Booking Inventaris</b></h5>
                                            <h1 style="font-size:500%">5123827</h1>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </transition>
                </div>
            </div>
            
<!--
            <div class="footer">
                PBKK 2017
            </div>
-->
        
        
        
        
        </div>
        
<!--        <script src="{{url('')}}/js/jquery-3.2.0.min.js"></script>-->
        <script src="{{url('')}}/js/vue.js"></script>
        <script src="{{url('')}}/js/axios.min.js"></script>
        <script src="{{url('')}}/js/siadkeuHome.js"></script>
    </body>
</html>