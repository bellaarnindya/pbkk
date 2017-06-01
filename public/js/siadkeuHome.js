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
        jenisSurat: ''
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
            if (this.state == 2)
                this.deactiveNavbar();
            this.redraw();
        },
        redraw: function(){
            if (this.state == 1){
                this.pillContent = 'Pilih layanan';
                this.isSurat = false;
                this.isInven = false;
                this.isChecking = false;
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
        statusCheck: function(){
            this.isChecking = true;
            this.next();         
        }
    }
});