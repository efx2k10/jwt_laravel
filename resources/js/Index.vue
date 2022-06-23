<template>
    <Menu></Menu>
    <router-view></router-view>
</template>
<script>
import Menu from './components/Menu.vue'

export default {
    data() {
        return {
            //
        }
    },
    components: {
        Menu
    }
}
</script>
