<script setup>
import { ref, onMounted, computed } from 'vue';
import { Head, Link, router, usePage } from '@inertiajs/vue3';
import Banner from '@/Components/Banner.vue';
import NavBar from '@/Components/NavBar.vue';
import axios from 'axios';

const props = defineProps({
    title: String,
    lightMode: String,
});

const lightModeProp = computed(() => usePage().props.lightMode).value

const lightMode = () => {
   if(lightModeProp === 'true'){
    let body = document.body;
    let aElements = document.querySelectorAll('a');
    let ul = document.querySelector('nav ul');

    // Añadir la clase "light-mode" sin verificar su presencia previa
    aElements.forEach(a => {
        a.classList.add("light-mode");
    });
    ul.classList.add("light-mode");
    body.classList.add("light-mode");
   }else if(lightModeProp === 'false'){
        let body = document.body;
        let aElements = document.querySelectorAll('a');
        let ul = document.querySelector('nav ul');

        // Eliminar la clase "light-mode" sin verificar su presencia previa
        aElements.forEach(a => {
            a.classList.remove("light-mode");
        });
        ul.classList.remove("light-mode");
        body.classList.remove("light-mode");  
    }
}

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
    lightMode();
});

const $t = computed(() => (key) => {
  return translations.value[key] || key;
});

</script>

<template>
    <div>
        <Head :title="title" />

        <Banner />

        <div class="min-h-screen max-width mx-3">
            <NavBar @$t="$t" ></NavBar>

            <!-- Page Heading -->
            <header v-if="$slots.header" >
                <div>
                    <slot  name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>

<style>
    body{
        color: #fff;
        background-color: #37423D;
    }
    body.light-mode{
        background-color: #fff;
        color: #000;
    }
    .max-width{
        max-width: 850px;
    }
    h1{
        font-size: 3rem;
        font-weight: 700;
        line-height: 1.1;
        margin: 25px 0;
    }
    @media screen and (min-width: 750px) {
        .max-width{
            width: 100%;
            margin: auto;
        }
    }
</style>