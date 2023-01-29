<template>
    <div class="wrap">
        <headerr />
        <div class="dayChange">
            <button class="day">Day</button>
            <button class="month">Month</button>
            <button class="all">All</button>
        </div>
        <div class="threeMain">
            <div class="leftArrow"></div>
            <total :nowstate="childprops"/>
            <div class="rightArrow"></div>
        </div>
        <div class="around">
            <div class="harmful">
                <totalNicotine :nowstate="childprops"/>
                <totalTar :nowstate="childprops"/>
            </div>
        </div>
        <div class="life">
            <hitPoint :nowstate="childprops"/>
        </div>

        <div class="around">
            <div class="contents">
                <risk/>
                <money :nowstate="childprops"/>
                <buy :nowstate="childprops"/>
                <times :nowstate="childprops"/>
                <ranking :nowstate="childprops"/>
                <tax :nowstate="childprops"/>
                <trivia :nowstate="childprops"/>
            </div>
        </div>
        <div class="life">
            <report :nowstate="childprops"/>
        </div>
        <div class="life bottom">
            <graph />
        </div>
        <Futter class="futter" />
    </div>
</template>
  <script setup>
  import {reactive} from "vue"
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
  
  import axios from 'axios'
  let today=reactive({
    num:0,
    money:0,
    tax:0,
    tar:0,
    nicotine:0,
    time:1040,
    lifespan:"",
    if_money:"",
    if_story:"",
  })
  let all=reactive({
    num:0,
    money:0,
    tax:0,
    tar:0,
    nicotine:0,
    time:1040,
    lifespan:"",
    if_money:"",
    if_story:"",
  })
  let this_month=reactive({
    num:0,
    money:0,
    tax:0,
    tar:0,
    nicotine:0,
    time:1040,
    lifespan:"",
    if_money:"",
    if_story:"",
  })
  let one_month=reactive({
    num:0,
    money:0,
    tax:0,
    tar:0,
    nicotine:0,
    time:1040,
    lifespan:"",
    if_money:"",
    if_story:"",
  })
  let two_month=reactive({
    num:0,
    money:0,
    tax:0,
    tar:0,
    nicotine:0,
    time:1040,
    lifespan:"",
    if_money:"",
    if_story:"",
  })
  let childprops=reactive({
    num:0,
    money:0,
    tax:0,
    tar:0,
    nicotine:0,
    time:1040,
    lifespan:"",
    if_money:"",
    if_story:"",
  })
  async function fetchData() {
    const res = await axios.post('http://mp-class.chips.jp/tobaco/main.php', {
            user_id:1,//ユーザID
            login_user: ''
        }, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
        
        let resall=res.data.tobaco.all;
        console.log(res.data)
        all.num=resall.num;
        all.money=resall.money;
        all.tax=resall.tax;
        all.tar=resall.tar;
        all.nicotine=resall.nicotine;
        all.time=resall.time;
        all.lifespan=resall.lifespan;
        all.if_money=resall.if.if_money;
        all.if_story=resall.if.if_story;

        childprops.num=resall.num;
        childprops.money=resall.money;
        childprops.tax=resall.tax;
        childprops.tar=resall.tar;
        childprops.nicotine=resall.nicotine;
        childprops.time=resall.time;
        childprops.lifespan=resall.lifespan;
        childprops.if_money=resall.if.if_money;
        childprops.if_story=resall.if.if_story;

        resall=res.data.tobaco.today;
        today.num=resall.num;
        today.money=resall.money;
        today.tax=resall.tax;
        today.tar=resall.tar;
        today.nicotine=resall.nicotine;
        today.time=resall.time;
        today.lifespan=resall.lifespan;
        today.if_money=resall.if.if_money;
        today.if_story=resall.if.if_story;

        resall=res.data.tobaco.this_morth;
        this_month.num=resall.num;
        this_month.money=resall.money;
        this_month.tax=resall.tax;
        this_month.tar=resall.tar;
        this_month.nicotine=resall.nicotine;
        this_month.time=resall.time;
        this_month.lifespan=resall.lifespan;
        this_month.if_money=resall.if.if_money;
        this_month.if_story=resall.if.if_story;

        resall=res.data.tobaco.one_morth;
        one_month.num=resall.num;
        one_month.money=resall.money;
        one_month.tax=resall.tax;
        one_month.tar=resall.tar;
        one_month.nicotine=resall.nicotine;
        one_month.time=resall.time;
        one_month.lifespan=resall.lifespan;
        one_month.if_money=resall.if.if_money;
        one_month.if_story=resall.if.if_story;

        resall=res.data.tobaco.two_morth;
        two_month.num=resall.num;
        two_month.money=resall.money;
        two_month.tax=resall.tax;
        two_month.tar=resall.tar;
        two_month.nicotine=resall.nicotine;
        two_month.time=resall.time;
        two_month.lifespan=resall.lifespan;
        two_month.if_money=resall.if.if_money;
        two_month.if_story=resall.if.if_story;
        console.log(today)
        console.log(this_month)
        console.log(one_month)
        console.log(two_month)
        console.log(all)
        console.log(childprops)
}
fetchData();
  </script>
  <style scoped>
  .wrap{
    overflow: auto;
    height: 80vh;
  }
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
