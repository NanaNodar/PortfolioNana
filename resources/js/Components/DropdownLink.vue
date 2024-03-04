<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    href: String,
    as: String,
});
</script>

<template>
    <li>
        <button v-if="as == 'button'" type="submit">
            <slot />
        </button>

        <a v-else-if="as =='a'" :href="href">
            <slot />
        </a>

        <Link v-else :href="href">
            <slot />
        </Link>
    </li>
</template>
<style scoped>
    .menu li{
        padding: 0 0.8em;
        margin: 0;
        cursor: pointer;
        line-height: 50px;
        width: 100%;
    }
    .menu li:hover{
        background: #2a2d35;
    }
</style>