<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Good ideas grow when they're shared.
            </h2>
        </template>

        <div class="py-12">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <create-idea-form />
                <jet-section-border />
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div>
                        <div v-for="idea in ideas" :key="idea.id" class="bg-green-100 bg-opacity-25 grid grid-cols-1 md:grid-cols-1">
                            <div class="p-6">
                                <div class="flex items-center">
                                    <img class="w-8 h-8 rounded-full object-cover" :src="idea.user.profile_photo_url" :alt="idea.user.name">
                                    <div class="ml-4 text-lg text-green-700 leading-7 font-semibold">
                                        {{ idea.body }}
                                    </div>
                                </div>

                                <div class="ml-12">
                                    <a href="javascript:;" @click.prevent="applaudIdea(idea)">
                                        <div class="mt-3 flex items-center text-sm font-semibold text-yellow-400">
                                              <div>Applaud</div>
                                        </div>
                                    </a>
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
import JetSectionBorder from '@/Jetstream/SectionBorder'
import CreateIdeaForm from './CreateIdeaForm.vue'

    export default {
        props: [
            'ideas'
        ],

        components: {
            AppLayout,
            JetSectionBorder,
            CreateIdeaForm
        },
        data() {
          return{
            applaudIdeaForm: this.$inertia.form({
                count: 1
            }),
            ideaForm: this.$inertia.form({
              body: ''
            }, {
              bag: 'createIdea',
              resetOnSuccess: true
            }),
          }
        },
        mounted() {
            console.log(this.ideas);
        },
        methods: {
          applaudIdea(idea) {
            this.applaudIdeaForm.post(route('applauses.ideas.store', idea.id));
          }
        }
    }
</script>
