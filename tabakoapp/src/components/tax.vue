<template>
    <div>
<div class="box">
    <div class="text">税金</div>
    <div class="con">
    <img src="../PNG/tax.png" class="tax">
    <div class="num">0000円</div>
</div>
</div>
    </div>
  </template>
  <script setup>
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
    margin: 5% 0 0 10%;
}
.con {
    display: flex;
}
.tax {
    width: 30%;
    margin: 0 0 0 5%;
}
.num {
    position: absolute;
    right: 10%;
    top: 40%
}
  </style>

    