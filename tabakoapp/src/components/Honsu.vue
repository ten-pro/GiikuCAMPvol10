<template>
    <div>
        <div class="img_area">
            <Toroku />
            <Bacode />
        </div>
        <div class="goukei_area">
                <span class="goukei">合計:{{hairetu.sum}}本</span>
            </div>
        <div class="henkou_area">
            <span class="pura20" @click="addsum20">+20</span>
            <img src="../PNG/hakotabako.png" alt="" class="hako">
            <span class="mai20" @click="hikusum20">-20</span>
            <span class="pura1" @click="addsum1">+1</span>
            <img src="../PNG/ippon.png" alt="" class="ippon">
            <span class="mai1" @click="hikusum1">-1</span>
            <img src="../PNG/sousin.png" alt="" class="sousin" @click="create_smoking">
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
                .post('http://mp-class.chips.jp/tobaco/main.php', {
                    user_id: 1,
                    number:hairetu.sum,
                    create_smoking: ''
                }, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(
                    (response) => (console.log(response.data)),

                )
        }
</script>
<style scoped>
.img_area{
    position: relative;
    top:6vh;
    height: 10vh;
    width: 100%;
}
.goukei_area{
    position: relative;
    border:2px solid #000000;
    top:9vh;
    width: 20vh;
    text-align: center;
    margin: 0 auto;
}
.henkou_area{
    position: relative;
    top:11vh;
    height: 60vh;
    width: 100%;
    margin:0 auto;
}

.pura20{
    position: absolute;
    top: 1.5vh;
    left: 7vh;
    font-size: 50px;
    display: inline-block;
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
    position: absolute;
    width: 22vh;
    top:13vh;
    left: 3vh;
}
.mai20{
    position: absolute;
    top: 43vh;
    left: 7vh;
    font-size: 50px;
    display: inline-block;
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
    position: absolute;
    top: 1vh;
    left: 31vh;
    font-size: 50px;
    display: inline-block;
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
    position: absolute;
    width: 8vh;
    top: 10vh;
    left: 31vh;
}
.mai1{
    position: absolute;
    top: 43vh;
    left: 32vh;
    font-size: 50px;
    display: inline-block;
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
    position: absolute;
    top: 53vh;
    left: 10vh;
    text-align: center;
    width: 60%;
}

.goukei{
    font-size: 30px;
}
</style>