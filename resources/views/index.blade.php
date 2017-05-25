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
                    <span :class="pillClass"><b>@{{state}}. Pilih layanan</b></span>
                </div>
            </div>
            <div class="container-super">
                <div v-if="state == 1" class="layanan surat" @click="deactiveNavbar()">
                    <i class="fa fa-edit fa-5x siad-col"></i>
                    <h3 style="margin-top:0.5rem">Pembuatan Surat</h3>
                    <center><hr style="width:5rem; border-width:3px"></center>
                    <p>Layanan kepada anggota HMTC untuk keperluan pengantar, perizinan, rekomendasi, keterangan, dsb.</p>
                </div>
                <div v-if="state == 1" class="layanan inven" @click="deactiveNavbar()">
                    <i class="fa fa-cube fa-5x siad-col"></i>
                    <h3 style="margin-top:0.5rem">Peminjaman Inventaris</h3>
                    <center><hr style="width:5rem; border-width:3px"></center>
                    <p style="font-size:">Layanan untuk peminjaman inventaris HMTC, seperti: Ruang HIMA, LCD, peralatan olahraga, dan lain-lain</p>
                </div>
                <div v-if="state == 1" class="or">or</div>
                <div v-if="state > 1" class="layanan-big">
                    asdsad
                </div>
            </div>
            
            <div class="footer">
                <b>PBKK 2017</b>
            </div>
        
        
        
        
        </div>
        
        <script src="{{url('')}}/js/vue.js"></script>
        <script src="{{url('')}}/js/siadkeu.js"></script>
    </body>
</html>