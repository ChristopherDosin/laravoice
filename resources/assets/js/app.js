import Vue from 'vue';
import VueRouter from 'vue-router';
import VueValidator from 'vue-validator';

Vue.use(require('vue-resource'));
Vue.use(require('vue-router'));
Vue.use(VueValidator)

Vue.config.debug = true;
Vue.config.devtools = true;


// Import the actual routes, aliases, ...
import { configRouter } from './routes'

// Create our router object and set options on it
const router = new VueRouter()

// Inject the routes into the VueRouter object
configRouter(router)

router.beforeEach(function () {
    window.scrollTo(0, 0)
})

// Bootstrap the app
//Vue.component('nav-component', require('./components/site-header/index.vue'))
const App = Vue.extend(require('./app.vue'))
router.start(App, '#app')