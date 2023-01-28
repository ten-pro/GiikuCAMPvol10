<template>
    <div>
<div class="box">
    <div class="text">合計金額</div>
    <div class="imgNum">
        <img :src="imagePath" class="moneyImg">
        <!-- <img src="../PNG/bronze.png" alt=""> -->
        <div class="num">{{ amount }}円</div>
    </div>
</div>
<div class="">nnn</div>
    </div>
</template>
<script>
import { reactive, computed } from "@vue/reactivity"

export default {
    setup() {
        const images = {
            0: '../PNG/bronze.png',
            5000: '../PNG/silver.png',
            10000: '../PNG/gold.png',
            50000: '../PNG/1000.png',
            100000: '../PNG/5000.png',
            1000000: '../PNG/10000.png'
        }
        const moneyNum = reactive({ amount: 1, })
        const imagePath = computed(() => {
    const keys = Object.keys(images).sort((a, b) => a - b)
    for (let key of keys) {
        if (moneyNum.amount <= key) {
            return images[key]
        }
    }
    return images[keys[keys.length - 1]]
}, [moneyNum])


        return {
            ...moneyNum,
            imagePath
        }
    }
}
</script>

  <style scoped>
  .box {
    width: 40vw;
    height: 12vh;
    border: 2px solid black;
    border-radius: 20px;
    margin: 0 5vw 0 0;
    position: relative;
  }
.text {
    font-size: 110%;
    font-weight: bold;
    margin: 5% 0 0 5%;
}
.imgNum {
    display: flex;
}
.moneyImg {
    width: 40%;
    margin: 2% 0 0 3%;
}
.num {
    position: absolute;
    right: 8%;
    top: 50%;
}
  </style>
  