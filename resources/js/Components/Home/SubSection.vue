<template>
    <div class="subtitle_section">
        <h3 class="subtitle">
            <slot name="subtitle"/>
        </h3>
        <div class="content_subsection" :class="classes">
            <slot name="content"/>
        </div>
    </div>
</template>
<script setup>
import { ref, computed, defineProps } from 'vue';

const props = defineProps({
    highlight: {
        type: Boolean,
        default: false,
    },
    hardSkills: {
        type: Boolean,
        default: false
    },
});
const classes = computed(() => {
    if(props.highlight){
        return 'highlight_content';
    }else if(props.hardSkills){
        return 'hardSkills_content';
    }
});
</script>
<style>
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
.content_subsection{
    line-height: 1.625;
    font-size: 1.3rem;
    padding-left: 20px;
}
.subtitle_section{
    padding-top: 10px;
    padding-left: 20px;
}
.highlight_content{
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.highlight_content svg{
    animation: arrow 5s infinite ease-in-out;
}
table, th, td {
  border: 1px solid #F1F7ED;
  border-collapse: collapse;
}
th,td{
    padding: 5px 10px;
    text-align: center;
}
@media (max-width: 850px){
    .subtitle_section{
        padding-top: 5px;
        padding-left: 15px;
    }
    .subtitle{
        font-size: 1.4rem;
        margin-bottom: 0;
    }
    .content_subsection{
        padding-left: 15px;
        font-size: 1.15rem;
    }
    ul li{
        font-size: 1.15rem;
    }
}
@media (max-width: 700px){
    .subtitle_section{
        padding-left: 10px;
    }
    .content_subsection{
        padding-left: 10px;
        font-size: 1rem;
        line-height: 1.4;
    }
    ul li{
        font-size: 1rem;
        line-height: 1.4;
    }
    th,td{
        font-size: 0.7rem;
    }
}
@media (max-width: 400px){
    .subtitle_section{
        padding-left: 0;
    }
    .subtitle{
        font-size: 1.25rem;
    }
    .content_subsection{
        padding-left: 0;
        font-size: 0.95rem;
    }
    ul li{
        font-size: 0.95rem;
        line-height: 1.4;
    }
    th,td{
        padding: 3px 7px;
    }
}
@keyframes arrow {
    0% {
        transform: translateY(-10px);
    }

    50% {
        transform: translateY(10px);
    }

    100% {
        transform: translateY(-10px);
    }
}
</style>