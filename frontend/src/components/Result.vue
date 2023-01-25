<template>
    <div>
        <h4>Congratulations! You completed the quote quiz.</h4>
        <h4>You're score is {{score}}/10</h4>

        <button class="btn btn-orange" @click="restart">Restart</button>
    </div>
</template>

<script>
    export default {
        name: "ResultPage",

        props: {
            score: Number,
        },

        methods: {
            restart() {
                this.$emit('restart');
            }
        }
    }
</script>

<style scoped>

</style>