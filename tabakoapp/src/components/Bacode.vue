<template>
    <div class="zentai_area">
        <div class="img_area">
            <Toroku />
            <Bacode />
        </div>
        <div class="bacode_area">
                <h3>バーコードを下記のカメラに<br>合わせてください</h3>
                <div>
                    <StreamBarcodeReader @Decode="onDecode" @loaded="onLoaded" class="camera_area"></StreamBarcodeReader>
                </div>
                <input type="text" class="input" placeholder="手入力はこちらから" v-model="barcode.num">
            <img src="../PNG/sousin1.png" alt="" class="sousin" @click="send()">
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
import {StreamBarcodeReader} from "vue-barcode-reader"
import swal from "sweetalert";
let barcode = reactive({
    num:0
});
// import Quagga from "@ericblade/quagga2";
//import { ref, onMounted } from "vue";

const send = () => {
  axios
    .post('https://mp-class.chips.jp/tobaco/main.php', {
        user_id: localStorage.getItem("tabaco_id"),
        // localStrage.getItem("tabaco_id")
        barcode: barcode.num,
        scan_barcode: ''
    }, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    })
    .then(function (res) {
        if(res.data){
            swal("登録に成功しました！","","success")
            .then(function(){
                location.href="/barcode"
            })
        }else{
            swal("失敗","タバコのバーコードをスキャンしてください","error")
            .then(function(){
                location.href="/barcode"
            })
        }

    })
}

const onDecode=(result)=>{
    console.log(result)
    barcode.num = result
}
// const startCamera = () => {
//   //初期設定
//   Quagga.init(
//     {
//       inputStream: {
        
//         type: "LiveStream",
//         constraints: {
//           // サイズ指定
//           width: 360,
//           height: 240,
//           // width:window.innerWidth
//         },
//         // target: document.querySelector("#interactive"),
//       },
//       decoder: {
//         readers: [{
//           format:'ean_reader',
//           config:{},
//         },],
//       },
//     },
//     (err) =>{
//       if(!err){
//         console.log('エラーなし');
//         Quagga.start();
//         console.log('くあっがスタート');
//       }else{
//         Quagga.stop();
//         alert('この機能を利用するには\nブラウザのカメラ利用を許可してください。');
//       }
//     }
//   );
//   Quagga.onDetected((result) => {
//     console.log(result.codeResult.code);
//       const code = result.codeResult.code;
//       barcodeNum.num = result.codeResult.code;
//     Quagga.stop();
      
//     });

  
// }
// const onDecode=(decodedData)=> {
//         barcode = decodedData
//         console.log(decodedData)
// }
</script>

<style scoped>
.zentai{
    position: relative;
}
/* .camera_area{
    position: relative;
} */
.input {
  position: absolute;
  top:98vw;
  left: 20%;
  width: 60vw;
  font-size: 200%;
  background-color: white;
  border: 1px solid black;
  border-radius: 10px;
}
.img_area{
    display: flex;
    justify-content: space-around;
    position: absolute;
    top:10vh;
    height: 10vh;
    width: 100%;
}
.bacode_area{
    position: relative;
    width: 100%;
    top: 16vh;
    height: 65vh;
}
.sousin{
    position: absolute;
    top: 54vh;
    left: 10vh;
    text-align: center;
    width: 60%;
    border-top-right-radius: 18px;
    border-bottom-right-radius:14px;
}
h3{
    text-align: center;
    margin: 3vw;
}
</style>