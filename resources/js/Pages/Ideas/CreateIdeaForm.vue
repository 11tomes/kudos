<template>
    <jet-form @submitted="createIdea">
        <template #form>
            <div class="col-span-12">
                <textarea id="body" class="form-input mt-1 block w-full" v-model="form.body" placeholder="Got one? Write it down."/>
                <jet-input-error :message="form.error('body')" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Shared.
            </jet-action-message>

            <jet-primary-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Share an idea
            </jet-primary-button>
        </template>
    </jet-form>
</template>

<script>
    import JetPrimaryButton from '@/Jetstream/PrimaryButton'
    import JetForm from '@/Jetstream/Form'
    import JetInput from '@/Jetstream/Input'
    import JetInputError from '@/Jetstream/InputError'
    import JetLabel from '@/Jetstream/Label'
    import JetActionMessage from '@/Jetstream/ActionMessage'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton'

    export default {
        components: {
            JetActionMessage,
            JetPrimaryButton,
            JetForm,
            JetInput,
            JetInputError,
            JetLabel,
            JetSecondaryButton,
        },

        data() {
            return {
                form: this.$inertia.form({
                    body: ''
                }, {
                    bag: 'createIdea',
                    resetOnSuccess: true,
                })
            }
        },

        methods: {
            createIdea() {
                this.form.post(route('ideas.store'));
            }
        },
    }
</script>

