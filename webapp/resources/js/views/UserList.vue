<template>
  <div>
    <p>UserList</p>
    <p v-if="loading">Loading....</p>
    <ul v-if="loaded">
      <li v-for="user in users" v-bind:key="user.id">
        {{ user.email }}
      </li>
    </ul>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      users: [],
      loading: true,
    };
  },
  computed: {
    loaded() {
      return !this.loading;
    },
  },
  methods: {
    fetchUserList() {
      this.loading = true;
      // axios.get("/sanctum/csrf-cookie").then((res) => {
      axios
        .get("http://127.0.0.1:8080/api/users", {
          withCredentials: true,
        })
        .then((res) => {
          this.users = res.data;
        })
        .catch((res) => {
          alert("ログインしてね");
        })
        .finally(() => {
          this.loading = false;
        });
      // });
    },
  },
  created() {
    this.fetchUserList();
  },
};
</script>
