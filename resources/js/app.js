import './bootstrap';

import {createApp} from 'vue/dist/vue.esm-bundler.js';
import AppInfoForm from './Components/AppInfoForm.vue';
import AppLogoform from './Components/AppLogoform.vue';

var app = createApp({});
app.component('app-info-form', AppInfoForm);
app.component('app-logo-form', AppLogoform);

app.mount('#AppInfoForm');
