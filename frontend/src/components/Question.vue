<template>
    <div>
        <div class="question" v-if="propsLoaded">
            <h3>{{quote.quote}}</h3>
            <div v-for="person in peopleList" :key="`people_list_${person.id}`">
                <button class="btn btn-dark" :disabled="message.length" :id="`name_${person.id}`"
                        @click="answer(person.id)">{{person.name}}
                </button>
            </div>
        </div>
        <div v-else>
            <p class="text-center">Loading....</p>
        </div>

        <div v-if="message.length">
            <h4>{{message}}</h4>
            <button class="btn btn-orange" @click="submit">{{messageButtonText}}</button>
        </div>
    </div>
</template>

<script>
    import {ApiConstants} from "../constants";

    export default {
        name: "QuestionPage",

        props: {
            questionList: Array,
            score: Number
        },

        data() {
            return {
                propsLoaded: false,
                quote: '',
                peopleList: [],
                message: '',
                currScore: 0,
            }
        },

        computed: {
            messageButtonText() {
                return this.questionList.length < 10 ? 'Continue' : 'Finish';
            },

            apiPath() {
                return `${ApiConstants.API_BASE_URL}/${ApiConstants.QUESTION_PATH}`;
            }
        },

        async mounted() {
            this.currScore = this.score;
            await this.fetchData();
        },

        methods: {
            async fetchData() {
                await this.axios.post(this.apiPath, {questions: this.questionList})
                    .then(result => {
                        if (result.data) {
                            this.quote = result.data.question;
                            this.peopleList = result.data.people;
                            this.propsLoaded = true;
                        } else {
                            this.fetchData();
                        }
                    }).catch(error => {
                        alert(error);
                    });
            },

            answer(personId) {
                const correctPerson = this.peopleList.filter(person => person.id === this.quote.person_id);
                if (this.quote.person_id === personId) {
                    event.target.style.background = '#28bf17';
                    this.message = `Correct! The right answer is ${correctPerson[0].name}`;
                    this.currScore++;
                } else {
                    event.target.style.background = '#b85158';
                    this.message = `Sorry, you were wrong! The right answer is ${correctPerson[0].name}`;
                    this.currScore--;
                }
            },

            submit() {
                this.$emit('answer', {question: this.quote.id, score: this.currScore});
            }
        }
    }
</script>

<style scoped>

</style>