<template>
    <div class="rap">
        <div class="title">
        </div>
        <div class="doctor_area">
            <img class="doctor_img" src="./PNG/doctor.png">
            <p class="doctor_text">
                今まで吸ってきたタバコを<br>
                計算しちゃいます！
            </p>
        </div>
        <Transition  mode="out-in">
            <div v-if="page==0">
                <h1>Q1</h1>
                <div class="question">
                    新規登録<br>
                </div>
                <div class="create_area">
                    <div class="create_text">
                        <p>ユーザー名</p>
                        <p>パスワード</p>
                        <p>パスワード確認</p>
                    </div>
                    <div class="create_input">
                        <input type="text" max="120" min="0" class="input_box create_width" v-model="questions.name"/>
                        <input type="password" max="12" min="0" class="input_box create_width" v-model="questions.pass"/>
                        <input type="password" max="12" min="0" class="input_box create_width" v-model="questions.check"/>
                    </div>
                </div>
                <div v-show='questions.error!=""' class="error">
                    {{ questions.error }}
                </div>
                <div class="tabako_img" @click="createcheck">
                    次の質問
                </div>
            </div>
            <div v-else-if="page==1">
                <h1>Q2</h1>
                <div class="question">
                    何年何か月<br>
                    吸っていますか？<br>
                    <p>（やめていた期間を除いて）</p>
                </div>
                <div v-if="nowbg==1 || nowbg==3 || nowbg==7" class="return_white" @click="--page.value"></div>
                <div v-else class="return_black" @click="--page"></div>
                <div class="input_area">
                    <input type="number" max="120" min="0" class="input_box" v-model="questions.year"/><p>年</p>
                    <input type="number" max="12" min="0" class="input_box" v-model="questions.month"/><p>か月</p>
                </div>
                <div class="tabako_img" @click="++page">
                    次の質問
                </div>
            </div>
            <div v-else>
                <h1>Q3</h1>
                <div class="question">
                    一日何本<br>
                    吸っていますか？<br>
                    <p>（今まで吸ってきた期間の平均）</p>
                </div>

                <div v-if="nowbg==1 || nowbg==3 || nowbg==7" class="return_white" @click="--page"></div>
                <div v-else class="return_black" @click="--page"></div>

                <div class="input_area">
                    <input type="number" min="0" class="input_box" v-model="questions.day"/><p>本</p>
                </div>
                <div class="tabako_img" @click="createfunk">
                    計算する！
                </div>
            </div>
        </Transition>
        <div class="link">
            <a href="/" class="link">ログインへ</a>
        </div>
    </div>
</template>
<script setup>
import { ref,reactive } from 'vue';
import axios from 'axios';
import swal from 'sweetalert'
let page =ref(0)
let questions = reactive({
    page:0,
    year:0,
    month:0,
    day:0,
    name:"",
    pass:"",
    check:"",
    error:"",
})
try{
    let tabaco_id=localStorage.getItem("tabaco_id");
    if(tabaco_id!=null){
        location.href="/dashboard";
    }
}catch(error){
}

const createcheck=()=>{
    if(questions.name==""){
        questions.error="ユーザー名を入力してください"
    }else if(questions.pass==""){
        questions.error="パスワードを入力してください"
    }else if(questions.check==""){
        questions.error="パスワード確認を入力してください"
    }else if(questions.pass!=questions.check){
        questions.error="パスワードとパスワード確認が一致していません"
    }else{
        page.value++
    }
}

const createfunk=()=>{
    console.log((questions.year*365+questions.month*30)*questions.day)
    axios
        .post('https://mp-class.chips.jp/tobaco/main.php', {
            number:(questions.year*365+questions.month*30)*questions.day,//今までに吸ってきた本数
            user_name:questions.name,//ユーザ名
            user_pass:questions.pass,//パスワード
            create_user: ''
        }, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
        .then(function (res) {
            console.log(res.data)
            if(res.data.chk){
                localStorage.setItem("tabaco_id",res.data.id);
                localStorage.setItem("name",res.data.name);
                location.href="/dashboard";
            }else{
                swal("エラー","入力されたユーザー名はすでに使用されています","error")
            }
        })
}
const props = defineProps({
    nowbg: Number,
})
</script>
<style scoped>
p{
    margin: 0px;
    font-size: 2.1vh;
}
h1{
    width:30vw;
    margin:3vh auto;
    font-size:8vh;
    text-align: center;
    transition: width 1s ease-in-out;
}
.link{
    text-align: center;
    margin-top:3vh;
}
.title{
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    width:80vw;
    height: 15vh;
    margin:auto;
    margin-top:0vh;
    background-image: url("./PNG/title.png");
    background-size: 100% 100%;
    color: #000000;
    
}
.title_text{
    font-size: 8vw;
    /* -webkit-text-stroke: 0.8vw rgb(0, 0, 0); */
    font-family: "けいふぉんと";
}
.doctor_area{
    display: flex;
    background-color: white;
    color:black;
    margin:auto;
    margin-top:3vh;
    width: 80vw;
    height:10vh;
    border: 0.5vh solid #000000;
    border-radius: 25px;
}
.doctor_img{
    height: 100%;
    margin:auto;
}
.doctor_text{
    margin:auto;
}
.question{
    margin:2vh auto;
    font-size:3.5vh;
    text-align: center;
}
.create_area{
    display: flex;
    text-align: center;
    width:80vw;
    margin:auto;
    gap:5vw;
}
.create_text{
    text-align: right;
}
.create_input{
    display: flex;
    flex-flow: column;
    gap:1.5vw;
}
.error{
    margin-top:3vh;
    color:red;
    text-align: center;
}
.input_area{
    display: flex;
    justify-content: center;
    gap:3vw;
    margin:auto;
    margin-top:7vh;
}
.input_box{
    width: 20vw;
    border-radius: 20px;
    text-align: center;
    font-weight: bold;
}.create_width{
    width:35vw;
}
.return_white{
    position:absolute;
    top:60vh;
    width:10vw;
    height:5vh;
    background-image: url("./PNG/left_white.png");
    background-size: 100% 100%;
}
.return_black{
    position:absolute;
    top:60vh;
    width:10vw;
    height:5vh;
    background-image: url("./PNG/left_black.png");
    background-size: 100% 100%;
}
.tabako_img{
    display: flex;
    justify-content: center;
    align-items: center;
    color:black;
    font-size: 2vh;
    font-weight: bold;
    margin:auto;
    margin-top:9vh;
    width:35vw;
    height: 5vh;
    background-image: url("./PNG/tabako_button.png");
    background-size: 100% 100%;
}
.tabako_text{
    position: absolute;
    left:50%;
}
.v-enter-active,
.v-leave-active {
  transition: opacity 0.5s ease;
}

.v-enter-from,
.v-leave-to {
  opacity: 0;
}
</style>