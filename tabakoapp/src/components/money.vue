<template>
    <div>
        <div class="box">
            <div class="text">合計金額</div>
            <div class="imgNum">
                <div v-bind:class="[bgImg == 1 ? 'bronze' : '',
                                    bgImg === 2 ? 'silver' : '',
                                    bgImg === 3 ? 'gold' : '',
                                    bgImg === 4 ? 'sen' : '',
                                    bgImg === 5 ? 'gosen' : '',
                                    bgImg === 6 ? 'man' : '',]">
                                </div>
                    <div class="num">{{ amount }}円</div>
             
            </div>
        </div>
    </div>
</template>
<script>
import { ref, reactive } from 'vue';
let img = reactive([
    {value: 1, name: "bronze"},
    {value: 2, name: "silver"},
    {value: 3, name: "gold"},
    {value: 4, name: "1000"},
    {value: 5, name: "5000"},
    {value: 6, name: "10000"},
])
let bgImg = ref(1)
let amount = ref(0)
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
}
.bronze {
    width: 40%;
    margin: 2% 0 0 3%;
    background-image: url("../PNG/bronze.png");
}
.silver {
    width: 40%;
    margin: 2% 0 0 3%;
    background-image: url("../PNG/silver.png");
}
.gold {
    width: 40%;
    margin: 2% 0 0 3%;
    background-image: url("../PNG/gold.png");
}
.sen {
    width: 40%;
    margin: 2% 0 0 3%;
    background-image: url("../PNG/1000.png");
}
.gosen {
    width: 40%;
    margin: 2% 0 0 3%;
    background-image: url("../PNG/5000.png");
}
.man {
    width: 40%;
    margin: 2% 0 0 3%;
    background-image: url("../PNG/10000.png");
}
.num {
    position: absolute;
    right: 8%;
    top: 50%;
}
  </style>
  