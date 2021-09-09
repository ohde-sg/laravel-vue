import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import App from './views/App.vue'
import router from './route.js'

const app = new Vue({
  el: '#app',
  components: { App },
  router,
});
