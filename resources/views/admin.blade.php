<html>
    <head>
        <link rel="stylesheet" type="text/css" href="{{url('')}}/css/kube.min.css">
        <link rel="stylesheet" type="text/css" href="{{url('')}}/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="{{url('')}}/css/siadkeu.css">
        <link rel="icon" href="{{url('')}}/img/favicon.png" type="image/png">
        <style>
            pre, td, th{
                padding:0.5rem;
            }
        </style>
        <title>SIADKEU HMTC</title>
    </head>
    <body>
        
        <div id="app">
            
            
            
            <div class="navbar-admin">
                <div class="row gutters container">
                    <div class="col col-2">
                        <h3 style="color:#fff; margin:0">SIADKEU</h3>
                        <b>Admin Dashboard</b>
                    </div>
                    <div class="col col-9">
                        <input class="w100 searchbox" type="text" style="background-color:rgba(255,255,255,0.3); border:none; color:#fff; border-radius:0" placeholder="Search">
                    </div>
                    <div class="col col-1" style="text-align:right">
                        <img src="{{url('')}}/img/logo.jpg" style="height:2.7rem">
                    </div>
                </div>
            </div>
            
            <div class="sidebar">
                <ul class="unstyled">
<!--
                    <li style="margin-bottom:1rem">
                        <a href="#!" style="color: inherit; text-decoration:none" @click="section='statistik'"><div style="width:2rem; display:inline-block"><i class="fa fa-bar-chart"></i></div><b>Statistik</b></a>
                    </li>
-->
                    <li style="margin-bottom:1rem">
                        <a href="#!" style="color: inherit; text-decoration:none" @click="section='surat'"><div style="width:2rem; display:inline-block"><i class="fa fa-file"></i></div><b>Surat</b></a>
                    </li>
                    <li>
                        <a href="#!" style="color: inherit; text-decoration:none" @click="section='inven'"><div style="width:2rem; display:inline-block"><i class="fa fa-cube"></i></div><b>Inventaris</b></a>
                    </li>
                </ul>
            </div>
            
            <div class="section">
                <div class="row container gutters align-right">
                    <div class="col col-10">
                        <div v-if="section=='statistik'">
                            <div class="panel">
                                <h3>Statistik Pembuatan Surat</h3>
                                <p>Lorem ipsum dolor sit amet</p>
                            </div>
                        </div>
                        <div v-if="section=='surat'">
                            <div class="panel">
                                <h3>Permohonan Surat</h3>
                                <p>Lorem ipsum dolor sit amet</p>
                            </div>
                        </div>
                        <div v-if="section=='inven'">
                            <div class="panel">
                                <h3>Permohonan Peminjaman Inventaris</h3>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Kode Booking</th>
                                            <th>Inventaris</th>
                                            <th>Nama Pemesan</th>
                                            <th>NRP Pemesan</th>
                                            <th>Tanggal Pemesanan</th>
                                            <th>Setujui</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="row in pinjam">
                                            <td>@{{row.no_book}}</td>
                                            <td>@{{row.nama_inventaris}}</td>
                                            <td>@{{row.nama_pemesan}}</td>
                                            <td>@{{row.nrp_pemesan}}</td>
                                            <td>@{{row.tanggal_pemesanan}}</td>
                                            <td><a href="#!" class="button primary small" @click="approveInven(row.no_book)"><i class="fa fa-check"></i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="panel">
                                <h3>Peminjaman yang Sedang Berlangsung</h3>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Kode Booking</th>
                                            <th>Inventaris</th>
                                            <th>Nama Pemesan</th>
                                            <th>NRP Pemesan</th>
                                            <th>Tanggal Pemesanan</th>
                                            <th>Kembali</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="row in kembali">
                                            <td>@{{row.no_book}}</td>
                                            <td>@{{row.nama_inventaris}}</td>
                                            <td>@{{row.nama_pemesan}}</td>
                                            <td>@{{row.nrp_pemesan}}</td>
                                            <td>@{{row.tanggal_pemesanan}}</td>
                                            <td><a href="#!" class="button primary small" @click="returnInven(row.no_book)"><i class="fa fa-check"></i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        
        
        
        
        </div>
        
        <script src="{{url('')}}/js/vue.js"></script>
        <script src="{{url('')}}/js/axios.min.js"></script>
        <script src="{{url('')}}/js/siadkeuAdmin.js"></script>
    </body>
</html>