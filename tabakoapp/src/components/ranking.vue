<template>
    <div>
<div class="box">
    <div class="text">禁煙ランキング</div>
    <div class="conn">
    <div class="con">
        <div class="one">1.VAPE</div>
        <div class="two">2.茶葉スティック</div>
        <div class="three">3.ミントガム</div>
    </div>
</div>
</div>
    </div>
  </template>
  <script setup>
  </script>
  <style scoped>
  .box {
    width: 35vw;
    height: 12vh;
    border: 2px solid black;
    border-radius: 20px;
    margin: 0 5vw 0 0;
    background-color: white;
    color: black;
  }
.text {
    font-size: 100%;
    font-weight: bold;
    margin: 5% 0 0 5%;
  }
  .con {
    font-size: 80%;
    font-weight: 600;
    margin: 5% 0 0 0;
  }
  .conn {
    display: flex;
    justify-content: center;
  }
 .one {
color: red;
 }
 .two {
    color: rgb(0, 255, 140);
 }
 .three {
color: blue;
 }
  </style>
  