<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Redeem Your Gratitude Points
            </h2>
        </template>

        <div class="py-8">
            
            <div class="max-w-7xl mx-auto sm:px-4 lg:px-5">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <h1 class="pr-10 pt-10 pl-10">You have {{ $page.gratitude_count }} gratitude points. See the available rewards for you!</h1>
                    <div class="p-10 flex flex-wrap items-center justify-center">
                        <div v-for="(item, index) in redemptions" :key="index" :class="redeemClass(item.type, item.points)">
                            <svg class="absolute bottom-0 left-0 mb-8" viewBox="0 0 375 283" fill="none" style="transform: scale(1.5); opacity: 0.2;">
                                <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)" fill="white" />
                                <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)" fill="white" />
                            </svg>
                            <div class="relative pt-10 px-10 flex items-center justify-center">
                                <div class="block absolute w-48 h-48 bottom-0 left-0 -mb-24 ml-3" style="background: radial-gradient(white, transparent 60%); transform: rotate3d(0, 0, 1, 20deg) scale3d(1, 0.6, 1); opacity: 0.2;"></div>
                            </div>
                            <div class="relative px-6 pb-6 mt-6">
                                <span class="block opacity-75 -mb-1 text-lg">{{ item.description }}</span>
                                <div class="flex justify-between">
                                    <span class="block font-semibold text-xl mr-6">{{item.conversion}}</span>
                                    <span class="block bg-white rounded-full text-orange-500 text-xs font-bold px-3 py-2 leading-none flex items-center">{{item.gratitude_needed}}</span>
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

export default {
    components: {
        AppLayout,
    },
    data() {
        return {
            redemptions: [
                {
                    type: 'cash',
                    description: 'Cash',
                    conversion: '100PHP',
                    gratitude_needed: '100pts',
                    points: 100
                },
                {
                    type: 'cash',
                    description: 'Cash',
                    conversion: '200PHP',
                    gratitude_needed: '200pts',
                    points: 200
                },
                {
                    type: 'cash',
                    description: 'Cash',
                    conversion: '500PHP',
                    gratitude_needed: '500pts',
                    points: 500
                },
                {
                    type: 'cash',
                    description: 'Cash',
                    conversion: '1000PHP',
                    gratitude_needed: '1000pts',
                    points: 1000
                },
                {
                    type: 'work_perk',
                    description: 'Work Perk',
                    conversion: '1D Leave',
                    gratitude_needed: '3000pts',
                    points: 3000
                },
                {
                    type: 'work_perk',
                    description: 'Work Perk',
                    conversion: 'Transpo',
                    gratitude_needed: '1000pts',
                    points: 1000
                },
                {
                    type: 'fnb',
                    description: 'Food and Beverage',
                    conversion: '1 Starbucks',
                    gratitude_needed: '150pts',
                    points: 150
                },
                {
                    type: 'fnb',
                    description: 'Food and Beverage',
                    conversion: '1pc ChickenJoy',
                    gratitude_needed: '150pts',
                    points: 150
                },
                {
                    type: 'fnb',
                    description: 'Food and Beverage',
                    conversion: '1 Tall Chachago',
                    gratitude_needed: '150pts',
                    points: 150
                },
            ]
        }
    },
    methods: {
        redeemClass(type, points) {
            if (type == 'cash') {
                return {
                    'flex-shrink-0 m-6 relative overflow-hidden rounded-lg max-w-xs w-3/12': true,
                    'bg-green-200 text-blue-700 ': (points <= this.$page.gratitude_count),
                    'bg-gray-300 text-gray-500': (points > this.$page.gratitude_count),
                }
            }
            else if (type == 'work_perk') {
                return {
                    'flex-shrink-0 m-6 relative overflow-hidden rounded-lg max-w-xs w-3/12': true,
                    'bg-orange-200 text-blue-700 ': (points <= this.$page.gratitude_count),
                    'bg-gray-300 text-gray-500': (points > this.$page.gratitude_count),
                }
            }
            else if (type == 'fnb') {
                return {
                    'flex-shrink-0 m-6 relative overflow-hidden rounded-lg max-w-xs w-3/12': true,
                    'bg-purple-200 text-blue-700 ': (points <= this.$page.gratitude_count),
                    'bg-gray-300 text-gray-500 ': (points > this.$page.gratitude_count),
                }            
            }
            
        }
    }
}
</script>
