<template>
  <div>
    <h1>Vue Router Demo App</h1>
    <p>
      <router-link :to="{ name: 'home' }">Home</router-link>
      <router-link :to="{ name: 'users' }">Users</router-link>
      <router-link :to="{ name: 'login' }">Login</router-link>
    </p>
    <div class="container">
      <router-view></router-view>
    </div>
  </div>
</template>
