<script>
export default {
    name: 'CategoryEdit'
}
</script>

<script setup>
    import { useForm } from '@inertiajs/vue3';
    import AppLayout from '@/Layouts/AppLayout.vue';
    import CategoryForm from '@/Components/Categories/Form.vue';

    const props = defineProps({
        category:{
            type: Object,
            required: true
        }
    })
    
    const form = useForm({
        name: props.category.name
    })
</script>

<template>
    <div>
        <AppLayout title="Edit Category">
            <template #header>
                <h1 class="title_header">Categories</h1>
            </template>
            <CategoryForm :updating="true" :form="form" @submit="form.put(route('categories.update', category.id))" />
        </AppLayout>
    </div>
</template>

<style scoped>
    .title_header{
        font-weight: bold;
        font-size: 20px;
    }
</style>