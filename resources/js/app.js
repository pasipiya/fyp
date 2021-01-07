require('./bootstrap');

window.Vue = require('vue');

//Import progressbar
require('./progressbar');

//Setup custom events
require('./customEvents');

//Import View Router
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import Vue from 'vue'

/*For Google Map*/
import * as VueGoogleMaps from 'vue2-google-maps'
Vue.use(VueGoogleMaps,{
    load:{
        key:'AIzaSyAolyOarpY_ZRm-gR8i2MPkadw7JNKp-yc'
    }
})

///for notifications
import Toaster from 'v-toaster'
import 'v-toaster/dist/v-toaster.css'
Vue.use(Toaster, {timeout: 5000})

//Import v-from
import { Form, HasError, AlertError } from 'vform'
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)


//Vue gauge
// import LinearGauge from "vue-canvas-gauges/src/LinearGauge";
// import RadialGauge from "vue-canvas-gauges/src/RadialGauge";
// Vue.component('linear-gauge', LinearGauge.default);
// Vue.component('radial-gauge', RadialGauge.default);
// Vue.component(RadialGauge)
// Vue.component(LinearGauge)

//Import Sweetalert2
import Swal from 'sweetalert2'
window.Swal = Swal
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})
window.Toast = Toast

//Date Time
import datePicker from 'vue-bootstrap-datetimepicker';
//import 'bootstrap/dist/css/bootstrap.css';
import 'pc-bootstrap4-datetimepicker/build/css/bootstrap-datetimepicker.css';
Vue.use(datePicker);


//Routes
import { routes } from './routes';


//Register Routes
const router = new VueRouter({
    routes,
    mode: 'hash',

})

//Load Preloader
import PreloaderComponent from './components/theme_components/PreloaderComponent.vue';
Vue.component('theme-preloader', PreloaderComponent);

const app = new Vue({
    el: '#app',
    router
});
