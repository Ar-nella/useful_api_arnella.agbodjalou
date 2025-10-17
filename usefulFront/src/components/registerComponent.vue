<script setup>
import { ref } from 'vue';

const name = ref('');
const email = ref('');
const password = ref('');
const password_confirmation = ref('');

console.log("email", email.value)
console.log("password", password.value)


const register = async () => {

}


</script>

<template>

    <form action="" @submit.prevent="register" class="gap-2">
        <div>
            <label for="name">Name</label>
            <input v-model="name" type="text" class="border rounded">
        </div>
        <div>
            <label for="email">Email</label>
            <input v-model="email" type="email" class="border rounded">
        </div>
        <div>
            <label for="password">Password</label>
            <input v-model="password" type="password" class="border rounded">
        </div>
        <div>
            <label for="password_confirmation">Password confirmation</label>
            <input v-model="password_confirmation" type="password" class="border rounded">
        </div>

        <button type="button" @submit="register">Login</button>
    </form>

</template>