<template>
  <table>
    <tr>
      <td>ユーザID</td>
      <td>
        <input type="text" v-model="username" />
      </td>
    </tr>
    <tr>
      <td>パスワード</td>
      <td>
        <input type="password" v-model="password" />
      </td>
    </tr>
    <tr>
      <td>
        <button @click="clickLoginBtn">ログイン</button>
      </td>
    </tr>
  </table>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      username: "",
      password: "",
    };
  },
  methods: {
    clickLoginBtn() {
      // axios.get("/sanctum/csrf-cookie").then((res) => {
      axios
        .post("http://127.0.0.1:8080/api/users/login", {
          username: this.username,
          password: this.password,
        })
        .then((res) => {
          if (res.data.success) {
            alert("ログイン成功！");
          } else {
            alert(res.data.msg);
          }
        });
      // });
    },
  },
};
</script>
