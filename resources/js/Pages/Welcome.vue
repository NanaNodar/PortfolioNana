<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '../Layouts/AppLayout.vue'
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


onMounted(observeHiddenElements);

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
                    <header class="header">
                        <img class="header_element hidden" src="/assets/images/my_photo.jpg" alt="" srcset="">
                        <div class="presentation header_element hidden">
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
                    <section class="section hidden">
                        <div class="title_section">
                            <a href="#about-me" aria-label="about me permalink">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24" style="fill: #FBFFF1;"><path d="M8.465 11.293c1.133-1.133 3.109-1.133 4.242 0l.707.707 1.414-1.414-.707-.707c-.943-.944-2.199-1.465-3.535-1.465s-2.592.521-3.535 1.465L4.929 12a5.008 5.008 0 0 0 0 7.071 4.983 4.983 0 0 0 3.535 1.462A4.982 4.982 0 0 0 12 19.071l.707-.707-1.414-1.414-.707.707a3.007 3.007 0 0 1-4.243 0 3.005 3.005 0 0 1 0-4.243l2.122-2.121z"></path><path d="m12 4.929-.707.707 1.414 1.414.707-.707a3.007 3.007 0 0 1 4.243 0 3.005 3.005 0 0 1 0 4.243l-2.122 2.121c-1.133 1.133-3.109 1.133-4.242 0L10.586 12l-1.414 1.414.707.707c.943.944 2.199 1.465 3.535 1.465s2.592-.521 3.535-1.465L19.071 12a5.008 5.008 0 0 0 0-7.071 5.006 5.006 0 0 0-7.071 0z"></path></svg>
                            </a>
                            <h2 class="title" id="about-me">About me</h2>
                        </div>
                        <div class="content_section">
                            <p>
                                Hello again! Thank you for see my page. I'm a Full Stack Web Development that want contribiued the world bringing solutions for it problems. In this moment I search new adventures wich make me write new code, and progress my experience in this job.
                            </p>
                        </div>
                        <div class="subtitle_section">
                            <h3 class="subtitle">Highlight</h3>
                            <div class="content_subsection highlight_content">
                                <p>
                                    I want to highlight my work at Kennel Club Digital or Kennel Club Argentino. I started that job with a partner but he resigned, so I was left alone with everything. The client gave me the opportunity to do a project to gain experience, so I took it.
                                    <br>
                                    The project is a registration system for relations among dogs, their breeders, their owners, breeds, characteristics, pedigree creators, and user logins. Now, the site has 6000+ users.
                                    <br>
                                    The tecnologies used be Laravel, Javascript, Jquery, Google Recaptcha, Axios and Bootstrap
                                </p>
                                <div class="box">
                                    <h4 class="title_box">
                                        Kennel Club Digital
                                    </h4>
                                    <div class="box_links">
                                        <a href="">Go to the page</a>
                                        <a href="">Explanation of development</a>
                                    </div>
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
                        <div class="subtitle_section hidden">
                            <h3 class="subtitle">Hard Skills</h3>
                            <div class="content_subsection hardSkills_content">
                                <p>I know these tecnologies...</p>
                                <div class="hardSkills_grid">
                                    <img src="/assets/images/html.png" alt="" srcset="">
                                    <img src="/assets/images/css.png" alt="" srcset="">
                                    <img src="/assets/images/javascript.png" alt="" srcset="">
                                    <img src="/assets/images/jquery.png" alt="" srcset="">
                                    <img src="/assets/images/laravel.png" alt="" srcset="">
                                    <img src="/assets/images/php.png" alt="" srcset="">
                                    <img src="/assets/images/mysql.png" alt="" srcset="">
                                    <img src="/assets/images/git.png" alt="" srcset="">
                                </div>
                                <p>I'm learning these other tecnologies...</p>
                                <div class="hardSkills_grid">
                                    <img src="/assets/images/linux.png" alt="" srcset="">
                                    <img src="/assets/images/nodejs.png" alt="" srcset="">
                                    <img src="/assets/images/react.png" alt="" srcset="">
                                    <img src="/assets/images/vue.png" alt="" srcset="">
                                </div>
                            </div>
                        </div>
                        <div class="subtitle_section hidden">
                            <h3 class="subtitle">Soft Skills</h3>
                            <div class="content_subsection">
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
                            </div>
                        </div>
                        <div class="subtitle_section hidden">
                            <h3 class="subtitle">Languages</h3>
                            <div class="content_subsection">
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
                                Now, I'm studying computer engineering and sociology (when I have time).
                                <br>
                                Also, I have taken courses in many programming languages. You can watch the certificates here.
                            </p>
                            <a href="">Go to Education</a>
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
                                Did by myself...
                            </p>
                            <div class="box">
                                <h4 class="title_box">
                                    Kennel Club Digital
                                </h4>
                                <div class="box_links">
                                    <a href="">Go to the page</a>
                                    <a href="">Explanation of development</a>
                                </div>
                            </div>
                            <div class="box">
                                <h4 class="title_box">
                                    Portfolio
                                </h4>
                                <div class="box_links">
                                    <a href="">Go to the page</a>
                                    <a href="">Explanation of development</a>
                                </div>
                            </div>
                            <div class="box">
                                <h4 class="title_box">
                                    Dormis El Domo
                                </h4>
                                <div class="box_links">
                                    <a href="">Go to the page</a>
                                    <a href="">Explanation of development</a>
                                </div>
                            </div>
                            <p>
                                Contribiued...
                            </p>
                            <div class="box">
                                <h4 class="title_box">
                                    Kennel Club Digital
                                </h4>
                                <div class="box_links">
                                    <a href="">Go to the page</a>
                                    <a href="">Explanation of development</a>
                                </div>
                            </div>
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
                            <h3 class="subtitle">Send me a message</h3>
                            <p>Or save my email: nan4nodar@gmail.com</p>
                            <form action="">
                                <div class="form-group">
                                    <label for="">Full Name</label>
                                    <input type="text">
                                </div>
                                <div class="form-group">
                                    <label for="">Your Email</label>
                                    <input type="text">
                                </div>
                                <div class="form-group">
                                    <label for="">Subject</label>
                                    <input type="text">
                                </div>
                                <div class="form-group">
                                    <label for="">Your message</label>
                                    <textarea name="" id="" cols="30" rows="10"></textarea>
                                </div>
                                <div class="container_button">
                                    <button type="submit">Send</button>
                                </div>
                            </form>
                        </div>
                    </section>
                </main>
            </div>
        </template>
        
    </AppLayout>
