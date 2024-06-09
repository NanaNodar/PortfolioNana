<template>
    <slot name="grid_title"/>
    <div class="grid" :class="classes">
        <slot name="grid"/>
    </div>
</template>
<script script>
import { ref, computed } from 'vue';
export default {
  props: ['items'],
  setup(props) {
    const classes = computed(() => {
        if(props.items === 8){
            return 'grid_8';
        }else if(props.items === 6){
            return 'grid_8';
        }else if(props.items === 4){
            return 'grid_4';
        }
    });
    return {
      classes // Devuelve classes como propiedad del componente
    };
  }
}
</script>
<style>
.grid_title{
    display: block;
}
.grid{
    display: grid;
}
.grid img{
    height: 80px;
    transition: all 0.5s;
}
.grid_8,.grid_4{
    grid-template-columns: repeat(4, 1fr);
    justify-items: center;
    gap: 40px;
    margin: 30px 0;
}
.grid img:hover{
    transform: scale(1.3);
}
@media (max-width: 700px){
    .grid img:hover{
        transform: scale(1.18);
    }
    .grid_8,.grid_4{
        gap: 20px;
    }
}
@media (max-width: 600px){
    .grid_8,.grid_4{
        grid-template-columns: repeat(2, 1fr);
    }
}
@media (max-width: 400px){
    .grid img{
        height: 70px;
    }
    .grid_8,.grid_4{
        grid-template-columns: repeat(1, 1fr);
        gap: 20px;
    }
}
</style>