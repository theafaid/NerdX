/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('login-form', require('./components/auth/LoginForm.vue').default);
Vue.component('registration-form', require('./components/auth/RegisterationForm.vue').default);
Vue.component('channel', require('./components/channels/show.vue').default);
Vue.component('create-channel', require('./components/channels/create.vue').default);
Vue.component('edit-channel', require('./components/channels/edit.vue').default);