<template>
    <div>
        <div class="p-3 sm:px-12 bg-teal-100 border-b border-gray-200">
            <div class="mt-4 text-2xl flex items-center justify-between">
               <div class="justify-between items-center">{{introduction}} </div>
               <div class="justify-between items-center"><img src="assets/img/announcement.png" width="60"/></div>
            </div>

            <div class="text-gray-500 -mt-6">
                <splide :options="{autoplay: true}">
                    <splide-slide>
                        <div class="min-w-0 p-5 bg-teal-100">
                            <h1 class="text-gray-800 dark:text-gray-400 text-2xl">
                                Do not forget about our Ka(m)pihan Session every Wednesday. It's the day you can earn gratitude points!
                            </h1>
                        </div>
                    </splide-slide>
                    <splide-slide>
                        <div class="min-w-0 p-5 bg-teal-100">
                            <h1 class="text-gray-800 dark:text-gray-400 text-2xl">
                                Ho! Ho!, Ho! Christmas Party is coming this coming Tuesday! Don't forget to join and have fun!
                            </h1>
                        </div>
                    </splide-slide>
                    <splide-slide>
                        <div class="min-w-0  p-5 bg-teal-100">
                            <h1 class="text-gray-800 dark:text-gray-400 text-2xl">
                                New Year is coming!
                            </h1>
                        </div>
                    </splide-slide>
                </splide>
            </div>
        </div>

        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
            <div class="p-6">
                <div class="flex items-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="https://laravel.com/docs">Documentation</a></div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        Laravel has wonderful documentation covering every aspect of the framework. Whether you're new to the framework or have previous experience, we recommend reading all of the documentation from beginning to end.
                    </div>

                    <a href="https://laravel.com/docs">
                        <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                                <div>Explore the documentation</div>

                                <div class="ml-1 text-indigo-500">
                                    <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                    <div class="text-sm text-gray-500 grid grid-cols-2 gap-6">
                            <div v-for="(value) in $page.badges">
                                <img :src="'assets/img/' + value.badge + '.svg'" alt="" class="badges h-12 w-auto">
                                {{ value.label }}
                            </div>
                    </div>
            </div>

            <div class="p-6 border-t border-gray-200">
                <div class="flex items-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="https://tailwindcss.com/">Tailwind</a></div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        Laravel Jetstream is built with Tailwind, an amazing utility first CSS framework that doesn't get in your way. You'll be amazed how easily you can build and maintain fresh, modern designs with this wonderful framework at your fingertips.
                    </div>
                </div>
            </div>

            <div class="p-6 border-t border-gray-200 md:border-l">
                <div class="flex items-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Authentication</div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        Authentication and registration views are included with Laravel Jetstream, as well as support for user email verification and resetting forgotten passwords. So, you're free to get started what matters most: building your application.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo'
    import { Splide, SplideSlide } from '@splidejs/vue-splide';

    export default {
        components: {
            JetApplicationLogo,
            Splide,
            SplideSlide,
        },
        data() {
            return {
                greetings: [
                    'Hola',
                    'Hi',
                    'Hello',
                    'Hey',
                    'Dear'
                ],
                subGreetings: [
                    'I hope you are doing fine today.',
                    'Looking good!',
                    'How are you doing?'
                ],
                announcements: [
                    "Do not forget about our Ka(m)pihan Session every Wednesday. It's the day you can earn gratitude points!",
                    "Ho! Ho!, Ho! Christmas Party is coming this coming Tuesday! Don't forget to join and have fun!",
                    "New Year is coming..."
                ]
            }
        },
        computed: {
            introduction() {
                return this.randomE(this.greetings) + ' ' + this.$page.user.name + '! '
                    + this.randomE(this.subGreetings)
            }
        },
        methods: {
            randomE(items) {
                return items[Math.floor(Math.random() * items.length)];
            }
        }
    }
</script>
<style scoped>
.badges {
    display: inline;
}
</style>
