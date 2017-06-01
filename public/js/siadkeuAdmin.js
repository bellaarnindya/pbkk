var app = new Vue({
    el: '#app',
    data: {
        section: 'inven',
        pinjam: [],
        kembali: []
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
        }
    },
    created() {
        this.redraw();
    }
});