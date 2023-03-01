const app = new Vue({
    el: '#app',
    component: {
    },
    data() {
        return {
            tobaconame: '',
            jancode: 0,
            user_name: '',
            user_pass: '',
            user_id: 0,
            smokingnumber: 0,
            money: 0,
            thing: '',
            story: '',
            year: 0,
            morth: 0,
            date: 0,
            tobaco_id: 0,
            barcode:0
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
                    number: this.smokingnumber,
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
                    user_id: this.user_id,
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
        create_smoking_date() {
            axios
                .post('http://mp-class.chips.jp/tobaco/main.php', {
                    user_id: this.user_id,
                    number: this.smokingnumber,
                    year: this.year,
                    morth: this.morth,
                    date: this.date,
                    create_smoking_date: ''
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
        create_zukan() {
            axios
                .post('http://mp-class.chips.jp/tobaco/main.php', {
                    user_id: this.user_id,
                    tobaco_id: this.tobaco_id,
                    create_zukan: ''
                }, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(
                    (response) => (console.log(response.data)),

                )
        },
        scan_barcode() {
            axios
                .post('http://mp-class.chips.jp/tobaco/main.php', {
                    user_id: this.user_id,
                    barcode: this.barcode,
                    scan_barcode: ''
                }, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(function (res) {
                    console.log(res.data)

                })
        }
    },
    computed: {
    }
});