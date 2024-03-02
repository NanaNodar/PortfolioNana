<script>
export default {
    name: 'CategoryForm'
}
</script>

<script setup>
    import FormSection from '@/Components/FormSection.vue';
    import InputError from '@/Components/InputError.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import SecondaryButton from '@/Components/SecondaryButton.vue';
    import TextInput from '@/Components/TextInput.vue';
    import { Link } from '@inertiajs/vue3';

    defineProps({
        form: {
            type: Object,
            required: true
        },
        updating: {
            type: Boolean,
            required: false,
            default: false,
        }
    })

    defineEmits(['submit'])
</script>

<template>
    <div class="form_container">
        <FormSection @submitted="$emit('submit')">
            <template #title>
                {{ updating ? 'Update Category' : 'Create New Category' }}
            </template>
            <template #description>
                {{ updating ? 'Update The Selected Category' : 'Create New Category From Scratch' }} 
            </template>
            <template #form>
                <div class="input_container">
                    <InputLabel for="name" value="Name" />
                    <TextInput id="name" v-model="form.name" type="text" autocomplete="category-name"/>
                    <InputError :message="$page.props.errors.name"/>
                </div>
            </template>

            <template #actions>
                <div>
                    <Link class="secondary_button" :href="route('categories.index')">
                        Return
                    </Link>
                    <PrimaryButton>
                        {{ updating ? 'Update' : 'Create' }}
                    </PrimaryButton>
                </div>
            </template>
        </FormSection>
    </div>
</template>

<style scoped>
    .form_container{
        background-color: #fff;
        margin: 40px auto;
        padding: 20px;
        border-radius: 10px;
        width: 50%;
    }
    .input_container{
        
    }
    .input_container input {
        width: 100%;
    }
    .secondary_button{
        --tw-text-opacity: 1;
        color: rgb(55 65 81 / var(--tw-text-opacity));
        letter-spacing: 0.1em;
        text-transform: uppercase;
        font-weight: 600;
        font-size: 0.75rem;
        line-height: 1rem;
        padding: 0.5rem 1rem;
        --tw-bg-opacity: 1;
        background-color: rgb(255 255 255 / var(--tw-bg-opacity));
        --tw-border-opacity: 1;
        border-color: rgb(209 213 219 / var(--tw-border-opacity));
        border-width: 1px;
        border-radius: 0.375rem;
        display: inline-flex;
        margin-right: 0.5rem;
    }
    .secondary_button:hover{
        background-color: rgb(235 235 235 / var(--tw-bg-opacity));
    }
</style>