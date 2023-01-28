<template>
    <div class="rap">
        <div class="title">タイトル</div>
        <div class="doctor_area">
            <img class="doctor_img" src="./PNG/doctor.png">
            <p class="doctor_text">
                今まで吸ってきたタバコを<br>
                計算しちゃいます！
            </p>
        </div>
        <Transition>
        <div v-if="question==1">
            <h1>Q1</h1>
            <div class="question">
                何年何か月<br>
                吸っていますか？<br>
                <p>（やめていた期間を除いて）</p>
            </div>
            <div class="input_area">
                <input type="number" max="120" min="0" class="input_box" v-model="questions.year"/><p>年</p>
                <input type="number" max="12" min="0" class="input_box" v-model="questions.month"/><p>か月</p>
            </div>
            <div class="tabako_img" @click="++question">
                次の質問
            </div>
        </div>
        <div v-else>
            <h1>Q2</h1>
            <div class="question">
                一日何本<br>
                吸っていますか？<br>
                <p>（今まで吸ってきた期間の平均）</p>
            </div>

            <div v-if="nowbg==1 || nowbg==3 || nowbg==7" class="return_white" @click="--question"></div>
            <div v-else class="return_black" @click="--question"></div>

            <div class="input_area">
                <input type="number" min="0" class="input_box" v-model="questions.day"/><p>本</p>
            </div>
            <div class="tabako_img" @click="createfunk">
                計算する！
            </div>
        </div>
        </Transition>
    </div>
</template>
<script setup>
import { ref,reactive } from 'vue';
import axios from 'axios';
let question = ref(1)
let questions = reactive({
    year:0,
    month:0,
    day:0,
})
try{
    // let tabaco_id=localStorage.getItem("tabaco_id");
    // if(tabaco_id!=null){
    //     location.href="/dashboard";
    // }
}catch(error){
}

const createfunk=()=>{
    console.log(questions)
    axios
        .post('http://mp-class.chips.jp/tobaco/main.php', {
            number:(questions.year*365+questions.month*30)*questions.day,//今までに吸ってきた本数
            create_user: ''
        }, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
        .then(function (res) {
            console.log(res.data)
            localStorage.setItem("tabaco_id",res.data);
            location.href="/dashboard";
        })
}
const props = defineProps({
    nowbg: Number,
})
</script>
<style scoped>
p{
    margin: 0px;
    font-size: 2.1vh;
}
h1{
    width:30vw;
    margin:3vh auto;
    font-size:8vh;
    text-align: center;
    transition: width 1s ease-in-out;
}
.title{
    margin-top:5vh;
    text-align: center;
    font-size:6vh;
}
.doctor_area{
    display: flex;
    background-color: white;
    color:black;
    margin:auto;
    margin-top:5vh;
    width: 80vw;
    height:10vh;
    border: 0.5vh solid #000000;
    border-radius: 25px;
}
.doctor_img{
    height: 100%;
    margin:auto;
}
.doctor_text{
    margin:auto;
}
.question{
    margin:2vh auto;
    font-size:3.5vh;
    text-align: center;
}
.input_area{
    display: flex;
    justify-content: center;
    gap:3vw;
    margin:auto;
    margin-top:7vh;
}
.input_box{
    width: 20vw;
    border-radius: 20px;
    text-align: center;
    font-weight: bold;
}
.return_white{
    position:absolute;
    top:60vh;
    width:10vw;
    height:5vh;
    background-image: url("./PNG/left_white.png");
    background-size: 100% 100%;
}
.return_black{
    position:absolute;
    top:60vh;
    width:10vw;
    height:5vh;
    background-image: url("./PNG/left_black.png");
    background-size: 100% 100%;
}
.tabako_img{
    display: flex;
    justify-content: center;
    align-items: center;
    color:black;
    font-size: 2vh;
    font-weight: bold;
    margin:9vh auto;
    width:35vw;
    height: 5vh;
    background-image: url("./PNG/tabako_button.png");
    background-size: 100% 100%;
}
.tabako_text{
    position: absolute;
    left:50%;
}
.v-enter-active,
.v-leave-active {
  transition: opacity 1s ease;
}

.v-enter-from,
.v-leave-to {
  opacity: 0;
}
</style>