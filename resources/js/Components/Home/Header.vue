<template>
    <header class="header">
        <img class="header_element hidden" src="/assets/images/my_photo.jpg" alt="" srcset="">
        <div class="presentation header_element hidden">
            <h2>Hi, my name is</h2>
            <h1>Lucas Nahuel Asin Nodar</h1>
            <h2>Also known by Nana.</h2>
            <div class="socials">
                <a id="resume">Resume</a>
                <a href="#contact">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" style="fill: #38423B;"><circle cx="4.983" cy="5.009" r="2.188"></circle><path d="M9.237 8.855v12.139h3.769v-6.003c0-1.584.298-3.118 2.262-3.118 1.937 0 1.961 1.811 1.961 3.218v5.904H21v-6.657c0-3.27-.704-5.783-4.526-5.783-1.835 0-3.065 1.007-3.568 1.96h-.051v-1.66H9.237zm-6.142 0H6.87v12.139H3.095z"></path></svg>
                </a>
                <a href="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" style="fill: #38423B;"><path fill-rule="evenodd" clip-rule="evenodd" d="M12.026 2c-5.509 0-9.974 4.465-9.974 9.974 0 4.406 2.857 8.145 6.821 9.465.499.09.679-.217.679-.481 0-.237-.008-.865-.011-1.696-2.775.602-3.361-1.338-3.361-1.338-.452-1.152-1.107-1.459-1.107-1.459-.905-.619.069-.605.069-.605 1.002.07 1.527 1.028 1.527 1.028.89 1.524 2.336 1.084 2.902.829.091-.645.351-1.085.635-1.334-2.214-.251-4.542-1.107-4.542-4.93 0-1.087.389-1.979 1.024-2.675-.101-.253-.446-1.268.099-2.64 0 0 .837-.269 2.742 1.021a9.582 9.582 0 0 1 2.496-.336 9.554 9.554 0 0 1 2.496.336c1.906-1.291 2.742-1.021 2.742-1.021.545 1.372.203 2.387.099 2.64.64.696 1.024 1.587 1.024 2.675 0 3.833-2.33 4.675-4.552 4.922.355.308.675.916.675 1.846 0 1.334-.012 2.41-.012 2.737 0 .267.178.577.687.479C19.146 20.115 22 16.379 22 11.974 22 6.465 17.535 2 12.026 2z"></path></svg>
                </a>
                <a class="to" href="#contact">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" style="fill: #38423B;"><path d="M20 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2zm0 4.7-8 5.334L4 8.7V6.297l8 5.333 8-5.333V8.7z"></path></svg>
                </a>
            </div>
        </div>
    </header>
</template>
<script setup>
import { ref, onMounted } from 'vue'
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
</script>
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
.header_element.show{
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
    width: 100%;
    display: flex;
    justify-content: flex-start;
    gap: 55px;
    align-items: center;
}
.socials a{
    display: inline-block;
    font-size: 1.2em;
    border-radius: 5px;
    padding: 3px 3px 0px 3px;
    text-shadow: none;
    color: #2D2D2A;
    background: #F1F7ED;
}
.socials a:hover,.socials a:active{
    background:#c1c6bd;
}
.socials #resume{
    border: 1px solid #F1F7ED;
    outline: none;
    background: transparent;
    color: #F1F7ED;
    font-size: 18px;
    border-radius: 10px;
    padding: 10px 15px;
    transition: 0.5s ease;
    cursor: pointer;
}
.socials #resume:hover,.socials #resume:active{
    background: #F1F7ED;
    color: #2D2D2A;
}
@media (max-width: 1200px){
    h1{
        font-size: 2.5rem;
    }
    h2{
        font-size:1.8rem;
    }
}
@media (max-width: 850px){
    header img{
        max-width: 250px
    }
    h1{
        font-size: 2rem;
    }
    h2{
        font-size:1.5rem;
    }
}
@media(max-width: 700px){
    header{
        gap: 20px
    }
    header img{
        max-width: 200px
    }
    h1{
        font-size: 1.8rem;
    }
    .socials{
        gap: 30px;
    }
}
@media(max-width:600px){
    header{
        flex-direction:column;
    }
    header img{
        max-width: 270px
    }
    h1{
        font-size: 2.5rem;
    }
    h2{
        font-size:1.8rem;
    }
    .socials{
        gap: 50px;
    }
}
@media(max-width:500px){
    h1{
        font-size: 1.8rem;
    }
    h2{
        font-size:1.5rem;
    }
    .socials{
        gap: 30px;
    }
}
</style>