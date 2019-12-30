/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// import PositionType from "./components/PositionType";

import AgentSelection from "./components/AgentSelection";

require('./bootstrap');

window.Vue = require('vue');
window.$ = window.jQuery = require('jquery');

import AgentInformation from "./components/AgentInformation";
import PositionType from "./components/PositionType";
import PositionTypeInformation from "./components/PositionTypeInformation";
import vSelect from 'vue-select';
import 'vue-select/dist/vue-select.css'
// import Datepicker from 'vuejs-datepicker';

Vue.component('v-select', vSelect);
Vue.component('v-agent-information', AgentInformation);
Vue.component('v-position-type', PositionType);
Vue.component('v-position-type-information', PositionTypeInformation);
Vue.component('v-agent-selection', AgentSelection);
// Vue.component('v-datepicker', Datepicker);
// const app = new Vue({
//     el: '#app',
//     components: {
//         vSelect,
//         AgentInformation,
//         AgentSelector,
//     },
// });
