<template>
    <div class="project_container" :class="{ 'expanded': expanded }" :id="props.id">
        <div class="img_container" v-if="props.imgs.length > 0">
                <transition name="fade" mode="out-in">
                    <img @click="openModal" class="img" :key="currentIndex" :src="props.imgs[currentIndex]" alt="">
                </transition>
            <div class="controller_img">
                <button @click="changeImg(1)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: #F1F7ED;">
                        <path d="M13.939 4.939 6.879 12l7.06 7.061 2.122-2.122L11.121 12l4.94-4.939z"></path>
                    </svg>
                </button>
                <button @click="changeImg(-1)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: #F1F7ED;">
                        <path d="M10.061 19.061 17.121 12l-7.06-7.061-2.122 2.122L12.879 12l-4.94 4.939z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="info_container">
            <div class="info_header">
                <span class="info_title">
                    <slot name="title" />
                </span>
                <a :href="props.link" class="info_link">Link</a>
            </div>
            <div ref="infoContent" class="info" :class="{ 'expanded': expanded }">
                <slot name="info" />
            </div>
            <span @click="toggleInfo" class="more_info">More info+</span>
            <div class="info_footer">
                <span class="item_footer" v-for="item in items">
                    {{ item }}
                </span>
            </div>
        </div>
    </div>
</template>
<script>
import { onMounted, ref, computed } from 'vue';

export default {
  props: ['id', 'link', 'items', 'imgs'],
  setup(props, { emit }) { // Pasar el segundo argumento para obtener emit
    const currentIndex = ref(0);
    const expanded = ref(false);

    const openModal = () => {
      emit('open-modal', props.imgs[currentIndex.value]); // Pasar la URL de la imagen al abrir el modal
    };

    function changeImg(change) {
      currentIndex.value = (currentIndex.value + change + props.imgs.length) % props.imgs.length;
    }

    const toggleInfo = (e) => {
        expanded.value = !expanded.value;
        expanded.value ? e.target.textContent = 'Less info-' : e.target.textContent = 'More info+';
    };

    const heightText = computed(() => {
        return expanded.value ? 'none' : '125px';
    });

    const heightContainer = computed(() => {
        return expanded.value ? 'none' : '500px';
    });


    return {
      openModal,
      props,
      currentIndex,
      changeImg,
      toggleInfo,
      expanded,
    };
  },
};
</script>
<style scoped>
.project_container{
    margin: 20px 0;
    display: flex;
    max-height: 250px;
    gap: 10px;
}
.expanded{
    max-height: none;
}
.img_container{
    padding: 10px;
    max-height: 100%;
    min-width: 350px;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
}
.img_container img{
    height: 100%;
    object-fit: contain;
    width: 100%;
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
.controller_img{
    display: flex;
    justify-content: space-between;
}
.controller_img button{
    background: transparent;
    border: none;
    outline: none;
    transition: all 0.5s ease;
    cursor: pointer;
}
.controller_img button:hover{
    transform: scale(1.3);
}
.info_container{
    display: flex;
    flex-direction: column;
    justify-content: center;
}
.info_header{
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
}
.info_title{
    font-size: 1.4rem;
}
.info_link{
    font-size: 0.9rem;
}
.info_link a:hover{
    text-decoration: underline;
}
.info{
    margin: 0;
    line-height: 25px;
    font-size: 18px;
    max-height: 125px;
    overflow: hidden;
}
.expanded{
    max-height: none;
}
.more_info{
    display: block;
    text-align: end;
    cursor: pointer;
    position: relative;
    font-size: 0.7rem;
}
.more_info:hover{
    color: #b0b4ad;
}
.info_footer{
    margin-top: 10px;
}
.item_footer{
    padding: 5px 10px;
    border-radius: 20px;
    background: #F1F7ED;
    color: #2D2D2A;
    font-size: 15px;
    margin-right: 8px;
}

@media(max-width:850px){
    .info_title{
        font-size: 1.3rem;
    }
    .info{
        line-height: 1.5;
        font-size: 1rem;
    }
}
@media(max-width:700px){
    .info_title{
        font-size: 1.2rem;
    }
    .info{
        font-size: 0.85rem;
        line-height: 1.4;
    }
}
@media(max-width:600px){
    .project_container{
        max-height: 600px;
        flex-direction: column-reverse;
        height: auto;
    }
    .project_container .expanded{
        max-height: none;
    }
    .img_container img{
        width: 100%;
        max-height: 150px;
    }
    .img_container{
        height: 250px;
    }
}
</style>