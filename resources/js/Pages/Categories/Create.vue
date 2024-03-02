<script>
export default {
    name: 'CategoriesCreate'
}
</script>

<script setup>
    import { useForm } from '@inertiajs/vue3';
    import AppLayout from '@/Layouts/AppLayout.vue';
    import CategoryForm from '@/Components/Categories/Form.vue';

    const form = useForm({
        name: ''
    })
</script>

<template>
    <div>
        <AppLayout>
            <template #header>
                <h1 class="title_header">Categories</h1>
            </template>
            <CategoryForm :form="form" @submit="form.post(route('categories.store'))" />
        </AppLayout>
    </div>
</template>

<style scoped>
    .title_header{
        font-weight: bold;
        font-size: 20px;
    }
</style>