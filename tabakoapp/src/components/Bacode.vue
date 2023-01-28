<template>
    <div>
        <div class="img_area">
            <Toroku />
            <Bacode />
        </div>
        <div class="bacode_area">
                <h3>バーコードを下記のカメラに合わせてください</h3>
                <div id="interactive" class="viewport"></div>
                
            <img src="../PNG/sousin.png" alt="" class="sousin">
        </div>
        <Futter />
    </div>
</template>
<script setup>
import {reactive} from "vue"
import Toroku from './Honsu/Toroku.vue'
import Bacode from './Honsu/bacode.vue'
import Futter from './Futter.vue'
import axios from "axios";
import Quagga from "@ericblade/quagga2";
import { ref, onMounted } from "vue";

// 3101179067720
// 3115031067780
// 0494112017641
// 0494212877671
onMounted(() => {
  //初期設定
  Quagga.init(
    {
      inputStream: {
        
        type: "LiveStream",
        constraints: {
          // サイズ指定
          width: 360,
          height: 240,
          // width:window.innerWidth
        },
        // target: document.querySelector("#interactive"),
      },
      decoder: {
        readers: [{
          format:'ean_reader',
          config:{},
        },],
      },
    },
    (err) =>{
      if(!err){
        console.log('エラーなし');
        Quagga.start();
        console.log('くあっがスタート');
      }else{
        Quagga.stop();
        alert('この機能を利用するには\nブラウザのカメラ利用を許可してください。');
      }
    }
  );

  Quagga.onDetected((result) => {
    console.log(result.codeResult.code);
      const code = result.codeResult.code;
    Quagga.stop();
      
    });

})

</script>
<style scoped>
.img_area{
    position: relative;
    top:9vh;
    height: 10vh;
    width: 100%;
}
.bacode_area{
    position: relative;
    width: 100%;
    top: 12vh;
    height: 65vh;
}
.sousin{
    position: absolute;
    top: 50vh;
    left: 10vh;
    text-align: center;
    width: 60%;
}
</style>