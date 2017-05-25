var app = new Vue({
    el: '#app',
    data: {
        state: 1,
        navbar: 'navbar-big siad-bg',
        message: 'test1232',
        sistemInformasi: 'font-size: 2.7em',
        layananStyle: '',
        pillClass: 'pill',
    } , 
    methods: {
        deactiveNavbar(){
            this.state = 2;
            this.navbar = 'navbar-small siad-bg';
            this.sistemInformasi = 'font-size: 1.7em';
            this.layananStyle = '';
            this.pillClass = 'pill right';
        } ,

        activeNavbar(){
            this.navbar = 'navbar-big siad-bg';
            this.sistemInformasi = 'font-size: 2.7em';
            this.layananStyle = '';
            this.pillClass = 'pill';
        } ,

        back(){
            if (this.state == 2){
                this.state = 1;
                this.activeNavbar();
            }
            else if (this.state > 1) {
                this.state--;
            }
            this.redraw();
        } ,

        next(){
            this.state++;
            this.redraw();
        } ,

        redraw(){

        }
    }
});