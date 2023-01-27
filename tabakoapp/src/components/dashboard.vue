<template>
    <div>
        <headerr />
        <div class="dayChange">
            <button class="day">Day</button>
            <button class="month">Month</button>
            <button class="all">All</button>
        </div>
        <div class="threeMain">
            <div class="leftArrow"></div>
            <total />
            <div class="rightArrow"></div>
        </div>
        <div class="harmful">
            <totalNicotine />
        </div>
    </div>
  </template>
  <script setup>
  import headerr from './headerr.vue'
  import total from './total.vue'
  import totalNicotine from './totalNicotine.vue'
  </script>
  <style scoped>
.dayChange {
    justify-content: space-around;
    width: 100vw;
}
.dayChange {
    margin: 4vh 0 0 0;
    display: flex;
    justify-content: space-evenly;
}
.day, .month, .all {
    font-size: 100%;
    font-weight: bold;
    border: 2px solid black;
    background-color: white;
    height: 5vh;
    width: 18vw;
    border-radius: 100px;
}
.threeMain {
    margin: 3vh 0 0 0;
    display: flex;
    align-items: center;
    justify-content: space-evenly;
}
.leftArrow {
    width: 0px;
    height: 0px;
    border-top: 25px solid transparent;
  border-bottom: 25px solid transparent;
  border-right: 50px solid black;
}
.rightArrow {
    width: 0px;
    height: 0px;
    border-top: 25px solid transparent;
  border-bottom: 25px solid transparent;
  border-right: 50px solid black;
    transform: rotate(180deg);
}
  </style>
