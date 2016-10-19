import Vue from 'vue';
import VueRouter from 'vue-router';
import VueValidator from 'vue-validator';
var VueI18n = require('vue-i18n');

Vue.use(require('vue-resource'));
Vue.use(require('vue-router'));
Vue.use(VueValidator);
Vue.use(VueI18n);

Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#_token').getAttribute('value');

Vue.config.debug = true;
Vue.config.devtools = true;
Vue.config.lang = 'en';


// Import the actual routes, aliases, ...
import { configRouter } from './routes'

// Create our router object and set options on it
const router = new VueRouter()

// Inject the routes into the VueRouter object
configRouter(router);

// Import language file
var locales = {
  en: {
  	sidebar: {
  		dashboard: 'Dashboard',
  		contacts: 'Contacts',
  		system: 'System',
  		settings: 'Settings',
  		company: 'Company',
  		usermanagement: 'User Management',
  	},
    contact: {
    	contacts: 'Contacts',
		create_contact: 'Create Contact',
		all: 'All',
		suppliers: 'Suppliers',
		clients: 'Clients',
		partner: 'Partners',
		interested_persons: 'Interested Persons',
		type: 'Type',
		name: 'Name',
		city: 'City',
		client_number: 'Client Nr.',
		modal: {
			cancel: 'Cancel & Close',
			save: 'Save Contact',
			fix_errors: 'Fix Errors',
			organisation: 'Organisation',
			private_person: 'Private Person',
			additional_name: 'Additional Name',
			name_of_the_organisation: 'Name of the Organisation',
			client_number: 'Client Number',
		},
    },
    system: {
    	settings: 'Settings',
    	company: 'Company',
    	general: 'General',
    	users: 'Users',
    	usermanagement: 'User Management',
    	tabBankaccount: 'Bankaccount',
    }
  }
}

// set locales
// RECOMMEND: 3.0 or later
Object.keys(locales).forEach(function (lang) {
  Vue.locale(lang, locales[lang])
})

// Bootstrap the app
//Vue.component('nav-component', require('./components/site-header/index.vue'))
const App = Vue.extend(require('./app.vue'))
router.start(App, '#app')