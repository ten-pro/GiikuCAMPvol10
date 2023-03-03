<template>
  <div>
    <img src="../components/PNG/title.png" alt="" class="title">
    <div class="login_area">
      <h3>ログイン</h3>
      <div class="user_name">
        <p>ユーザー名</p>
      <input type="text" class="name" v-model="state.name">
      </div>
      <div class="user_pass">
        <p>パスワード</p>
      <input type="password" class="pass" v-model="state.pass">
      </div>
      <!-- エラーの表示場所がおかしい -->
      <div v-show='state.error!=""' class="error">
          {{ state.error }}
      </div>
      <img src="../components/PNG/login.png" alt="" class="touroku" @click="login">
      <a href="/create" class="link">新規登録へ</a>
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
      .post('http://mp-class.chips.jp/tobaco/main.php', {
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
h3{
  text-align: center;
  font-size: 30px;
  position: absolute;
  top: 9vw;
  left: 35vw;
}
.login_area{
  position: relative;
}
.user_name{
  display: flex;
  padding: 7vw;
  position: absolute;
  top: 24vw;
}
.user_pass{
  display: flex;
  padding: 7vw;
  position: absolute;
  top:44vw;
}
.name{
  margin: 23px;
  border-radius: 10px;
}
.pass{
  margin: 23px;
  border-radius: 10px;
}
.error{
  position:absolute;
  width:80vw;
  margin-left:10vw;
  top:30vh;
  margin-top:3vh;
  color:red;
  text-align: center;
}
p{
  font-size: 23px;
}
.touroku{
  position: absolute;
  top: 38vh;
  left: 12vh;
  width: 50%;
  border-top-right-radius: 18px;
  border-bottom-right-radius:14px;
}
.link{
  position: absolute;
  top: 49vh;
  left: 18vh;
}
</style>