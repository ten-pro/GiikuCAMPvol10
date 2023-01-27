<template>
    <div>
        <div class="header">
            <div class="left">
               <wallPaper />
            </div>
            <div class="center">Title</div>
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
.header {
    display: flex;
    justify-content: space-around;
    margin: 3vh 0 0 0 ;
}

  </style>
