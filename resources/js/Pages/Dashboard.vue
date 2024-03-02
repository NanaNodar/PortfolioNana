<script setup>
import AppLayout from '../Layouts/AppLayout.vue'
import { ref, onMounted, computed } from 'vue'
import axios from 'axios';

// const translations = ref({});

// const loadTranslations = async () => {
//   try {
//     const response = await axios.get('/langs');
//     translations.value = response.data;
//   } catch (error) {
//     console.error('Error loading translations:', error);
//   }
// };

// onMounted(loadTranslations);

// const $t = computed(() => (key) => {
//   return translations.value[key] || key;
// });
const emit = defineEmits(['$t'])

const $t = () => {
    emit('$t');
};

</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h1>{{ $t('Testing.') }}</h1>
            {{ $page.props }}
        </template>
        
    </AppLayout>
</template>
