<template>

<div class="register_container container_page w-full flex justify-center items-center">
    <div class=" flex w-1/2  h-[100vh] items-center justify-center">
            <img class="w-[90%]" src="../components/img/Front car-pana.png" />
            <!-- <img src="../components/img/re.png" /> -->
    </div>
    
    <formRegister :user="user" :hasCar="hasCar"/>
</div>

</template>

<script>

import formRegister from "../components/formRegister.vue";

export default {
    name: 'Chauffeur_Register',
    components: {
        formRegister,
    },
    data() {
        return{
            user: 'Chauffeur',
            hasCar: 'true',
        };
    }
}

</script>

<style>

</style>