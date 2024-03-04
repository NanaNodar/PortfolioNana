<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '../Layouts/AppLayout.vue'
import { ref, onMounted, computed, defineProps, defineEmits } from 'vue'
import axios from 'axios';

// const translations = ref({});

// const loadTranslations = async () => {
//     try {
//     const response = await axios.get('/langs');
//     translations.value = response.data;
//     } catch (error) {
//     console.error('Error loading translations:', error);
//     }
// };

// onMounted(loadTranslations);

// const $t = computed(() => (key) => {
//     return translations.value[key] || key;
// });
const emit = defineEmits(['$t'])

const $t = () => {
    emit('$t');
};

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="About me" />
    <AppLayout title="About me">
        <template #main>
            <div class="section_flex">
                <main>
                    <header>
                        <img src="/assets/images/my_photo.jpg" alt="" srcset="">
                        <div class="presentation">
                            <h2>Hi, my name is</h2>
                            <h1>Lucas Nahuel Asin Nodar</h1>
                            <h2>Also known by Nana.</h2>
                            <div class="socials">
                                <a href="">Linkedin</a>
                                <a href="">Github</a>
                                <a href="#contact">Contact</a>
                            </div>
                        </div>
                    </header>
                    <section>
                        <div class="title_section">
                            <a href="#about-me" aria-label="about me permalink">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24" style="fill: #FBFFF1;"><path d="M8.465 11.293c1.133-1.133 3.109-1.133 4.242 0l.707.707 1.414-1.414-.707-.707c-.943-.944-2.199-1.465-3.535-1.465s-2.592.521-3.535 1.465L4.929 12a5.008 5.008 0 0 0 0 7.071 4.983 4.983 0 0 0 3.535 1.462A4.982 4.982 0 0 0 12 19.071l.707-.707-1.414-1.414-.707.707a3.007 3.007 0 0 1-4.243 0 3.005 3.005 0 0 1 0-4.243l2.122-2.121z"></path><path d="m12 4.929-.707.707 1.414 1.414.707-.707a3.007 3.007 0 0 1 4.243 0 3.005 3.005 0 0 1 0 4.243l-2.122 2.121c-1.133 1.133-3.109 1.133-4.242 0L10.586 12l-1.414 1.414.707.707c.943.944 2.199 1.465 3.535 1.465s2.592-.521 3.535-1.465L19.071 12a5.008 5.008 0 0 0 0-7.071 5.006 5.006 0 0 0-7.071 0z"></path></svg>
                            </a>
                            <h2 class="title" id="about-me">About me</h2>
                        </div>
                        <div class="content_section">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero placeat distinctio sed aliquam officia cumque accusamus labore, veniam ducimus libero consequuntur ea minus, voluptatum dignissimos sunt molestiae laboriosam, corporis incidunt voluptates itaque quaerat? Sit molestiae dignissimos harum deleniti sed assumenda, aut adipisci quo error illum ab nisi rem veritatis eius.
                            </p>
                        </div>
                        <div class="subtitle_section">
                            <h3 class="subtitle">Highlight</h3>
                            <div class="content_subsection">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero placeat distinctio sed aliquam officia cumque accusamus labore, veniam ducimus libero consequuntur ea minus, voluptatum dignissimos sunt molestiae laboriosam, corporis incidunt voluptates itaque quaerat? Sit molestiae dignissimos harum deleniti sed assumenda, aut adipisci quo error illum ab nisi rem veritatis eius.
                                </p>
                                <div class="box">
                                    <h4 class="title_box">
                                        Box Title
                                    </h4>
                                    <a href="">Link to box</a>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section>
                        <div class="title_section">
                            <a href="#skills" aria-label="skills permalink">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24" style="fill: #FBFFF1;"><path d="M8.465 11.293c1.133-1.133 3.109-1.133 4.242 0l.707.707 1.414-1.414-.707-.707c-.943-.944-2.199-1.465-3.535-1.465s-2.592.521-3.535 1.465L4.929 12a5.008 5.008 0 0 0 0 7.071 4.983 4.983 0 0 0 3.535 1.462A4.982 4.982 0 0 0 12 19.071l.707-.707-1.414-1.414-.707.707a3.007 3.007 0 0 1-4.243 0 3.005 3.005 0 0 1 0-4.243l2.122-2.121z"></path><path d="m12 4.929-.707.707 1.414 1.414.707-.707a3.007 3.007 0 0 1 4.243 0 3.005 3.005 0 0 1 0 4.243l-2.122 2.121c-1.133 1.133-3.109 1.133-4.242 0L10.586 12l-1.414 1.414.707.707c.943.944 2.199 1.465 3.535 1.465s2.592-.521 3.535-1.465L19.071 12a5.008 5.008 0 0 0 0-7.071 5.006 5.006 0 0 0-7.071 0z"></path></svg>
                            </a>
                            <h2 class="title" id="skills">Skills</h2>
                        </div>
                        <div class="subtitle_section">
                            <h3 class="subtitle">Hard Skills</h3>
                            <div class="content_subsection">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero placeat distinctio sed aliquam officia cumque accusamus labore, veniam ducimus libero consequuntur ea minus, voluptatum dignissimos sunt molestiae laboriosam, corporis incidunt voluptates itaque quaerat? Sit molestiae dignissimos harum deleniti sed assumenda, aut adipisci quo error illum ab nisi rem veritatis eius.
                                </p>
                            </div>
                        </div>
                        <div class="subtitle_section">
                            <h3 class="subtitle">Soft Skills</h3>
                            <div class="content_subsection">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero placeat distinctio sed aliquam officia cumque accusamus labore, veniam ducimus libero consequuntur ea minus, voluptatum dignissimos sunt molestiae laboriosam, corporis incidunt voluptates itaque quaerat? Sit molestiae dignissimos harum deleniti sed assumenda, aut adipisci quo error illum ab nisi rem veritatis eius.
                                </p>
                            </div>
                        </div>
                        <div class="subtitle_section">
                            <h3 class="subtitle">Languages</h3>
                            <div class="content_subsection">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero placeat distinctio sed aliquam officia cumque accusamus labore, veniam ducimus libero consequuntur ea minus, voluptatum dignissimos sunt molestiae laboriosam, corporis incidunt voluptates itaque quaerat? Sit molestiae dignissimos harum deleniti sed assumenda, aut adipisci quo error illum ab nisi rem veritatis eius.
                                </p>
                            </div>
                        </div>
                    </section>
                    <section>
                        <div class="title_section">
                            <a href="#education" aria-label="education permalink">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24" style="fill: #FBFFF1;"><path d="M8.465 11.293c1.133-1.133 3.109-1.133 4.242 0l.707.707 1.414-1.414-.707-.707c-.943-.944-2.199-1.465-3.535-1.465s-2.592.521-3.535 1.465L4.929 12a5.008 5.008 0 0 0 0 7.071 4.983 4.983 0 0 0 3.535 1.462A4.982 4.982 0 0 0 12 19.071l.707-.707-1.414-1.414-.707.707a3.007 3.007 0 0 1-4.243 0 3.005 3.005 0 0 1 0-4.243l2.122-2.121z"></path><path d="m12 4.929-.707.707 1.414 1.414.707-.707a3.007 3.007 0 0 1 4.243 0 3.005 3.005 0 0 1 0 4.243l-2.122 2.121c-1.133 1.133-3.109 1.133-4.242 0L10.586 12l-1.414 1.414.707.707c.943.944 2.199 1.465 3.535 1.465s2.592-.521 3.535-1.465L19.071 12a5.008 5.008 0 0 0 0-7.071 5.006 5.006 0 0 0-7.071 0z"></path></svg>
                            </a>
                            <h2 class="title" id="education">Education</h2>
                        </div>
                        <div class="content_section">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero placeat distinctio sed aliquam officia cumque accusamus labore, veniam ducimus libero consequuntur ea minus, voluptatum dignissimos sunt molestiae laboriosam, corporis incidunt voluptates itaque quaerat? Sit molestiae dignissimos harum deleniti sed assumenda, aut adipisci quo error illum ab nisi rem veritatis eius.
                            </p>
                        </div>
                    </section>
                    <section>
                        <div class="title_section">
                            <a href="#proyects" aria-label="proyects permalink">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24" style="fill: #FBFFF1;"><path d="M8.465 11.293c1.133-1.133 3.109-1.133 4.242 0l.707.707 1.414-1.414-.707-.707c-.943-.944-2.199-1.465-3.535-1.465s-2.592.521-3.535 1.465L4.929 12a5.008 5.008 0 0 0 0 7.071 4.983 4.983 0 0 0 3.535 1.462A4.982 4.982 0 0 0 12 19.071l.707-.707-1.414-1.414-.707.707a3.007 3.007 0 0 1-4.243 0 3.005 3.005 0 0 1 0-4.243l2.122-2.121z"></path><path d="m12 4.929-.707.707 1.414 1.414.707-.707a3.007 3.007 0 0 1 4.243 0 3.005 3.005 0 0 1 0 4.243l-2.122 2.121c-1.133 1.133-3.109 1.133-4.242 0L10.586 12l-1.414 1.414.707.707c.943.944 2.199 1.465 3.535 1.465s2.592-.521 3.535-1.465L19.071 12a5.008 5.008 0 0 0 0-7.071 5.006 5.006 0 0 0-7.071 0z"></path></svg>
                            </a>
                            <h2 class="title" id="proyects">Proyects</h2>
                        </div>
                        <div class="content_section">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero placeat distinctio sed aliquam officia cumque accusamus labore, veniam ducimus libero consequuntur ea minus, voluptatum dignissimos sunt molestiae laboriosam, corporis incidunt voluptates itaque quaerat? Sit molestiae dignissimos harum deleniti sed assumenda, aut adipisci quo error illum ab nisi rem veritatis eius.
                            </p>
                        </div>
                    </section>
                    <section>
                        <div class="title_section">
                            <a href="#contact" aria-label="contact permalink">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24" style="fill: #FBFFF1;"><path d="M8.465 11.293c1.133-1.133 3.109-1.133 4.242 0l.707.707 1.414-1.414-.707-.707c-.943-.944-2.199-1.465-3.535-1.465s-2.592.521-3.535 1.465L4.929 12a5.008 5.008 0 0 0 0 7.071 4.983 4.983 0 0 0 3.535 1.462A4.982 4.982 0 0 0 12 19.071l.707-.707-1.414-1.414-.707.707a3.007 3.007 0 0 1-4.243 0 3.005 3.005 0 0 1 0-4.243l2.122-2.121z"></path><path d="m12 4.929-.707.707 1.414 1.414.707-.707a3.007 3.007 0 0 1 4.243 0 3.005 3.005 0 0 1 0 4.243l-2.122 2.121c-1.133 1.133-3.109 1.133-4.242 0L10.586 12l-1.414 1.414.707.707c.943.944 2.199 1.465 3.535 1.465s2.592-.521 3.535-1.465L19.071 12a5.008 5.008 0 0 0 0-7.071 5.006 5.006 0 0 0-7.071 0z"></path></svg>
                            </a>
                            <h2 class="title" id="contact">Contact</h2>
                        </div>
                        <div class="content_section">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero placeat distinctio sed aliquam officia cumque accusamus labore, veniam ducimus libero consequuntur ea minus, voluptatum dignissimos sunt molestiae laboriosam, corporis incidunt voluptates itaque quaerat? Sit molestiae dignissimos harum deleniti sed assumenda, aut adipisci quo error illum ab nisi rem veritatis eius.
                            </p>
                        </div>
                    </section>
                </main>
            </div>
        </template>
        
    </AppLayout>
