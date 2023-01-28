<template>
    <div>
        <div class="doctor_area">
            <img class="doctor_img" src="./PNG/doctor.png">
            <p class="doctor_text">
                あなたが吸ってきたタバコの<br>
                縦の長さは{{  }}<br>
                までの距離と同じです
            </p>
        </div>
        <div class="distance">
            {{state.distance.toString().length < 7 ? state.distance : state.distance.toString().length < 8 ? state.distance/10 : state.distance.toString().length < 10 ? state.distance/100000 : state.distance/100000000}}
            {{ state.distance.toString().length < 7 ? "mm" : state.distance.toString().length < 8 ? "cm" : state.distance.toString().length < 10 ? "M" : "Km"}}
        </div>
        <!-- <div class="tabako_area">   
            <img  v-for="i in 999" :key="i" class="tabako_img" src="./PNG/tabako_distance.png">
            <div class="now_distance" v-if="i%40==0">{{ i*85 }}mm</div>
        </div> -->
        <div class="tabako_area">
            <div  v-for="i in Math.ceil(state.tabako_count/5)" :key="i">
                <div class="now_distance_5vh" v-if="i%40==0">{{ i*85*5/10 }}cm</div>
                <img class="tabako_img" src="./PNG/tabako_distance.png">
                <img v-if="state.tabako_count-i*5+1>0" class="tabako_img" src="./PNG/tabako_distance.png">
                <img v-if="state.tabako_count-i*5+2>0" class="tabako_img" src="./PNG/tabako_distance.png">
                <img v-if="state.tabako_count-i*5+3>0" class="tabako_img" src="./PNG/tabako_distance.png">
                <img v-if="state.tabako_count-i*5+4>0" class="tabako_img" src="./PNG/tabako_distance.png">
            </div>
        </div>
    </div>
</template>
<script setup>
import {reactive} from "vue"
let tate=85;
let state = reactive({
    distance:1700000000000,
    tabako_count:200,
})

</script>
<style scoped>
.doctor_area{
    display: flex;
    background-color: white;
    color:black;
    margin:auto;
    margin-top:2vh;
    width: 90vw;
    height:10vh;
    border: 0.5vh solid #000000;
    border-radius: 25px;
}
.doctor_img{
    height: 100%;
    margin:auto;
    margin-right:0px;
}
.doctor_text{
    margin:auto;
    font-size:1.8vh;
}
.distance{
    text-align: center;
    margin:auto;
    margin-top:3vh;
    padding:1vh;
    font-size: 5vh;
    font-weight: bold;
    background-color: white;
    width: 80vw;
    border:1vh solid black;
    border-radius: 40px;
    color:#000000;
    -webkit-text-stroke: 0.8vw rgb(0, 0, 0);
}
.tabako_area{
    margin:auto;
    border: 1.5vw solid black;
    border-radius: 20px;
    margin-top:3vh;
    padding:5vw;
    width:80vw;
    height:55vh;
    overflow:auto;
    background-color: white;
}
.tabako_img{
    width:16vw;
    height:2vh;
    background-image: url("./PNG/tabako_distance.png");
    background-size: 100% 100%;
}
.now_distance_5vh{
    color:black;
    font-size: 5vh;
    font-weight: bold;
    text-align: center;
}
.now_distance_4vh{
    color:black;
    font-size: 5vh;
    font-weight: bold;
    text-align: center;
}
</style>
  