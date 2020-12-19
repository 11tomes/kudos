<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Question | {{ question.user.name }} asks...
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

    <div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div class="mt-8 text-2xl">
              {{ question.title }}
            </div>

            <div class="mt-6 text-gray-500">
              {{ question.body }}
            </div>
        </div>

        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-1">
            <div class="p-6" v-for="comment in question.comments" :key="comment.id" :class="{'bg-green-100': comment.is_correct}">
                <div class="flex items-center">
                    <img class="w-8 h-8 rounded-full object-cover" :src="question.user.profile_photo_url" :alt="question.user.name">
                    <div class="ml-4 mt-2 text-sm text-gray-500" :class="{'text-gray-500': !comment.is_correct, 'text-green-900': comment.is_correct}">
                        {{ comment.body }}
                    </div>
                </div>

                <div class="ml-12">
                    <div class="col-12 mt-3">
                        <a v-if="isQuestionPostedBy($page.user)" class="mt-3 mr-3 text-sm font-semibold text-yellow-500" href="javascript:;" @click.prevent="applause(comment.id)">
                            Applause
                        </a>
                        <a v-if="isQuestionPostedBy($page.user)" class="mt-3 text-sm font-semibold text-green-500" href="javascript:;" @click.prevent="markCommentAsCorrect(comment.id)">
                            Mark as Resolved
                        </a>
                    </div>

                    <!-- <a href="https://laravel.com/docs">
                        <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                                <div>Explore the documentation</div>

                                <div class="ml-1 text-indigo-500">
                                    <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </div>
                        </div>
                    </a> -->
                </div>
            </div>

            <div class="p-6">
                <!-- <div class="flex items-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="https://laravel.com/docs">Documentation</a></div>
                </div> -->

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        <textarea v-model="commentForm.body" class="form-textarea mt-1 block w-full" rows="3" placeholder="Have an answer? Write it here" />
                    </div>

                    <a href="javascript:;" @click.prevent="createComment">
                        <div class="mt-3 flex items-center text-sm font-semibold text-blue-500">
                                <div>Post comment</div>

                                <!-- <div class="ml-1 text-indigo-500">
                                    <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </div> -->
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
import Welcome from '@/Jetstream/Welcome'
export default {
    props: [
        'question'
    ],
    components: {
        AppLayout,
        Welcome
    },
    data () {
      return {
        commentForm: this.$inertia.form({
          'body': ''
        }, {
          bag: 'createComment',
          resetOnSuccess: true
        }),
        resolveForm: this.$inertia.form({
            is_correct: true
        }, {
          bag: 'markCommentAsCorrect',
          resetOnSuccess: true
        })
      }
    },
    methods: {
      createComment() {
        this.commentForm.post(route('questions.comments.store', this.question.id));
      },
      markCommentAsCorrect(id) {
          this.resolveForm.post(route('comments.resolve', id));
      },
      isQuestionPostedBy(user) {
          return this.question.user.id === user.id;
      }
    },
    mounted() {
        console.log(this.$page.user);
        console.log(this.question);
    }
}
</script>