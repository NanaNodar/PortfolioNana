<script setup>
import { ref, onMounted, computed } from 'vue';
import { Head, Link, router, usePage } from '@inertiajs/vue3';
import Banner from '@/Components/Banner.vue';
import NavBar from '@/Components/NavBar.vue';
import axios from 'axios';

const props = defineProps({
    title: String,
});

const translations = ref({});

const loadTranslations = async () => {
  try {
    const response = await axios.get('/langs');
    translations.value = response.data;
  } catch (error) {
    console.error('Error loading translations:', error);
  }
};

onMounted(() => {
    loadTranslations();
});

const $t = computed(() => (key) => {
  return translations.value[key] || key;
});

</script>

<template>
    <div>
        <Head :title="title" />

        <Banner />

        <div class="page">
            <NavBar @$t="$t" ></NavBar>

            <!-- Page Heading -->
            <header v-if="$slots.header" >
                <div>
                    <slot  name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot name="main" />
            </main>
        </div>
    </div>
</template>

<style>

    @font-face {
        font-family: Cabin;
        src: url(assets/fonts/Cabin/static/Cabin-Regular.ttf);
    }
    body{
        /* background: rgb(80,13,187);
        background: linear-gradient(0deg, #500dbb 0%, #35356e 50%, #35356e 50%, #080049 100%); */
        background: linear-gradient(-60deg, #38423B, #353831, #2D2D2A);
        background-size: 400% 400%;
        animation: gradient 15s ease infinite;
        font-family: Cabin;
        color: #F1F7ED;
        overflow-x: hidden;
    }
    a{
        text-decoration: none;
        color: #F1F7ED;
    }
    .page{
        max-width: 1000px;
        min-height: 100vh;
        margin: 0 auto;
    }
    h1{
        font-size: 3rem;
        font-weight: 800;
        line-height: 1.1;
        margin: 15px 0;
    }
    h2{
        font-size: 2rem;
        margin: 10px 0;
    }
    h3{
        font-size: 1.8rem;
        margin: 10px 0;
    }
    @media (max-width: 1200px) {
        .page{
            max-width: 800px;
            margin: 0 auto;
        }
    }
    @media (max-width: 850px) {
        .page{
            margin: 0 1.4rem;
        }
    }
    @media (max-width: 600px){
        .page{
            margin: 0 0.8rem;
        }
    }
    @keyframes gradient {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
    }
    
</style>