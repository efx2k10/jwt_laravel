<template>
    <div class="container">
        <h1>Профиль пользователя</h1>
        <p>Пользователь {{ user.name }}</p>
        <p>Роль {{ role.name }}</p>
    </div>
</template>
<script>
export default {
    data() {
        return {
            user: this.$auth.$vm.state.data.user,
            role: this.$auth.$vm.state.data.role,
        }
    },
    components: {
        //
    }
}
</script>
