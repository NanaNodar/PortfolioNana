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
        color: #fff;
        background: rgb(80,13,187);
        background: linear-gradient(27deg, rgba(80,13,187,1) 0%, rgba(53,53,110,1) 39%, rgba(8,0,73,1) 100%);
        font-family: Cabin;
        color: #FBFFF1;
    }
    a{
        text-decoration: none;
        color: #FBFFF1;
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
</style>