<template>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-4">
                <div class="card card-default">
                    <div class="card-body">
                        <div class="alert alert-danger" v-if="has_error">
                            <p>Неправильно введен логин или пароль</p>
                        </div>
                        <form autocomplete="off" @submit.prevent="login" method="post">
                            <div class="form-group">
                                <input type="email" id="email" class="form-control" placeholder="email"
                                       v-model="email" required>
                            </div>
                            <div class="form-group">
                                <input type="password" id="password" class="form-control" v-model="password"
                                       placeholder="пароль" required>
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Вход</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            email: null,
            password: null,
            success: false,
            has_error: false,
            error: ''
        }
    },
    mounted() {
        //
    },
    methods: {
        async login() {
            let app = this
            await this.$auth.login({
                data: {
                    email: app.email,
                    password: app.password
                },
                rememberMe: true,
                fetchUser: true

            }).then(function (res) {

            })
                .catch(function (err) {
                    app.has_error = true
                    app.errors = err.response.data.errors || {}
                    app.error = err.response.data.error
                    console.log(err.response.data)
                })

            app.success = true
            const redirectTo = 'dashboard'
            this.$router.push({name: redirectTo})
        }
    }
}
</script>