</template>

<style scoped>
main{
    
}
header{
    display: flex;
    margin: auto;
    margin-bottom: 35px;
    gap: 30px;
    text-shadow: 5px 4px 3px rgba(0,0,0,0.8);
}
header img{
    max-width: 300px;
    border-radius: 50%;
    box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.75);
    -webkit-box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.75);
    -moz-box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.75);
}
.presentation{
    display: flex;
    align-items: flex-start;
    flex-direction: column;
    justify-content: center;
}
.socials{
    margin-top: 25px;
    text-align: center;
    width: 100%;
}
.socials a{
    display: inline; /* Muestra los enlaces en línea para que ocupen la misma línea */
    margin: 0 40px; /* Añade márgenes horizontales entre los enlaces */
    font-size: 1.2em; /* Tamaño de texto proporcional */
    border: 1px solid #FBFFF1;
    border-radius: 5px;
    padding: 5px 10px;
    text-shadow: none;
    box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.75);
    -webkit-box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.75);
    -moz-box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.75);
}
.title_section{
    margin-left: -18px;
}
.title_section h2{
    display: inline-block;
    text-shadow: 5px 4px 3px rgba(0,0,0,0.6);
}
.content_section,.content_subsection{
    line-height: 1.625;
    font-size: 1.3rem;
}
.content_section,.subtitle_section{
    padding-left: 30px;
}
.content_subsection{
    padding-left: 30px;
}
.index{
    bottom: 2em;
    position: fixed;
    padding: 15px;
    border: 2px solid #FBFFF1;
    background: #35356E;
    border-radius: 10px;
    animation: FadeBottom 1.5s ease-out 0s 1 normal forwards;
    height: 150px;
    right: 13em;
    transform: translateX(-50%);
}
img, ul{
    margin: auto;
}

@media (max-width: 450px) {
    .section_flex{
        flex-direction: column-reverse;
    }
}
@keyframes FadeBottom {
	0% {
		opacity: 0;
		transform: translateY(50px);
	}

	100% {
		opacity: 1;
		transform: translateY(0);
	}
}
</style>
