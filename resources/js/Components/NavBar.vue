<script setup>
import { Link, router } from '@inertiajs/vue3';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';

const logout = () => {
    router.post(route('logout'));
};

</script>

<template>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <ul>
            <li>
                <Link :class="{ 'active': route().current('categories.*') }" :href="route('categories.index')">About me</Link>
            </li>
            <li>
                <a :href="route('profile.show')" active="route().current('profile.*')">Projects</a>
            </li>
            <!-- <li>
                <Link :class="{ 'active': route().current('dashboard') }" :href="route('dashboard')">Dashboard</Link>
            </li>
            <li v-if="$page.props.user.permissions.includes('create_post')">
                <Link :class="{ 'active': route().current('categories.*') }" :href="route('categories.index')">Categories</Link>
            </li>
            <li :class="{ 'active': route().current('posts.*') }" v-if="$page.props.user.permissions.includes('create_post')">
                <a :href="route('posts.index')" active="route().current('posts.*')">Blog</a>
            </li> -->
        </ul>
        <div class="container_dropdown">
            <div class="container_icon">
                <Link :href="route('change.mode')"><i class="fa-solid fa-moon"></i></Link>
            </div>
            <Dropdown>
                <template #trigger>
                    <span class="inline-flex rounded-md">
                        <button type="button" class=" items-center ">
                            <img v-if="$page.props.locale.includes('es')" class="drop_lang" src="/assets/images/argentina.png" alt="icon Argentina or United States by Flaticon" srcset="">
                            <img v-if="$page.props.locale.includes('en')" class="drop_lang" src="/assets/images/united-states.png" alt="icon Argentina or United States by Flaticon" srcset="">
                        </button>
                    </span>
                </template>

                <template #content>
                    <DropdownLink :href="route('change.lang','es')">
                        Español
                    </DropdownLink>
                    <div class="border-t border-gray-200" />
                    <DropdownLink :href="route('change.lang','en')">
                        English
                    </DropdownLink>
                </template>
            </Dropdown>
            <Dropdown v-if="$page.props.auth?.user">
                <template #trigger>
                    <span class="inline-flex rounded-md">
                        <button type="button" class="inline-flex items-center ">
                            {{ $page.props.auth.user ? $page.props.auth.user.name : 'Guest' }}

                            <svg class="ms-2 -me-0.5 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                    </span>
                </template>

                <template #content>
                    <!-- Account Management -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        Manage Account
                    </div>

                    <DropdownLink :href="route('profile.show')">
                        Profile
                    </DropdownLink>

                    <div class="border-t border-gray-200" />

                    <!-- Authentication -->
                    <form @submit.prevent="logout">
                        <DropdownLink as="button">
                            Log Out
                        </DropdownLink>
                    </form>
                </template>
            </Dropdown>
            <div class="container_login" v-else>
                <a :href="route('login')">Log in</a>
                <a :href="route('register')">Register</a>
            </div>
        </div>
    </nav>
</template>

<style scoped>
    nav{
        display: flex;
        width: 100%;
        justify-content: space-between;
        align-items: center;
    }
    nav ul li{
        display: inline-block;
        line-height: 80px;
        margin: 0 5px;
    }
    nav ul li a{
        font-size: 17px;
        padding: 7px 13px;
    }
    li a.active, .container_login a.active{
        border-bottom: 1px solid #000;
        transition: .5s;
    }
    li a:hover, .container_login a:hover{
        border-bottom: 1px solid #fff;
        transition: 1s;
    }
    li a.active.light-mode, .container_login a.active.light-mode{
        background: #ccc;
        border: none;
        border-radius: 5px;
        transition: .5s;
    }
    li a.light-mode:hover, .container_login a.light-mode:hover{
        background: #444;
        color: #fff;
        border-radius: 5px;
        transition: .5s;
    }
    .checkbtn{
        display: none;
        font-size: 30px;
        line-height: 80px;
    }
    #check{
        display: none;
    }
    .container_dropdown{
        display: flex;
        gap: .7rem;
        align-items: center;
    }
    .container_login a{
        text-decoration: none;
        font-size: 17px;
        padding: 7px 13px;
    }
    .fa-moon{
        color: #ffb223;
        padding: 7px 9px;
        border-radius: 100%;
        background: #444;
    }
    .fa-moon:hover{
        cursor: pointer;
        background: #555;
    }
    .drop_lang{
        width: 30px;
        height: 30px;
        margin-bottom: -6.5px;
    }
    @media (max-width: 952px) {
        nav ul li a{
            font-size: 16px;
        }
    }
    @media (max-width: 858px) {
        .checkbtn{
            display: block;
        }
        nav ul{
            position: fixed;
            width: 100%;
            height: 100vh;
            background-color: #444;
            top: 80px;
            left: -100%;
            text-align: center;
            transition: all .5s;
        }
        nav ul.light-mode{
            background-color: #ddd;
        }
        nav ul li{
            display: block;
            margin: 50px 0;
            line-height: 30px;
        }
        nav ul li a{
            font-size: 20px;
            border: none;
        }
        nav ul li a.active, nav ul li a:hover{
            background-color: #eee;
            border-radius: 5px;
            color: #000;
            border: none;
        }
        a.active.light-mode{
            background-color: #bbb;
            border-radius: 5px;
            color: #000;
        }
        a.light-mode:hover{
            background-color: #444;
            border-radius: 5px;
            color: #fff;
        }
        #check:checked ~ ul{
            left: 0;
        }
    }
</style>
