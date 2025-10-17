import { defineStore } from "pinia";
import { authModel } from "@/services/authService";


export const useAuthStore = defineStore('users',{
    state: {
        userData: {},
        userToken: null

    },

    actions: {
        async login(userinfos) {
            try {
                const response = await authModel.login(userinfos);
                console.log(response.data);
                return response.data
                this.userData = (response).data;
                
            } catch (error) {
                console.log("Error during login", error);
            }
            
        },

        async register(userinfos) {
            try {
                const response = await authModel.register(userinfos);
                console.log(response.data);
                this.userData = (response).data;
                
            } catch (error) {
                console.log("Error during login", error);
            }
            
        },

        async getUser(userId) {
            try {
                const response = await authModel.getUser(userId);
                console.log(response.data);
                this.userData = (response).data;
                
            } catch (error) {
                console.log("Error during login", error);
            }
            
        }
    },

    persist: { key: 'userData', storage: localStorage },
})