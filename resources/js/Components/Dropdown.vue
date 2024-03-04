<script setup>
import { ref } from 'vue';
const open = ref(false);
</script>

<template>
    <div class="relative">
        <div @click="open = !open">
            <slot name="trigger" />
        </div>
        <div v-if="open" @click="open = false">
            <ul class="menu">
            <slot name="content" />
            </ul>
        </div>
    </div>
  </template>
<style scoped>
  .relative {
    position: relative;
  }

  .menu {
    background: #171614;
    padding: 0;
    border: 1px #363a43 solid;
    box-shadow: 0 0.5em 1em rgba(0, 0, 0, 0.2);
    color: #9fa5b5;
    position: absolute;
    top: 2.5em;
    left: -50%;
    transform: translateX(-30%);
    z-index: 100;
    border-radius: 10px;
    overflow: hidden;
  }
</style>
