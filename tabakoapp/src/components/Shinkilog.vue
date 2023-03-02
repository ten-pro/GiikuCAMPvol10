<template>
  <div>
    <img src="../components/PNG/title.png" alt="" class="title">
    <div class="sinki_area">
      <h3>新規登録</h3>
      <div class="user_name">
        <p>ユーザー名</p>
      <input type="text" class="name" v-model="namae">
      </div>
      <div class="user_pass">
        <p>パスワード</p>
      <input type="password" class="pass" v-model="pasu">
      </div>
      <img src="../components/PNG/touroku.png" alt="" class="touroku" @click="create_user">
    </div>
  </div>
</template>
<script setup>
import { reactive } from 'vue';
import axios from 'axios';
let namae = reactive([])
let pasu = reactive([])
const create_user=()=> {
            axios
                .post('http://mp-class.chips.jp/tobaco/main.php', {
                    number:smokingnumber,//今までに吸ってきた本数
										user_name:namae,//ユーザ名
                    user_pass:pasu,//パスワード
                    create_user: ''
                }, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(function (res) {
                    console.log(res)

                })
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
.sinki_area{
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
</style>