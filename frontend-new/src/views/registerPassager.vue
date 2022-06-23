<template>

<div class="register_container container_page w-full flex justify-center items-center">

    <formRegister :user="user" :hasCar="hasCar"/>

    <div class=" flex w-1/2  h-[100vh] items-center justify-center">
            <!-- <img src="../components/img/re.png" /> -->
            <!-- <img class="w-[90%] h-[75%]" src="../components/img/Airport-pana.png" /> -->
            <img class="w-[90%]" src="../components/img/Car driving-bro.png" />

    </div>
    
</div>

</template>

<script>

import formRegister from "../components/formRegister.vue";

export default {
    name: 'Passager_Register',
    components: {
        formRegister,
    },
    data() {
        return{
            user: 'Passager',
            hasCar: 'false',
        };
    }
}

</script>

<style>

</style>