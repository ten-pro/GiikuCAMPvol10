<template>
    <div>
<div class="box">
    <div class="text">買えていたもの</div>
</div>
    </div>
  </template>
  <script setup>
  import { reactive, computed } from "@vue/reactivity"

        const images = {
            0: '../PNG/genki.png',
            100: '../PNG/juice.png',
            1000: '../PNG/lunch.png',
            10000: '../PNG/ryokou.png',
            100000: '../PNG/burando.png',
            500000: '../PNG/hichair.png',
            1000000: '../PNG/truvel.png'
        }
        
        const moneyNum = reactive({ amount: 1, })
        const imagePath = (() => {
            const keys = Object.keys(images).sort((a, b) => a - b)
            for (let key of keys) {
                if (moneyNum.amount <= key) {
                    return images[key]
                }
            }
            return images[keys[keys.length - 1]]
        }, [moneyNum])



  
  </script>
  <style scoped>
  .box {
    width: 40vw;
    height: 12vh;
    border: 2px solid black;
    border-radius: 20px;
    margin: 0 5vw 0 0;
    background-color: white;
    color: black;
  }
  .text {
    font-size: 110%;
    font-weight: bold;
    margin: 5% 0 0 5%;
}
  </style>
  