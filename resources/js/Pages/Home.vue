<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '../Layouts/AppLayout.vue';
import Header from '../Components/Home/Header.vue';
import Section from '../Components/Home/Section.vue';
import SubSection from '../Components/Home/SubSection.vue';
import Grid from '../Components/Home/Grid.vue';
import Project from '../Components/Home/Project.vue';
import Contact from '../Components/Home/Contact.vue';
import { ref, onMounted, computed, defineProps, defineEmits } from 'vue'
import axios from 'axios';

const observeHiddenElements = () => {
    const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
        entry.target.classList.add('show');
        } else {
        entry.target.classList.remove('show');
        }
    });
    });

    const hiddenElements = document.querySelectorAll('.hidden');
    hiddenElements.forEach((el) => observer.observe(el));
};

const scrollTo = () => {
    const links = document.querySelectorAll('.to');
    
    links.forEach(link => {
        
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            
            if (targetElement) {
                const yOffset = targetElement.getBoundingClientRect().top + window.scrollY;
                window.scrollTo({
                    top: yOffset,
                    behavior: 'smooth'
                });
            }
        });
    });
};

document.addEventListener("DOMContentLoaded", (event) => {
    scrollTo();
});



onMounted(observeHiddenElements,scrollTo);

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

const isModalOpen = ref(false); // Variable reactiva para controlar el estado del modal
const modalImage = ref(''); // Variable reactiva para almacenar la URL de la imagen a mostrar en el modal

const openModal = (imageSrc) => {
    console.log(imageSrc)
    modalImage.value = imageSrc; // Establece la URL de la imagen a mostrar en el modal
    isModalOpen.value = true; // Abre el modal
};

