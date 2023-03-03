<template>
    <div>
        <div class="img_area">
            <Toroku />
            <Bacode />
        </div>
        <div class="goukei_area">
            <div class="goukei_text">
                <span class="goukei">合計:{{hairetu.sum}}本</span>
            </div>
        </div>
        <div class="henkou_area">
            <div class="hako_area">
                <span class="pura20" @click="addsum20">+20</span>
                <img src="../PNG/hakotabako.png" alt="" class="hako">
                <span class="mai20" @click="hikusum20">-20</span>
            </div>
            <div class="hon_area">
                <span class="pura1" @click="addsum1">+1</span>
                <img src="../PNG/ippon.png" alt="" class="ippon">
                <span class="mai1" @click="hikusum1">-1</span>
            </div>
        </div>
        <div class="sousin_area">
            <img src="../PNG/sousin1.png" alt="" class="sousin" @click="create_smoking">
        </div>        
        <Futter />
    </div>
</template>
<script setup>
import axios from 'axios'
import {reactive} from "vue"
import Toroku from './Honsu/Toroku.vue'
import Bacode from './Honsu/bacode.vue'
import Futter from './Futter.vue'

const hairetu = reactive({
    sum:0
})
const addsum20 = () =>{
    hairetu.sum += 20;
}
const hikusum20 = () =>{
    hairetu.sum -= 20;
}
const addsum1 = () =>{
    hairetu.sum += 1;
}
const hikusum1 = () =>{
    hairetu.sum -= 1;
}
const create_smoking=() =>{
            axios
                .post('https://mp-class.chips.jp/tobaco/main.php', {
                    user_id: localStorage.getItem("tabaco_id"),
                    number:hairetu.sum,
                    create_smoking: ''
                }, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(function(res){
                    location.href="/dashboard"
                })
        }
</script>
<style scoped>
.img_area{
    display: flex;
    justify-content: space-around;
    height: 10vh;
    width: 100%;
    margin-top: 3vh;
}
.goukei_area{
    border:2px solid #000000;
    width: 30vh;
    height: 7vh;
    margin: auto;
    margin-top: 1vh;
    background-color: white;
    color: black;
    border-radius: 10px;
}
.henkou_area{
    height: 45vh;
    width: 100%;
    display: flex;
}
.hako_area{
    display: flex;
    flex-direction: column;
    width: 50%;
    text-align: center;
}
.hon_area{
    display: flex;
  flex-flow: column;
  width: 50%;
  text-align: center;

}

.pura20{
    margin-top: 1vh;
    font-size: 40px;
    color: #ffffff;
    text-shadow    : 
       2px  2px 1px black,
      -2px  2px 1px black,
       2px -2px 1px black,
      -2px -2px 1px black,
       2px  0px 1px black,
       0px  2px 1px black,
      -2px  0px 1px black,
       0px -2px 1px black;  
}
.hako{
    width: 20vh;
    margin: auto;
    margin-top: 2vh;
    margin-bottom: 3vh;
}
.mai20{
    font-size: 40px;
    color: #ffffff;
    text-shadow    : 
       2px  2px 1px black,
      -2px  2px 1px black,
       2px -2px 1px black,
      -2px -2px 1px black,
       2px  0px 1px black,
       0px  2px 1px black,
      -2px  0px 1px black,
       0px -2px 1px black;  
}
.pura1{
    margin-top: 0.7vh;
    font-size: 40px;
    color: #ffffff;
    text-shadow    : 
       2px  2px 1px black,
      -2px  2px 1px black,
       2px -2px 1px black,
      -2px -2px 1px black,
       2px  0px 1px black,
       0px  2px 1px black,
      -2px  0px 1px black,
       0px -2px 1px black;  
}
.ippon{
    width: 7vh;
    margin: auto;
    margin-top: 0.4vh;
    margin-bottom: 1vh;
}
.mai1{
    font-size: 40px;
    color: #ffffff;
    text-shadow    : 
       2px  2px 1px black,
      -2px  2px 1px black,
       2px -2px 1px black,
      -2px -2px 1px black,
       2px  0px 1px black,
       0px  2px 1px black,
      -2px  0px 1px black,
       0px -2px 1px black;  
}
.sousin{
    width: 55%;
    border-top-right-radius: 18px;
    border-bottom-right-radius:14px;
    cursor: pointer;
}

.goukei{
    font-size: 40px;
    font-weight: bold;
}
.sousin_area{
    text-align: center;
    margin-top: 4vh;
}
.goukei_text{
    text-align: center;
}


</style>