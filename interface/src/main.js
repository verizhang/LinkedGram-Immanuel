import '@babel/polyfill'
import 'mutationobserver-shim'
import Vue from 'vue'
import './plugins/bootstrap-vue'
import App from './App.vue'
import router from './router'


Vue.prototype.api = 'http://localhost:8000/api/';

//storing authentication data to global variabel
let localStorageAuth = localStorage.getItem('alumni-smk-kristen-immanuel-pontianak');
if( typeof localStorageAuth !== 'undefined' && localStorageAuth !== null){
  Vue.prototype.auth = JSON.parse(localStorageAuth);
}else{
  Vue.prototype.auth = 'blank';
}


new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
