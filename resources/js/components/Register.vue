<template>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-4">
                <div class="card card-default">
                    <div class="card-body">
                        <div class="alert alert-danger" v-if="has_error">
                            <p v-for="(error, key) in errors">{{ error.join(' ') }}</p>
                        </div>
                        <form autocomplete="off" @submit.prevent="register" v-if="!success" method="post">
                            <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.name }">
                                <input type="text" id="name" class="form-control" placeholder="Имя" v-model="name">
                            </div>
                            <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.email }">
                                <input type="email" id="email" class="form-control" placeholder="email" v-model="email">
                            </div>
                            <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.password }">
                                <input type="password" id="password" class="form-control" v-model="password"
                                       placeholder="пароль">
                            </div>
                            <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.password }">
                                <input type="password" id="password_confirmation" class="form-control"
                                       placeholder="подтверждение пароля" v-model="password_confirmation">
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Зарегистрироваться</button>
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
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
            has_error: false,
            error: '',
            errors: {},
            success: false
        }
    },
    methods: {
        register() {
            let app = this
            this.$auth.register({
                data: {
                    name: app.name,
                    email: app.email,
                    password: app.password,
                    password_confirmation: app.password_confirmation
                },
            }).then(function (res) {
            })
                .catch(function (err) {
                    app.has_error = true
                    app.errors = err.response.data.errors || {}
                    console.log(err.response.data)
                })
        }
    }
}
</script>
