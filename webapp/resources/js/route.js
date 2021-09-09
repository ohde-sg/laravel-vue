import VueRouter from 'vue-router'
import UserList from './views/UserList.vue'
import Home from './views/Home.vue'
import Login from './views/Login.vue'

const router = new VueRouter({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/users',
      name: 'users',
      component: UserList,
    },
    {
      path: '/login',
      name: 'login',
      component: Login,
    },
  ],
});
export default router
