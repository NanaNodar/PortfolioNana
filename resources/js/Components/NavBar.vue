<script setup>
import { Link, router } from '@inertiajs/vue3';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';

</script>

<template>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <ul>
            <li>
                <a :class="{ 'active': route().current('categories.*') }" :href="route('categories.index')">About me</a>
            </li>
            <li>
                <a :href="route('profile.show')" active="route().current('profile.*')">Projects</a>
            </li>
            <li>
                <a :href="route('profile.show')" active="route().current('profile.*')">Education</a>
            </li>
        </ul>
        <div class="container_dropdown">
            <Dropdown>
                <template #trigger>
                    <button type="button">
                        <img v-if="$page.props.locale.includes('es')" class="drop_lang" src="/assets/images/argentina.png" alt="icon Argentina or United States by Flaticon" srcset="">
                        <img v-if="$page.props.locale.includes('en')" class="drop_lang" src="/assets/images/united-states.png" alt="icon Argentina or United States by Flaticon" srcset="">
                    </button>
                </template>

                <template #content>
                    <DropdownLink :href="route('change.lang','es')">
                        Español
                    </DropdownLink>
                    <DropdownLink :href="route('change.lang','en')">
                        English
                    </DropdownLink>
                </template>
            </Dropdown>
        </div>
    </nav>
</template>

<style scoped>
    nav{
        display: flex;
        width: 100%;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 40px;
    }
    nav ul{
        padding: 0;
        margin: auto 0;
    }
    nav ul li{
        display: inline-block;
        line-height: 80px;
        margin: 0 5px;
    }
    nav ul li a{
        font-size: 19px;
        padding: 7px 13px;
    }
    li a.active, .container_login a.active{
        border-bottom: 1px solid #000;
        transition: .5s;
    }
    li a:hover, .container_login a:hover{
        border-bottom: 1px solid #FBFFF1;
        transition: 1s;
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
    button{
        padding: 0;
        border: 0;
        background: transparent;
        cursor: pointer;
    }
    .drop_lang{
        width: 30px;
        height: 30px;
    }
    @media (max-width: 500px) {
        .checkbtn{
            display: block;
        }
        nav ul{
            position: fixed;
            width: 100%;
            height: 100vh;
            background-color: #35356E;
            top: 80px;
            left: -100%;
            text-align: center;
            transition: all .5s;
            color: #171614;
            z-index: 10;
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
            background-color: #B4C5E4;
            border-radius: 5px;
            color: #080049;
            border: none;
        }
        #check:checked ~ ul{
            left: 0;
        }
    }
</style>
