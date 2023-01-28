<template>
    <div>
<div class="box">
    <div class="text">豆知識</div>
    <div class="tri">{{ triviaArray[Math.floor(Math.random() * triviaArray.length)] }}</div>
</div>
    </div>
  </template>
  <script >
  import { reactive } from 'vue';
  export default {
  setup() {
    const triviaArray = reactive(['イギリスでは一箱1400円', '明治時代は子供も喫煙OK', 'タバコの原料は『ナス科』', '1月13日はタバコの日ピース発売日', '5月31日は禁煙デー', 'タバコは食べると死ぬ', 'タバコの火種は800度', 'ロングはフィルターの長いだけ', 'マルボロは実は女性向け', 'セブンスターの初代パッケージの星の数は1389個']);
    return { triviaArray }
  }
}

  </script>
  <style scoped>
  .box {
    width: 40vw;
    height: 12vh;
    border: 2px solid black;
    border-radius: 20px;
    background-color: white;
    color: black;
  }
  .text {
    font-size: 110%;
    font-weight: bold;
    margin: 5% 0 0 5%;
}
.tri {
    width: 95%;
    text-align: center;
    margin: 5% 0 0 0;
    font-size: 110%;
}
  </style>
  