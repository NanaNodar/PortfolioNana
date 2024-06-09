<template>
    <section class="section hidden">
        <div class="title_section">
            <a class="to anchor" :href="'#' + id" :aria-label="id + 'permalink'">
                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24" style="fill: #F1F7ED;"><path d="M8.465 11.293c1.133-1.133 3.109-1.133 4.242 0l.707.707 1.414-1.414-.707-.707c-.943-.944-2.199-1.465-3.535-1.465s-2.592.521-3.535 1.465L4.929 12a5.008 5.008 0 0 0 0 7.071 4.983 4.983 0 0 0 3.535 1.462A4.982 4.982 0 0 0 12 19.071l.707-.707-1.414-1.414-.707.707a3.007 3.007 0 0 1-4.243 0 3.005 3.005 0 0 1 0-4.243l2.122-2.121z"></path><path d="m12 4.929-.707.707 1.414 1.414.707-.707a3.007 3.007 0 0 1 4.243 0 3.005 3.005 0 0 1 0 4.243l-2.122 2.121c-1.133 1.133-3.109 1.133-4.242 0L10.586 12l-1.414 1.414.707.707c.943.944 2.199 1.465 3.535 1.465s2.592-.521 3.535-1.465L19.071 12a5.008 5.008 0 0 0 0-7.071 5.006 5.006 0 0 0-7.071 0z"></path></svg>
                <h2 class="title anchor" :id="id">
                    <slot name="title" />
                </h2>
            </a>
        </div>
        <div class="content_section">
                <slot name="content" />
        </div>
    </section>
</template>
<script setup>
import SubSection from "./SubSection.vue";
import Grid from "./Grid.vue";
import { ref, defineProps } from 'vue';

const props = defineProps({
    highlight: {
        type: Boolean,
        default: false,
    },
    skills: {
        type: Boolean,
        default: false,
    },
    id: {
        type: String
    },
});

</script>
<style>
.anchor{
    visibility: hidden;
}
.section.hidden{
    opacity: 0;
    transition: all 2s;
    filter: blur(5px);
    transform: translateX(100%);
}
.section.show{
    opacity: 1;
    filter: blur(0);
    transform: translateX(0);
}
.title_section{
    margin-left: -18px;
}
.title_section h2{
    padding-top: 35px;
    display: inline-block;
    text-shadow: 5px 4px 3px rgba(0,0,0,0.6);
    visibility: visible;
}
.anchor:hover{
    visibility: visible;
}
.content_section{
    line-height: 1.625;
    font-size: 1.3rem;
}
.content_section{
    padding-left: 20px;
}
.content_section a:hover{
    text-decoration: underline;
}

.container_button > button:hover,.container_button > button:active{
    transform: scale(1.1);
}
@media (max-width: 850px){
    .title_section h2{
        font-size: 1.7rem;
    }
    .content_section{
        font-size: 1.15rem;
        padding-left: 15px;
    }
}
@media (max-width: 700px){
    .content_section{
        padding-left: 10px;
    }
    .form-group{
        flex-direction: column;
    }
}
@media (max-width: 400px){
    .title_section{
        margin-left: -25px;
    }
    .title_section h2{
        font-size: 1.5rem;
    }
    .content_section{
        font-size: 1rem;
        padding-left: 0;
    }
}
</style>