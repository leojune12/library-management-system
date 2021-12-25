// require('./bootstrap');

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();


require('./bootstrap')
// require('alpinejs')

// Sweet Alert
// import VueSweetalert2 from 'vue-sweetalert2'
// import 'sweetalert2/dist/sweetalert2.min.css'

import Vue from 'vue'
import vuetify from './plugins/vuetify'

// Components
// import AutocompleteComponent from './components/autocomplete.vue'
// import DropdownComponent from './components/dropdown.vue'
// import TableDropdownComponent from './components/tableDropdown.vue'

// Vue.use(VueSweetalert2)

window.Vue = Vue
window.vuetify = vuetify
// window.AutocompleteComponent = AutocompleteComponent
// window.DropdownComponent = DropdownComponent
// window.TableDropdownComponent = TableDropdownComponent

