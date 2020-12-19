<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Questions
            </h2>
        </template>

        <div class="py-12">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <create-question-form />

                <jet-section-border />

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div>
                        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                            <div class="mt-4 text-2xl">
                                Help a team mate
                            </div>

                            <!-- <div class="mt-6 text-gray-500"> -->
                                <!-- form here -->
                            <!-- </div> -->
                        </div>

                        <div v-for="question in questions" :key="question.id" class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-1">
                            <div class="p-6">
                                <div class="flex items-center">
                                    <img class="w-8 h-8 rounded-full object-cover" :src="question.user.profile_photo_url" :alt="question.user.name">
                                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">
                                        {{ question.title }}
                                    </div>
                                </div>

                                <div class="ml-12">
                                    <div class="mt-2 text-sm text-gray-500">
                                        {{ question.body }}
                                    </div>

                                    <inertia-link :href="route('questions.show', question.id)">
                                        <div class="mt-3 flex items-center text-sm font-semibold text-blue-500">
                                                <div>Discuss</div>

                                                <div class="ml-1 text-indigo-500">
                                                    <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                </div>
                                        </div>
                                    </inertia-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import CreateQuestionForm from './CreateQuestionForm.vue'
import JetSectionBorder from '@/Jetstream/SectionBorder'

    export default {
        props: [
            'questions'
        ],

        components: {
            AppLayout,
            CreateQuestionForm,
            JetSectionBorder
        },
        mounted() {
            console.log(this.questions);
        }
    }
</script>
