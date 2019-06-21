
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');

// /**
//  * The following block of code may be used to automatically register your
//  * Vue components. It will recursively scan this directory for the Vue
//  * components and automatically register them with their "basename".
//  *
//  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
//  */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('mercancias-component', require('./components/MercanciaComponent.vue').default);
Vue.component('servicios-component', require('./components/ServicioComponent.vue').default);

// SERVICIO AEREO
Vue.component('servaereo-component', require('./components/ServaereoComponent.vue').default);
Vue.component('cargoaereo-component', require('./components/CargoaereoComponent.vue').default);
Vue.component('gastoaereo-component', require('./components/GastoaereoComponent.vue').default);

// SERVICIO TERRESTRE
Vue.component('servterrestre-component', require('./components/ServterrestreComponent.vue').default);
Vue.component('cargoterrestre-component', require('./components/CargoterrestreComponent.vue').default);

// SERVICIO MARITIMO
Vue.component('servmaritimo-component', require('./components/ServmaritimoComponent.vue').default);
Vue.component('cargomaritimo-component', require('./components/CargomaritimoComponent.vue').default);
Vue.component('gastomaritimo-component', require('./components/GastomaritimoComponent.vue').default);
// // const files = require.context('./', true, /\.vue$/i)

// // files.keys().map(key => {
// //     return Vue.component(_.last(key.split('/')).split('.')[0], files(key))
// // })

// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */

const app = new Vue({
    el: '#app'
});
