import './bootstrap';

import {createApp} from 'vue/dist/vue.esm-bundler.js';
import AppStatusForm from './Components/AppStatusForm.vue';

var app = createApp({});
app.component('app-status-form', AppStatusForm);

app.mount('#AppInfoForm');
