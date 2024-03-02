<script>
export default {
    name: 'CategoriesIndex'
}
</script>

<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import { Link } from '@inertiajs/vue3';
    import { Inertia } from '@inertiajs/inertia';

    defineProps({
        categories: {
            type: Object,
            required: true
        }
    })

    const deleteCategory = id => {
        if(confirm('Are you sure?')){
            Inertia.delete(route('categories.destroy',id))
        }
    }
</script>

<template>
    <div>
        <AppLayout>
            <template #header>
                <h1 class="title_header">Categories</h1>
            </template>
            
            <div class="container">
                <div class="table_container">
                    <table>
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Creator</th>
                            <th>Date of creation</th>
                            <th>Edit / Delete</th>
                        </thead>
                        <tbody>
                            <tr v-for="category in categories.data">
                                <td>{{ category.id }}</td>
                                <td>{{ category.name }}</td>
                                <td>{{ category.user_creator.name }}</td>
                                <td>{{ category.created_at }}</td>
                                <td>
                                    <Link :href="route('categories.edit', category.id)" class="button_item">Edit</Link>
                                    <button @click="deleteCategory(category.id)" class="button_item">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="buttons">
                    <Link :href="route('categories.create')" class="button_creator">
                        Create category
                    </Link>
                </div>
            </div>
        </AppLayout>
    </div>
</template>

<style scoped>
    .title_header{
        font-weight: bold;
        font-size: 20px;
    }
    .container{
        padding: 20px;
        background-color: #333;
        margin: 20px auto;
    }
    table{
        border: 2px solid #fff;
        width: 100%;
    }
    thead{
        border-bottom: 2px solid #fff;
    }
    td, th {
        text-align: center;
        padding: 10px;
    }
    tr:hover {
        background-color: #dddddd;
    }
    .buttons{
        height: auto;
        padding-top: 20px;
    }
    .button_creator{
        background-color: #6875F5;
        color: #fff;
        padding: 10px;
        outline: 1px solid #000;
        border-radius: 3px;
    }
    .button_creator:hover{
        background-color: #464fa8;
    }
</style>