<template>
    <div>
        <div class="p-3 sm:px-12 bg-teal-100 border-b border-gray-200">
            <div class="mt-4 text-2xl flex items-center justify-between">
               <div class="justify-between items-center">{{introduction}} Here are some news for you...</div>
               <div class="justify-between items-center"><img src="assets/img/announcement.png" width="60"/></div>
            </div>

            <div class="text-gray-500 -mt-8">
                <splide :options="{autoplay: true, type: 'loop' }">
                    <splide-slide v-for="(value, index) in announcements" :key="index">
                        <div class="min-w-0 p-5">
                            <h1 class="text-gray-800 dark:text-gray-400 text-2xl">
                                {{ value }}
                            </h1>
                        </div>
                    </splide-slide>
                </splide>
            </div>
        </div>

        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Gratitude</div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        {{ $page.gratitude_count }}
                    </div>

                </div>
            </div>
    
            
             <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                <div class="flex items-center">
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Badges</div>
                </div>

                <div class="ml-12">
                    <div class="ml-2 text-sm text-gray-500 grid grid-cols-2 gap-6">
                        <div v-for="(value) in $page.badges">
                            <img :src="'assets/img/' + value.badge + '.svg'" alt="" class="badges h-12 w-8">
                            {{ value.label }}
                        </div>
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
