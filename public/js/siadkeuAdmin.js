var app = new Vue({
    el: '#app',
    data: {
        section: 'inven',
        pinjam: [],
        kembali: [],
        surat: []
    },
    methods: {
        redraw: function(){
            axios.get('listInven')
            .then(function (response) {
                app.pinjam = response.data.pinjam_inv;
                app.kembali = response.data.kembali_inv;
                //console.log(app.pinjam);
            }).catch(function (error) {
                alert(error);
            });
            axios.get('listSurat')
            .then(function (response) {
                app.surat = response.data;
                //console.log(app.surat);
            }).catch(function (error) {
                alert(error);
            });
        },
        approveInven: function(no_book){
            var link = 'listInven/pinjam/' + no_book; 
            axios.get(link)
            .then(function (response) {
                var message = 'Pemesanan dengan nomor booking '+no_book+' disetujui';
                alert(message);
                app.redraw();
            }).catch(function (error) {
                alert(error);
            });
        },
        returnInven: function(no_book){
            var link = 'listInven/kembali/' + no_book; 
            axios.get(link)
            .then(function (response) {
                var message = 'Pemesanan dengan nomor booking '+no_book+' sudah dikembalikan';
                alert(message);
                app.redraw();
            }).catch(function (error) {
                alert(error);
            });
        },
        approveSurat: function(no_book){
            var link = 'listSurat/' + no_book; 
            axios.get(link)
            .then(function (response) {
                var message = 'Permintaan surat dengan nomor booking '+no_book+' disetujui';
                alert(message);
                app.redraw();
            }).catch(function (error) {
                alert(error);
            });
        }
    },
    created() {
        this.redraw();
    }
});