const closeModal = () => {
    isModalOpen.value = false; // Cierra el modal
};

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Home" />
    <AppLayout title="Home">
        <template #main>
                    <Header/>
                    <Section 
                            :highlight="true" 
                            :id="'about-me'"
                    >
                        <template #title>
                            About me
                        </template>
                        <template #content>
                            <p>
                                Hello again! Thank you for see my page. I'm a Full Stack Web Developer that want to contribute to the world bringing solutions for its problems. At this moment I'm looking for new adventures wich make me write new code, and progress my experience in this job.
                            </p>
                            <SubSection 
                                        :highlight="true"
                            >
                                <template #subtitle>
                                    Highlight
                                </template>
                                <template #content>
                                    <p>
                                        I want to highlight my work at Kennel Club Digital and Kennel Club Argentino. I started that job with a partner but he resigned, so I was left alone with everything. The client gave me the opportunity to do a project all by myself to gain experience, so I took it.
                                        <br>
                                        The project is a registration system that relates dogs with their owners, breeders, races and characterics. Also can generate PDF with. Now, the site has over 6000 users.
                                        <br>
                                        The tecnologies used be Laravel, Javascript, Jquery, Google Recaptcha, Axios and Bootstrap
                                    </p>
                                    <a class="to" href="#projects">
                                        <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 4V20M12 20L8 16M12 20L16 16" stroke="#F1F7ED" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                    </a>
                                </template>
                            </SubSection>
                        </template>
                    </Section>
                    <Section 
                            :skills="true"
                            :id="'skills'"
                    >
                        <template #title>
                            Skills
                        </template>
                        <template #content>
                            <SubSection
                                        :hardSkills="true"
                            >
                                <template #subtitle>
                                    Hard Skills
                                </template>
                                <template #content>
                                    <Grid
                                    :items="8"
                                    >
                                        <template #grid_title>
                                            <p>I know these tecnologies...</p>
                                        </template>
                                        <template #grid>
                                            <img src="/assets/images/html.png" alt="" srcset="">
                                            <img src="/assets/images/css.png" alt="" srcset="">
                                            <img src="/assets/images/javascript.png" alt="" srcset="">
                                            <img src="/assets/images/jquery.png" alt="" srcset="">
                                            <img src="/assets/images/laravel.png" alt="" srcset="">
                                            <img src="/assets/images/php.png" alt="" srcset="">
                                            <img src="/assets/images/mysql.png" alt="" srcset="">
                                            <img src="/assets/images/git.png" alt="" srcset="">
                                        </template>
                                    </Grid>
                                    <Grid
                                    :items="4"
                                    >
                                        <template #grid_title>
                                            <p>I'm learning these other tecnologies...</p>
                                        </template>
                                        <template #grid>
                                            <img src="/assets/images/linux.png" alt="" srcset="">
                                            <img src="/assets/images/nodejs.png" alt="" srcset="">
                                            <img src="/assets/images/react.png" alt="" srcset="">
                                            <img src="/assets/images/vue.png" alt="" srcset="">
                                        </template>
                                    </Grid>
                                </template>
                            </SubSection>
                            <SubSection>
                                <template #subtitle>
                                    Soft Skills
                                </template>
                                <template #content>
                                    <ul>
                                        <li>
                                            I tried to feel empathy in everything with the idea of understanding the other.
                                        </li>
                                        <li>
                                            Critical thinking is basic to being the best version of you.
                                        </li>
                                        <li>
                                            I like to work with objectives, it makes my mind organized for resolving problems.
                                        </li>
                                        <li>
                                            I really would like to work with teams to progress in my work within teams.
                                        </li>
                                        <li>
                                            If I am honest about designs, I have many difficulties, but I work on that every day.
                                        </li>
                                    </ul>
                                </template>
                            </SubSection>
                            <SubSection>
                                <template #subtitle>
                                    Languages
                                </template>
                                <template #content>
                                    <div class="table">
                                        <p>
                                            Español
                                        </p>
                                        <table>
                                            <thead>
                                                <th>
                                                    Lectura
                                                </th>
                                                <th>
                                                    Escritura
                                                </th>
                                                <th>
                                                    Escucha
                                                </th>
                                                <th>
                                                    Habla
                                                </th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        Nativo
                                                    </td>
                                                    <td>
                                                        Nativo
                                                    </td>
                                                    <td>
                                                        Nativo
                                                    </td>
                                                    <td>
                                                        Nativo
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="table">
                                        <p>
                                            English
                                        </p>
                                        <table>
                                            <thead>
                                                <th>
                                                    Reading
                                                </th>
                                                <th>
                                                    Writing
                                                </th>
                                                <th>
                                                    Listening
                                                </th>
                                                <th>
                                                    Speaking
                                                </th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        Advance
                                                    </td>
                                                    <td>
                                                        Intermediate
                                                    </td>
                                                    <td>
                                                        Intermediate
                                                    </td>
                                                    <td>
                                                        Intermediate
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </template>
                            </SubSection>
                        </template>
                    </Section>
                    <Section
                            :id="'education'"
                    >
                        <template #title>
                            Education
                        </template>
                        <template #content>
                            <p>
                                Now, I'm studying computer engineering and sociology (when I have time).
                                <br>
                                Also, I have taken courses in many programming languages. You can watch the certificates here.
                            </p>
                            <a href="">Go to Education</a>
                        </template>
                    </Section>
                    <Section
                            :id="'projects'"
                    >
                        <template #title>
                            Projects
                        </template>
                        <template #content>
                            <p>
                                Did by myself...
                            </p>
                            <Project
                                    :id="'kennel'"
                                    :link="'https://kca.kennelclubdigital.com'"
                                    :items="['Laravel','Jquery','Bootsrap']"
                                    :imgs="['/assets/images/KCA_inicio.png','/assets/images/Portfolio.png','/assets/images/argentina.png']"
                                    @open-modal="openModal"
                            >
                                <template #title>
                                    Kennel Club Digital
                                </template>
                                <template #info>
                                    Lorem1 ipsum dolor sit amet consectetur adipisicing elit. Harum accusantium perferendis dolore odio asperiores eligendi ab a? Saepe repellendus eligendi eos nam quisquam nihil accusamus laudantium consequatur ipsum cumque totam id sunt, minus magni expedita, eaque obcaecati accusantium! Laborum veritatis dolore officia ratione eum fuga aliquam. Ut doloribus architecto voluptas.
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam placeat modi laboriosam, consequuntur cupiditate voluptas officiis sunt, officia possimus vero assumenda culpa iure sit nulla sint incidunt facilis maiores porro pariatur aliquid dolorum! Consectetur aliquam reiciendis eaque accusamus beatae dignissimos repellendus fuga eius odio. Rerum fugit optio iusto magni reiciendis exercitationem cumque corporis! Illum, voluptatum. A adipisci odit, eligendi aperiam ducimus consequatur laboriosam, non voluptates excepturi quis ullam similique iste eius nostrum error tenetur vitae eaque cum quisquam explicabo? Minus rem porro quos id commodi, exercitationem magnam officiis vel fugiat numquam eveniet totam, ipsum ratione? Impedit repellat voluptatum unde necessitatibus.
                                </template>
                            </Project>
                            <Project
                                    :id="'portfolio'"
                                    :link="'https://kca.kennelclubdigital.com'"
                                    :items="['Laravel','Jquery','Bootsrap']"
                                    :imgs="[]"
                                    @open-modal="openModal"
                            >
                                <template #title>
                                    Kennel Club Digital
                                </template>
                                <template #info>
                                    Lorem2 ipsum dolor sit amet consectetur adipisicing elit. Harum accusantium perferendis dolore odio asperiores eligendi ab a? Saepe repellendus eligendi eos nam quisquam nihil accusamus laudantium consequatur ipsum cumque totam id sunt, minus magni expedita, eaque obcaecati accusantium! Laborum veritatis dolore officia ratione eum fuga aliquam. Ut doloribus architecto voluptas.
                                </template>
                            </Project>
                            <Project
                                    :id="'domo'"
                                    :link="'https://kca.kennelclubdigital.com'"
                                    :items="['Laravel','Jquery','Bootsrap']"
                                    :imgs="[]"
                                    @open-modal="openModal"
                            >
                                <template #title>
                                    Kennel Club Digital
                                </template>
                                <template #info>
                                    Lorem3 ipsum dolor sit amet consectetur adipisicing elit. Harum accusantium perferendis dolore odio asperiores eligendi ab a? Saepe repellendus eligendi eos nam quisquam nihil accusamus laudantium consequatur ipsum cumque totam id sunt, minus magni expedita, eaque obcaecati accusantium! Laborum veritatis dolore officia ratione eum fuga aliquam. Ut doloribus architecto voluptas.
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit iusto inventore ad eius magni quae blanditiis sequi, laborum aut esse adipisci voluptatem veniam repellat, illo rerum accusamus amet, non enim possimus nisi. Iste deserunt commodi saepe odio delectus officiis mollitia. Provident enim consequuntur qui earum, quae sapiente pariatur reiciendis cupiditate debitis tempora, incidunt rem fuga quia, accusantium sunt explicabo quo. Totam est officiis aperiam facere nesciunt repellat modi, voluptates accusamus numquam eligendi placeat facilis, corporis tempore eius consequatur animi? Recusandae cumque expedita architecto asperiores nulla vel, inventore illo deleniti culpa saepe eligendi quaerat nostrum velit possimus provident aut explicabo optio.
                                </template>
                            </Project>
                            <p>
                                Contributed...
                            </p>
                            <Project
                                    :id="'kennel_landing'"
                                    :link="'https://kca.kennelclubdigital.com'"
                                    :items="['Laravel','Jquery','Bootsrap']"
                                    :imgs="[]"
                                    @open-modal="openModal"
                            >
                                <template #title>
                                    Kennel Club Digital
                                </template>
                                <template #info>
                                    Lorem4 ipsum dolor sit amet consectetur adipisicing elit. Harum accusantium perferendis dolore odio asperiores eligendi ab a? Saepe repellendus eligendi eos nam quisquam nihil accusamus laudantium consequatur ipsum cumque totam id sunt, minus magni expedita, eaque obcaecati accusantium! Laborum veritatis dolore officia ratione eum fuga aliquam. Ut doloribus architecto voluptas.
                                </template>
                            </Project>
                        </template>
                        
                    </Section>
                    <Section
                            :id="'contact'"
                    >
                        <template #title>
                            Contact
                        </template>
                        <template #content>
                            <h3 class="subtitle">Send me a message</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, voluptas? or save my email: contacto@nananodar.com.ar</p>
                            <Contact/>
                        </template>
                    </Section>
                    <div v-if="isModalOpen" class="modal">
                        <span @click="closeModal" class="cerrar">&times;</span>
                        <img class="modal-contenido" :src="modalImage" alt="Imagen expandida">
                    </div>
        </template>
    </AppLayout>
