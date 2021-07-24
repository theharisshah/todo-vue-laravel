import App from './components/App.vue';
require('./bootstrap');

window.Vue = require('vue').default;


const app = new Vue({
    el: '#app',
    components : {
        App
    }
});
