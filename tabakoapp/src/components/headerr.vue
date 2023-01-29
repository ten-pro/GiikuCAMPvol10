<template>
    <div>
        <div class="header">
            <div class="left">
               <wallPaper />
            </div>
            <div class="title">
            </div>
            <div class="right">
                <a href="https://www.clubjt.jp/map">
                    <tbspot />
                </a>
           </div>
        </div>
    </div>
  </template>
  <script setup>
  import tbspot from './svg_png_img/tbspot.vue'
  import wallPaper from './svg_png_img/wallPaper.vue'
  </script>
  <style scoped>
  .title{
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    width:60vw;
    height: 15vh;
    margin:auto;
    margin-top:-6.5vh;
    background-image: url("./PNG/title.png");
    background-size: 100% 100%;
    color: #000000;
    
}
.header {
    display: flex;
    justify-content: space-around;
    margin: 3vh 0 0 0 ;
}

  </style>
