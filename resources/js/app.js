 /**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueCharts from 'vue-chartjs'    
import { Bar } from 'vue-chartjs'
import moment from 'moment';
Vue.use(VueCharts)
Vue.use(Bar)

import VueRouter from 'vue-router'
Vue.use(VueRouter)

import { Form, HasError, AlertError } from 'vform';

import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
  color: 'rgb(143, 255, 199)',
  failedColor: 'red',
  height: '7px'
})


import swal from 'sweetalert2'
window.swal = swal;

const toast = swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
});

window.toast = swal;

window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)


let routes = [
    { path: '/foo', component: Foo},
    { path: '/dashboard', component: require('./components/Dashboard.vue').default },
    { path: '/meus', component: require('./components/MeusRegistos.vue').default },
    { path: '/pesquisa', component: require('./components/Pesquisa.vue').default },
    { path: '/casosCentros', component: require('./components/CasosCentros.vue').default },
    { path: '/dashGestor', component: require('./components/DashboardGestor.vue').default },
    { path: '/profile', component: require('./components/Profile.vue').default },
    { path: '/profileGestor', component: require('./components/ProfileGestor.vue').default },
    { path: '/registar', component: require('./components/RegPessoaPerdida.vue').default },
    { path: '/registarNormal', component: require('./components/RegPessoaPerdidaNormalUser.vue').default },
    { path: '/casos', component: require('./components/Casos.vue').default },
    { path: '/casosNormalUsers', component: require('./components/CasosNormalUsers.vue').default },
    { path: '/encontradas', component: require('./components/CasosConcluidos.vue').default },
    { path: '/reg_centro', component: require('./components/RegCentro.vue').default },
    { path: '/centros', component: require('./components/Centros.vue').default },
    //{ path: '/centros_normal', component: require('./components/App.vue').default },
    { path: '/testes', component: require('./components/Step2.vue').default },
    { path: '/gestor', component: require('./components/Gestor.vue').default },
    { path: '/exemplo', component: require('./components/ExampleComponent.vue').default },
  ]

const Foo = {template: '<div>foo</div>'}

const router = new VueRouter({
   //mode: 'history',
   routes // short for `routes: routes`
})

Vue.filter('upText', function(text){
  return text.toUpperCase();
});

Vue.filter('capitalizar', function(text){
  return text.toUpperCase(); 
});

Vue.filter('myDate', function(created){
  return moment(created).format('D MMMM YYYY');
});
Vue.filter('time', function(created){
  return moment(created).format('h:mm');
});

window.Fire = new Vue();


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/** 
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import Vue from "vue";
import App from "./app";
import * as VueGoogleMaps from "vue2-google-maps";

Vue.use(VueGoogleMaps, {
  load: {
    key: "AIzaSyC_NFUqOzqo-RCczDEgJ0s-sKaiJcr6RRY",
    libraries: "places" // necessary for places input
  }
});

 
const app = new Vue({
    el: '#app',
    router,
    data:{
      search: ''
    }, 
    methods:{
      searchit: _.debounce(()=>{
        Fire.$emit('searching');
      },300)
    }
});
