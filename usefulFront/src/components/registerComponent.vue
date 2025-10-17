<script setup>
import { ref } from 'vue';


const email = ref();
const password = ref();

const register = async() =>{
    
}


</script>

<template>

    <form action="" @submit.prevent="register">
        <div>
            <label for="email">Email</label>
            <input v-model="email" type="email">
        </div>
        <div>
            <label for="password">Password</label>
            <input v-model="password" type="password">
        </div>

        <button type="button" @submit="register">Login</button>
    </form>

</template>