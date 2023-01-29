<template>
    <div>
        <div class="circle">
            <div class="totalText">合計</div>
            <div class="totalNum">{{props.nowstate.num}}本</div>
        </div>
    </div>
  </template>
  <script setup>
  import {reactive,watch} from "vue"

  const props = defineProps({
    nowstate: Object,
  })
  </script>
  <style scoped>
  .circle {
    position: relative;
    width: 30vmin;
    height: 30vmin;
    border-radius: 50%;
    border: 2px solid black;
  }
  .totalText {
    position: absolute;
left: 50%;
top: 10%;
transform: translateX(-50%);
font-size: 130%;
  }
  .totalNum {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    top: 50%;
    font-size: 150%;
    white-space: nowrap;
  }
  </style>
  