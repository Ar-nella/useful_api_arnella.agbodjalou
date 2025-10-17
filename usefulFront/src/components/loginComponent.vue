<script setup>
import { ref } from 'vue';
import { useAuthStore } from '@/stores/authStore';
console.log("loginView");

const authStore = useAuthStore();

const email = ref("null");
const password = ref("null");

console.log("email", email.value)
console.log("password", password.value)



const login = async () => {
    if (!email.value.trim() || !password.value.trim()) return

    const raw = {
        'email': email.value,
        'password': password.value
    }

    try {
        result = authStore.login(raw)
        console.log(result)
    } catch (error) {
        console.log("Error during login", error);

    }


}

</script>

<template>

    <form action="" @submit.prevent="login">
        <div class="flex">
            <label for="email">Email</label>
            <input v-model="email" type="email" class="border rounded">
        </div>

        <div>
            <label for="password">Password</label>
            <input v-model="password" type="password" class="border rounded">
        </div>

        <button type="button" @submit="login" class="">
            Login
        </button>
    </form>

</template>