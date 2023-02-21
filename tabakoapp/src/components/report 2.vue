<template>
    <div>
        <div class="box">
            <img class="doctor_img" src="./PNG/doctor.png">
            <p class="doctor_text">
              {{nowstate.if_story}}
            </p>
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
    width: 90vw;
    height: 12vh;
    display: flex;
    background-color: white;
    color:black;
    margin:auto;
    margin-top:3vh;
    border: 0.3vh solid #000000;
    border-radius: 25px;
  }
  .doctor_img{
    height: 100%;
    margin:auto;
}
  .doctor_text{
      margin:auto;
      font-weight: bold;
  }
  </style>
  