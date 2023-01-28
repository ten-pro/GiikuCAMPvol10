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
        <div class="around">
            <div class="harmful">
                <totalNicotine />
                <totalTar />
            </div>
        </div>
        <div class="life">
            <hitPoint />
        </div>

        <div class="around">
            <div class="contents">
                <risk />
                <money />
                <buy />
                <times />
                <ranking />
                <tax />
                <trivia />
            </div>
        </div>
        <div class="life">
            <report />
        </div>
        <div class="life bottom">
            <graph />
        </div>
        <Futter class="futter" />
    </div>
</template>
  <script setup>
  import headerr from './headerr.vue'
  import total from './total.vue'
  import totalNicotine from './totalNicotine.vue'
  import totalTar from './totalTar.vue'
  import hitPoint from './hitPoint.vue'
  import Futter from './Futter.vue'
  import risk from './risk.vue'
  import money from './money.vue'
  import buy from './buy.vue'
  import times from './times.vue'
  import ranking from './ranking.vue'
  import tax from './tax.vue'
  import trivia from './trivia.vue'
  import report from './report.vue'
  import graph from './graph.vue'
  
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
.around {
    display: flex;
    justify-content: center;
}
.harmful {
    width: 90vw;
    margin: 3vh 0 0 0;
    display: flex;
    justify-content: space-between;
}
.life {
    display: flex;
    justify-content: center;
}
.contents {
    display: flex;
    margin: 3vh 0 0 0;
    width: 90vw;
    overflow: scroll;
    -ms-overflow-style: none;
    scrollbar-width: none;
}
.contents::-webkit-scrollbar {
    display: none;
}
.futter {
    position: fixed;
    bottom: 0px;
}
.bottom {
    margin: 0 0 13vh 0;
}
  </style>
