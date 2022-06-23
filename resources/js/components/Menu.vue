<template>
    <div class="container">
        <header
            class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/" class="nav-link px-2 link-dark">Главная</a></li>
            </ul>
            <div class="col-md-3 text-end" v-if="!$auth.check()">
                <button class="btn btn-outline-primary m-1 float-right" v-for="(route, key) in routes.unlogged"
                        v-bind:key="route.path" @click="()=>$router.push(route.path)">{{ route.name }}
                </button>
            </div>
            <div class="col-md-3 text-end" v-if="$auth.check()">
                <button class="btn btn-outline-danger m-1 float-right" @click.prevent="$auth.logout()">
                    Выход
                </button>
            </div>
        </header>
    </div>
</template>
<script>
export default {
    data() {
        return {
            routes: {
                unlogged: [
                    {name: 'Регистрация', path: 'register'},
                    {name: 'Вход', path: 'login'}
                ],
                user: [
                    {name: 'Панель', path: 'dashboard'}
                ],
            }
        }
    },
    mounted() {
    }
}
</script>
<style>
</style>

