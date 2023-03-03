<template>
  <div>
    <img src="../components/PNG/title.png" alt="" class="title">
    <div class="login_area">
      <div class="login_text">ログイン</div>
      <div class="user_data user_text">
        <p>ユーザー名</p>
        <input type="text" class="name" v-model="state.name">
      </div>
      <div class="user_data">
        <p>パスワード</p>
      <input type="password" class="pass" v-model="state.pass">
      </div>
      <!-- エラーの表示場所がおかしい -->
      <div v-show='state.error!=""' class="error">
          {{ state.error }}
      </div>
      <div style="text-align:center;">
        <img src="../components/PNG/login.png" alt="" class="touroku" @click="login">
      </div>
      <div style="text-align:center;">
        <a href="/create" class="link">新規登録へ</a>
      </div>
    </div>
  </div>
</template>
<script setup>
import { reactive } from 'vue';
import axios from 'axios';
import swal from 'sweetalert'
let state = reactive({
  name:"",
  pass:"",
  error:"",
})

const login=()=>{
  if(state.name==""){
      state.error="ユーザー名を入力してください"
  }else if(state.pass==""){
      state.error="パスワードを入力してください"
  }else{
    axios
      .post('https://mp-class.chips.jp/tobaco/main.php', {
          user_name:state.name,
          user_pass:state.pass,
          login_user: ''
      }, {
          headers: {
              'Content-Type': 'multipart/form-data'
          }
      })
      .then(function (res) {
          console.log(res.data)
          
          if(res.data.chk){
            localStorage.setItem("tabaco_id",res.data.id);
            localStorage.setItem("name",res.data.name);
            location.href="/dashboard";
          }else{
            state.error="ユーザー名かパスワードが正しくありません"
          }
      })
    }
}
</script>
<style scoped>
.title{
  width: 100%;
}
.login_text{
  font-size:6vh;
  font-weight: bold;
  text-align: center;
}
.user_data{
  width:40vw;
  margin:auto;
  margin-top:6vh;
}
.user_text{
  margin-top:10vh;
}
.touroku{
  width:45vw;
  margin-top:6vh;
}
</style>