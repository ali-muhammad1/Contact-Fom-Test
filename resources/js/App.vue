<template>
    <main>
        <div class="main-layout">
            <router-view></router-view>
        </div>
    </main>
</template>

<script>
    export default {

        components:{},
        mounted() {
            console.log('App mounted.')
        },
        computed : {},
        created: function () {}
    }
</script>
