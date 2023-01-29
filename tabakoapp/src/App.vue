<template>
  <div v-bind:class="[bgimg.value === 1 ? 'peace' : '',
                        bgimg.value === 2 ? 'maruboro' : '',
                        bgimg.value === 3 ? 'ent' : '',
                        bgimg.value === 4 ? 'winston' : '',
                        bgimg.value === 5 ? 'amerikan' : '',
                        bgimg.value === 6 ? 'hilite' : '',
                        bgimg.value === 7 ? 'wakaba' : '',]">
    <label class="selectbox-003">
      <select v-model="bgimg.value"  @click="changefunk">
        <option v-for="tabako in tabakos" :value="tabako.value" :selected="tabako.value == bgimg.value" :key="tabako.value">
          {{ tabako.name }}
        </option>
      </select>
    </label>
    <router-view :nowbg="bgimg"/>
  </div>
</template>
<script setup>
import { ref,reactive,watch } from 'vue';
let tabakos = reactive([
  {value:1,name:"ピース"},
  {value:2,name:"マルボロ"},
  {value:3,name:"ケント"},
  {value:4,name:"ウィンストン"},
  {value:5,name:"スピリット"},
  {value:6,name:"ハイライト"},
  {value:7,name:"わかば"},
])
let bgimg = reactive({
  value:1,
})
console.log(localStorage.getItem("bgimg"))
if(localStorage.getItem("bgimg")>0){
  bgimg.value=parseInt(localStorage.getItem("bgimg"));
  console.log("aaa")
}
const changefunk=()=>{
  console.log(bgimg.value)
  localStorage.removeItem("bgimg");
  // localStorage.setItem("bgimg",bgimg.value);
}
</script>
<style>
.peace{
    position: absolute;
    width: 100vw;
    height:100vh;
    background-image: url("./components/PNG/bg_peace.png");
    background-size: 100vw 100vh;
    color:white;
}
.maruboro{
    position: absolute;
    width: 100vw;
    height:100vh;
    background-image: url("./components/PNG/bg_maruboro.png");
    background-size: 100vw 100vh;
    color:black;
}
.ent{
    position: absolute;
    width: 100vw;
    height:100vh;
    background-image: url("./components/PNG/bg_ent.png");
    background-size: 100vw 100vh;
    color:white;
}
.winston{
    position: absolute;
    width: 100vw;
    height:100vh;
    background-image: url("./components/PNG/bg_winston.png");
    background-size: 100vw 100vh;
    color:black;
}
.amerikan{
    position: absolute;
    width: 100vw;
    height:100vh;
    background-image: url("./components/PNG/bg_amerikan.png");
    background-size: 100vw 100vh;
    color:black;
}
.hilite{
    position: absolute;
    width: 100vw;
    height:100vh;
    background-image: url("./components/PNG/bg_hilite.png");
    background-size: 100vw 100vh;
    color:black;
}
.wakaba{
    position: absolute;
    width: 100vw;
    height:100vh;
    background-image: url("./components/PNG/bg_wakaba.png");
    background-size: 100vw 100vh;
    color:white;
}




/* セレクトボックスのCSS */
.selectbox-003 {
    display: inline-flex;
    align-items: center;
    position: relative;
    margin-top:2vh;
    margin-left:2vw;
}

.selectbox-003::after {
    position: absolute;
    right: 15px;
    width: 10px;
    height: 7px;
    background-color: #777;
    clip-path: polygon(0 0, 100% 0, 50% 100%);
    content: '';
    pointer-events: none;
}

.selectbox-003 select {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    min-width: 150px;
    height: 40px;
    padding: 5px 50px 5px 15px;
    border: 1px solid #d0d0d0;
    border-radius: 25px;
    background-color: #fff;
    color: #555;
    cursor: pointer;
    background-color: rgb(209, 209, 209);
}
</style>