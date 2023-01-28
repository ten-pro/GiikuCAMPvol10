<template>
    <div>
        <div class="box">
            <div class="text">失った寿命</div>
            <div class="life">
            <div class="yyyy">99年</div>
            <div class="mm">12月</div>
            <div class="dd">31日</div>
            <div class="hh">24時間</div>
          </div>
            <img src="../PNG/t100.png" class="t">
        </div>
    </div>
  </template>
  <script setup>
  
  </script>
  <style scoped>
  .box {
    display: flex;
    width: 90vw;
    height: 12vh;
    border: 2px solid black;
    border-radius: 20px;
    margin: 3vh 0 0 0;
    position: relative;
    justify-content: space-evenly;
    background-color: white;
    color: black;
  }
.yyyy, .mm, .dd, .hh {
    font-size: 120%;
    margin:  1% 0 0 0%;
  }
  .text {
    font-weight: bold;
    font-size: 120%;
    margin:  1% 0 0 0%;
  }
  .life {
    position: absolute;
    width: 90%;
    top: 40%;
    display: flex;
    justify-content: space-evenly;
    z-index: 1;
    font-weight: bold;
  }
  .t {
    position: absolute;
    width: 90%;
    bottom: 10%;
    /* 100.10
    60.15
    40.20
    10.25*/
  }
  </style>
  