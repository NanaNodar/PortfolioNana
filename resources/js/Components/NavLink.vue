<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: String,
    active: Boolean,
});

const classes = computed(() => {
    return props.active
        ? 'active'
        : '';
});
</script>

<template>
    <li v-if="$page.props.user.permissions.includes('create_post')" :class="classes">
        <a :href="href">
            <slot />
        </a>
    </li>
</template>

<style scoped> 
.active{
    background-color: #fff;
}

</style>