</template>

<style scoped>
.flex{
    display: flex;
    justify-content: space-around;
}
.project_container{
    margin: 20px 0;
}
.project_container img{
    width: 300px; 
    flex: 1;
    height: fit-content;
    margin-right: 15px;
}
.description_project{
    margin: 0;
    line-height: 25px;
    font-size: 18px;
}
.tecnologies_project{
    margin-top: 10px;
}
.item_tecnologies{
    padding: 5px 10px;
    border-radius: 20px;
    background: #F1F7ED;
    color: #2D2D2A;
    font-size: 15px;
}
.modal {
    position: fixed; 
    z-index: 1; 
    left: 0;
    top: 0;
    width: 100vw; 
    height: 100vh; 
    overflow: auto;
    display: flex;
    background-color: rgb(255, 255, 255); 
    background-color: rgba(255, 255, 255, 0.3);
    justify-content: center; /* Centra horizontalmente */
    align-items: center; /* Centra verticalmente */
}
.modal.mostrar {
    display: flex; /* Muestra el modal solo cuando tiene la clase "mostrar" */
}
.modal-contenido {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 800px;
    max-height: 80%;
    object-fit: contain;
    border-radius: 15px;
    max-height: 500px;
}

.cerrar {
    color: #fff;
    position: absolute; /* Posición absoluta para ajustarse a la esquina superior derecha */
    top: 30px;
    right: 30px;
    font-size: 35px;
    font-weight: bold;
    cursor: pointer;
}

.cerrar:hover,
.cerrar:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}
</style>