</template>

<style scoped>

.header_element.hidden{
    opacity: 0;
    transition: all 1s;
    filter: blur(5px);
    transform: translateX(-40%);
}
.header_element:nth-child(1){
    transition-delay: 200ms;
}
.header_element:nth-child(2){
    transition-delay: 300ms;
}
.section.hidden{
    opacity: 0;
    transition: all 2s;
    filter: blur(5px);
    transform: translateX(100%);
}
.subtitle_section.hidden{
    opacity: 0;
    transition: all 1s;
    filter: blur(5px);
    transform: translateY(50%);
}
.subtitle_section.show{
    opacity: 1;
    filter: blur(0);
    transform: translateY(0);
}
.header_element.show,.section.show{
    opacity: 1;
    filter: blur(0);
    transform: translateX(0);
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
    margin: auto;
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
.highlight_content{
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.hardSkills_grid{
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    justify-items: center;
    gap: 40px;
    margin: 30px 0;
}
.hardSkills_content img{
    height: 80px;
    transition: all 0.5s;
}
.hardSkills_content img:hover{
    transform: scale(1.3);
}
.box{
    flex: 1;
    max-width: 200px;
    height: 120px;
    border: #B4C5E4 1px solid;
    border-radius: 18px;
    padding: 1rem;
    display: flex;
    flex-direction: column;
    font-size: 16px;
    justify-content: space-around;
    background: #35356E;
    box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.75);
    -webkit-box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.75);
    -moz-box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.75);
}
.box h4{
    margin: 0;
    font-size: 20px;
}
.box_links a{
    display: block;
}
.box_links a:hover{
    text-decoration: underline;
    text-decoration-thickness: 2px;
}
.highlight_content p{
    max-width: calc(100% - 300px);
}

@media (max-width: 450px) {
    .section_flex{
        flex-direction: column-reverse;
    }
}
</style>
