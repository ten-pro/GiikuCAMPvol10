const app = new Vue({
    el: '#app',
    component: {
    },
    data() {
        return {
            tobaconame:'',
            jancode:0,
            user_name:'',
            user_pass:'',
            user_id:0,
            smokingnumber:0,
            money:0,
            thing:'',
            story:''
        }
    },
    //ページが読み込まれた時に動く処理
    created() {
    },
    updated() {
    },
    methods: {
        create_tobaco() {
            axios
                .post('http://mp-class.chips.jp/tobaco/main.php', {
                    tobaco_name: this.tobaconame,
                    jan_code: this.jancode,
                    create_tobaco: ''
                }, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(
                    (response) => (console.log(response.data)),

                )
        },
        create_user() {
            axios
                .post('http://mp-class.chips.jp/tobaco/main.php', {
                    user_name: this.user_name,
                    user_pass: this.user_pass,
                    create_user: ''
                }, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(
                    (response) => (console.log(response.data)),

                )
        },
        loginchk() {
            axios
                .post('http://mp-class.chips.jp/tobaco/main.php', {
                    user_name: this.user_name,
                    user_pass: this.user_pass,
                    login_user: ''
                }, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(
                    (response) => (console.log(response.data))
                )
        },
        create_smoking() {
            axios
                .post('http://mp-class.chips.jp/tobaco/main.php', {
                    user_id: this.user_id,
                    number: this.smokingnumber,
                    create_smoking: ''
                }, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(
                    (response) => (console.log(response.data)),

                )
        },
        create_ifstory() {
            axios
                .post('http://mp-class.chips.jp/tobaco/main.php', {
                    money: this.money,
                    thing: this.thing,
                    story: this.story,
                    create_ifstory: ''
                }, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(
                    (response) => (console.log(response.data)),

                )
        },
    },
    computed: {
    }
});