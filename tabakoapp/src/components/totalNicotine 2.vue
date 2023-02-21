<template>
    <div>
        <div class="box">
            <img src="../PNG/nicotine.png" class="nicotineChar">
            <div class="param">
            <div class="text">総ニコチン</div>
            <div class="mg">{{nowstate.nicotine}}mg</div>
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
    height: 12vh;
    border: 2px solid black;
    border-radius: 20px;
    display: flex;
    position: relative;
    background-color: white;
    color: black;

  }
  .nicotineChar {
    width: 40%;
    height: 90%;
    margin: 3% 0 0 3%;
  }
  .param {
    position: absolute;
    right: 5%;
  }
  .text {
    margin: 20% 0 20% 0 ;
    font-weight: bold;
  }
  .mg {
    font-size: 110%;
    font-weight: bold;
  }
  </style>
  