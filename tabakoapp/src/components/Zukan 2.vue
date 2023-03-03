<template>
    <div>
        <div class="img_area">
            <div class="flex_area">
                <img :class="[active.peace ? 'img_active' : 'img_none']" src="./PNG/peace.jpg">
                <img :class="[active.maruboro ? 'img_active' : 'img_none']" src="./PNG/maruboro.jpg">
                <img :class="[active.kent ? 'img_active' : 'img_none']" src="./PNG/kent.jpg">
            </div>
            <div class="flex_area">
                <img :class="[active.winston ? 'img_active' : 'img_none']" src="./PNG/winston.jpg">
                <img :class="[active.american ? 'img_active' : 'img_none']" src="./PNG/american.jpg">
                <img :class="[active.hilite ? 'img_active' : 'img_none']" src="./PNG/hilite.jpg">
            </div>
            <div class="flex_area">
                <img :class="[active.wakaba ? 'img_active' : 'img_none']" src="./PNG/wakaba.jpg">
            </div>
        </div>
        <Futter />
    </div>
</template>
<script setup>
import Futter from "./Futter.vue"
import {reactive} from "vue"
import axios from "axios";
let active=reactive({
    peace:false,
    maruboro:false,
    kent:false,
    winston:false,
    american:false,
    hilite:false,
    wakaba:false,
})

axios
    .post('https://mp-class.chips.jp/tobaco/main.php', {
        user_id:localStorage.getItem("tabaco_id"),//ユーザID
        get_user: ''
    }, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    })
    .then(function (res) {
        console.log(res.data)
        let zukan = res.data.zukan;
        for(let i=0;i<zukan.length;i++){
            switch(zukan[i]){
                case 1:
                    active.peace=true;
                break;
                case 2:
                    active.maruboro=true;
                break;
                case 3:
                    active.kent=true;
                break;
                case 4:
                    active.winston=true;
                break;
                case 5:
                    active.american=true;
                break;
                case 6:
                    active.hilite=true;
                break;
                case 7:
                    active.wakaba=true;
                break;
            }
        }
    })
</script>
<style scoped>
.img_area{
    width: 80vw;
    margin: auto;
    margin-top:5vh;
    display: flex;
    flex-flow: column;
    align-items: center;
    gap:5vh;
}
.flex_area{
    display: flex;
    justify-content:center;
    gap:5vw;
}
.img_active{
    width:25vw;
}
.img_none{
    width:25vw;
    opacity: 0.5;
}
</style>
