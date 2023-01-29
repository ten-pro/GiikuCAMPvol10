<template>
    <div>
        <div class="box">
            <div class="text">合計金額</div>
            <div class="imgNum">
                <div v-bind:class="[nowstate.money > 10000000 ? 'man' : '',
                                    nowstate.money > 1000000 ? 'gosen' : '',
                                    nowstate.money > 100000 ? 'sen' : '',
                                    nowstate.money > 10000 ? 'gold' : '',
                                    nowstate.money > 1000 ? 'silver' : '',
                                    nowstate.money >= 0 ? 'bronze' : '',]"></div>
                    <div class="num">{{ nowstate.money }}円</div>
             
            </div>
        </div>
    </div>
</template>
<script setup>
import { ref, reactive } from 'vue';
let img = reactive([
    {value: 1, name: "bronze"},
    {value: 2, name: "silver"},
    {value: 3, name: "gold"},
    {value: 4, name: "1000"},
    {value: 5, name: "5000"},
    {value: 6, name: "10000"},
])
let bgImg = reactive({
    value:1
})
console.log(bgImg.value)
const props = defineProps({
    nowstate: Object,
  })
</script>

  <style scoped>
  .box {
    width: 40vw;
    height: 12vh;
    border: 2px solid black;
    border-radius: 20px;
    margin: 0 5vw 0 0;
    position: relative;
    background-color: white;
    color: black;
  }
.text {
    font-size: 110%;
    font-weight: bold;
    margin: 5% 0 0 5%;
}
.imgNum {
    display: flex;
    justify-content: space-around;
    align-items: center;
}
.bronze {
    width: 13vw;
    height:13vw;
    background-image: url("../PNG/bronze.png");
    background-size: 100% 100%;
}
.silver {
    width: 13vw;
    height:13vw;
    background-image: url("../PNG/silver.png");
    background-size: 100% 100%;
}
.gold {
    width: 13vw;
    height:13vw;
    background-image: url("../PNG/gold.png");
    background-size: 100% 100%;
}
.sen {
    width: 13vw;
    height:13vw;
    background-image: url("../PNG/1000.png");
    background-size: 100% 100%;
}
.gosen {
    width: 13vw;
    height:13vw;
    background-image: url("../PNG/5000.png");
    background-size: 100% 100%;
}
.man {
    width: 13vw;
    height:13vw;
    background-image: url("../PNG/10000.png");
    background-size: 100% 100%;
}
  </style>
  