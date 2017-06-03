//Vue.http.headers.common['X-CRSF-TOKEN'] = $('#token').attr('value');

var app = new Vue({
    el: '#app',
    data: {
        state: 1,
        navbar: 'navbar-big siad-bg',
        sistemInformasi: 'font-size: 2.7em',
        pillClass: 'pill',
        pillContent: 'Pilih Layanan',
        isSurat: false,
        isInven: false,
        isChecking: false,
        suratForm: {
            'id_jenis':'',
            'nama_pemohon':'',
            'nrp_pemohon':'',
            'jabatan':'',
            'angkatan_c':'',
            'waktu_mulai':'',
            'waktu_selesai':'',
            'tanggal_pelaksanaan':'',
            'kegiatan':'',
            'tempat_pelaksanaan':'',
            'tempat_pinjam':'',
            'tujuan':'',
            'nama_ketupel':'',
            'nrp_ketupel':'',

        },
        invenForm: {
            'id_inventaris':'',
            'nama_pemesan':'',
            'nrp_pemesan':'',
            'file_foto':'',
            'tanggal_pinjam':'',
        },
        kodeBookingSurat: '',
        kodeBookingInven: '',
        statusBookingSurat: false,
        statusBookingInven: false
    }, 
    methods: {
        back: function(){
            if (this.state > 1) {
                this.state--;
            }
            this.redraw();
        },
        next: function(){
            this.state++;
            this.redraw();
        },
        redraw: function(){
            if (this.state == 1){
                this.pillContent = 'Pilih layanan';
                this.isSurat = false;
                this.isInven = false;
                this.isChecking = false;
                this.kodeBookingSurat = '';
                this.kodeBookingInven = '';
                this.activeNavbar();
            }
            else if (this.state == 2){
                this.deactiveNavbar();
                this.isChecking = false;
                if (this.isSurat){
                    this.pillContent = 'Pembuatan surat';
                    // kalo dipencet surat
                }
                else if (this.isInven){
                    this.pillContent = 'Peminjaman inventaris';
                    // kalo dipencet inven
                }
            }
            else if (this.state == 3){
                if (this.isSurat){
                    this.pillContent = 'Formulir pembuatan surat';
                    // kalo dipencet surat
                }
                else if (this.isInven){
                    this.pillContent = 'Formulir peminjaman inventaris';
                    // kalo dipencet inven
                }
                else if(this.isChecking){
                    this.pillContent = 'Formulir peminjaman inventaris';
                }
            }
            else if (this.state == 4){
                if (this.isSurat){
                    this.pillContent = 'Kode booking surat';
                    // kalo dipencet surat
                }
                else if (this.isInven){
                    this.pillContent = 'kode booking peminjaman inventaris';
                    // kalo dipencet inven
                }
            }
        },
        deactiveNavbar: function(){
            this.navbar = 'navbar-small siad-bg';
            this.sistemInformasi = 'font-size: 1.7em';
            this.pillClass = 'pill right';
        },
        activeNavbar: function(){
            this.navbar = 'navbar-big siad-bg';
            this.sistemInformasi = 'font-size: 2.7em';
            this.pillClass = 'pill';
        },
        showLayanan: function(layanan){
            if (layanan == 'inven'){
                this.isInven = true;
                this.next();
            }
            else if (layanan == 'surat'){
                this.isSurat = true;
                this.next();
            }
        },
        statusCheck: function(layanan){
            this.isChecking = true;
            if(layanan == 'inven'){
                var inputBookingInven = this.kodeBookingInven;
                axios.post('cekInven', {
                    inputBookingInven
                }).then(function (response) {
                    app.statusBookingInven = response.data;
                    app.next();
                }).catch(function (error) {
                    alert(error);
                    app.statusBookingInven = '!ERROR';
                    app.next();
                });
            }
            else if(layanan == 'surat') {
                var inputBookingSurat = this.kodeBookingSurat;
                axios.post('cekSurat', {
                    inputBookingSurat
                }).then(function (response) {
                    //alert('masuk');
                    app.statusBookingSurat = response.data;
                    console.log(response.data);
                    app.next();
                }).catch(function (error) {
                    alert(error);
                    app.statusBookingSurat = '!ERROR';
                    app.next();
                });
            }
            //this.next();         
        },
        mintaSurat: function(){
            var input = this.suratForm;
            axios.post('pesanSurat', {
                input
            }).then(function (response) {
                //console.log(response.data);
                app.kodeBookingSurat = response.data;
                app.next();
            }).catch(function (error) {
                alert(error);
                app.kodeBookingSurat = '!ERROR';
                app.next();
            });
        },
        mintaInven: function(){
            var inputInven = this.invenForm;
            axios.post('pesanInven', {
                inputInven
            }).then(function (response) {
                //console.log(response.data);
                app.kodeBookingInven = response.data;
                app.next();
            }).catch(function (error) {
                alert(error);
                app.kodeBookingInven = '!ERROR';
                app.next();
            });
        },
    }
});