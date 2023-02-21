<template>
    <div>
<div class="box">
    <div class="text">吸った時間</div>
    <div class="imgNum">
      <img src="../PNG/clock.png" class="clock">
      <div class="num">{{nowstate.time}}分</div>
    </div>
</div>
    </div>
  </template>
  <script setup>
  const props = defineProps({
    nowstate: Object,
  })
  </script>
  <style scoped>
  .box {
    width: 40vw;
    position: relative;
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
  .imgNum {
    display: flex;
  }
  .clock {
    width: 45%;
  }
  .num {
position: absolute;
right: 10%;
top: 50%;
  }
  </style>
  