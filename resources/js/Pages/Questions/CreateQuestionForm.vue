<template>
    <jet-form @submitted="createQuestion">
        <template #title>
            Need help?
        </template>

        <template #description>
            Ask a question.
        </template>

        <template #form>
            <div class="col-span-12">
                <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.title" placeholder="Need help? Write it down here." />
                <jet-input-error :message="form.error('title')" class="mt-2" />
            </div>

            <div class="col-span-12">
                <textarea id="body" class="form-input mt-1 block w-full" v-model="form.body" placeholder="Add more details"/>
                <jet-input-error :message="form.error('body')" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Posted.
            </jet-action-message>

            <jet-primary-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Post a Question
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
                    title: '',
                    body: ''
                }, {
                    bag: 'createQuestion',
                    resetOnSuccess: true,
                })
            }
        },

        methods: {
            createQuestion() {
                this.form.post(route('questions.store'));
            }
        },
    }
</script>
