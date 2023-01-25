<template>
    <div class="content">
        <h1>Quote Quiz</h1>
        <question-page
                v-if="!finished"
                :questionList="questions"
                :score="score"
                @answer="addQuestion"
                :key="questions.length">
        </question-page>
        <result-page
                v-else
                :score="score"
                @restart="restart"
        ></result-page>
    </div>
</template>

<script>
    import ResultPage from "./components/Result";
    import QuestionPage from "./components/Question";

    export default {
        name: 'App',
        components: {QuestionPage, ResultPage},
        data() {
            return {
                finished: false,
                questions: [],
                score: 0,
            }
        },

        watch: {
            questions: {
                handler() {
                    if (this.questions.length === 10) {
                        this.finished = true;
                    }
                },
                deep: true
            },

            score() {
                if (this.score < 0) {
                    this.score = 0;
                }
            }
        },

        methods: {
            addQuestion(data) {
                this.questions.push(data.question);
                this.score = data.score;
            },

            restart() {
                this.questions.splice(0);
                this.score = 0;
                this.finished = false;
            },
        }
    }
</script>

<style>
    @import "assets/basic.css";
</style>
