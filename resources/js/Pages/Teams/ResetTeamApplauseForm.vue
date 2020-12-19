<template>
    <jet-form-section @submitted="resetTeamApplause">
        <template #title>
            Team Applause
        </template>

        <template #description>
            Reset the applause count for each team member.
        </template>

        <template #form>
            <!-- Team Name -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="applause" value="Team Applause" />

                <jet-input id="applause"
                            type="number"
                            class="mt-1 block w-full"
                            v-model="form.applause"
                            :disabled="! permissions.canUpdateTeam" />

                <jet-input-error :message="form.error('name')" class="mt-2" />
            </div>
        </template>

        <template #actions v-if="permissions.canUpdateTeam">
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </jet-action-message>

            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </jet-button>
        </template>
    </jet-form-section>
</template>

<script>
    import JetActionMessage from '@/Jetstream/ActionMessage'
    import JetButton from '@/Jetstream/Button'
    import JetFormSection from '@/Jetstream/FormSection'
    import JetInput from '@/Jetstream/Input'
    import JetInputError from '@/Jetstream/InputError'
    import JetLabel from '@/Jetstream/Label'

    export default {
        components: {
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
        },

        props: ['team', 'permissions'],

        data() {
            return {
                form: this.$inertia.form({
                    applause: 22,
                }, {
                    bag: 'resetTeamApplause',
                    resetOnSuccess: false,
                })
            }
        },

        methods: {
            resetTeamApplause() {
                this.form.put(route('teams.applause.update', this.team), {
                    preserveScroll: true
                });
            },
        },
    }
</script>
