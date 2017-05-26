<html>
    <head>
        <link rel="stylesheet" type="text/css" href="{{url('')}}/css/kube.min.css">
        <link rel="stylesheet" type="text/css" href="{{url('')}}/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="{{url('')}}/css/siadkeu.css">
        <link rel="icon" href="{{url('')}}/img/favicon.png" type="image/png">
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
                <div v-if="state > 1" class="layanan-big">
                    <div v-if="state == 2">
                        <div v-if="isSurat">
                            <!-- pembuatan surat -->
                            <div class="row gutters align-center" style="margin-top:3rem">
                                <div class="col col-5">
                                    <center>
                                        <h4>Saya sudah memiliki kode booking surat</h4>
                                        <p>Silahkan masukan kode booking surat untuk memeriksa apakah permohonan surat anda sudah disetujui</p>
                                        <form>
                                            <input type="text" placeholder="Kode Booking Surat" style="margin-bottom:0.7rem">
                                            <a href="#!" class="button primary w100">Periksa Kode Booking</a>
                                        </form>
                                    </center>
                                </div>
                                <div class="col col-1">
                                </div>
                                <div class="col col-5">
                                    <center>
                                        <h4>Saya belum memiliki kode booking surat</h4>
                                        <p>Silahkan melanjutkan ke tahap selanjutnya dan memasukkan detil permohonan surat apabila kamu belum mendapatkan kode booking surat.</p>
                                        <a href="#!" class="button primary w100" @click="next()">Minta Permohonan</a>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <div v-if="isInven">
                            inven
                        </div>
                    </div>
                    <div v-if="state == 3">
                        <div v-if="isSurat">
                            <form>
                                <div class="row gutters">
                                    <div class="col col-12">
                                        <div class="form-item">
                                            <label>Perihal Surat</label>
                                            <select >
                                                <option disabled selected>-</option>
                                                <option>Surat Keterangan Aktif Berorganisasi</option>
                                                <option>Surat Keterangan Anggota C HMTC</option>
                                                <option>Surat Izin Peminjaman Ruangan</option>
                                                <option>Surat Izin Keramaian</option>
                                                <option>Surat Undangan</option>
                                            </select>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="col col-6">
                                        <label>Nama Kegiatan</label>
                                        <input type="text" style="margin-bottom:1rem" placeholder="Nama Kegiatan">
                                    </div>
                                    <div class="col col-3">
                                        <label>Tanggal Mulai</label>
                                        <input type="date" style="margin-bottom:1rem">
                                    </div>
                                    <div class="col col-3">
                                        <label>Tanggal Selesai</label>
                                        <input type="date" style="margin-bottom:1rem">
                                    </div>
                                    <div class="col col-6">
                                        <label>Nama Penanggungjawab</label>
                                        <input type="text" style="margin-bottom:1rem" placeholder="Nama Penanggungjawab">
                                    </div>
                                    <div class="col col-6">
                                        <label>NRP Penanggungjawab</label>
                                        <input type="number" style="margin-bottom:1rem" placeholder="NRP Penanggungjawab">
                                    </div>
                                    <div class="col col-12">
                                        <a href="#!" class="w100 button primary big" style="margin-top:1rem; text-align:center" @click="next()">Submit</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div v-if="isInven">
                            form inventaris
                        </div>
                    </div>
                    <div v-if="state == 4">
                        <div v-if="isSurat">
                            <div class="row align-center">
                                <div class="col col-8" style="margin-top:2rem">
                                    <center>
                                        <p>Permohonan permintaan surat sudah kami terima. Dimohon untuk menyimpan kode booking untuk kemudian digunakan untuk mencetak surat apabila permintaan anda sudah disetujui.</p>
                                        <hr style="width:5rem; border-width:3px">
                                        <h5><b>Kode Booking Surat</b></h5>
                                        <h1 style="font-size:500%">5123827</h1>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <div v-if="isInven">
                            kode booking inventaris
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="footer">
                PBKK 2017
            </div>
        
        
        
        
        </div>
        
        <script src="{{url('')}}/js/vue.js"></script>
        <script src="{{url('')}}/js/siadkeu.js"></script>
    </body>
</html>