<template>
    <div class="trajet flex flex-col md:flex-row items-center border rounded-lg overflow-hidden ">
<!-- route.path.includes('/') -->
        <!-- profil -->
        <div class="profile w-1/4 flex flex-col justify-center items-center p-3">
            <div class="photo">
                <img src="./icons/person.png" alt="profile_img">
            </div>
            <div class="cursor-pointer userName py-2 px-4 mb-1 text-sm text-gray-700 font-bold" @click="get_profile">
                {{this.Trajet.userName}}
                <!-- <router-link to="/profile">
                    {{this.Trajet.userName}}
                </router-link> -->
            </div>
        </div>

        <!-- pay -->
        <div class="pay h-52"></div>

        <!-- info du trajet -->
        <div class="info w-3/4 flex flex-col p-3 pr-2 pl-2">

            <!-- layer 00 -->
            <!-- dropdown -->
            <div v-if="this.$route.matched.some(route => route.path.includes('/dash/prochaine'))" class="flex justify-end mb-3">
                <button id="dropdownDefault" @click="changeDrop" class=" w-5 h-2 icon-drop" data-dropdown-toggle="dropdown"  type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M120 256C120 286.9 94.93 312 64 312C33.07 312 8 286.9 8 256C8 225.1 33.07 200 64 200C94.93 200 120 225.1 120 256zM280 256C280 286.9 254.9 312 224 312C193.1 312 168 286.9 168 256C168 225.1 193.1 200 224 200C254.9 200 280 225.1 280 256zM328 256C328 225.1 353.1 200 384 200C414.9 200 440 225.1 440 256C440 286.9 414.9 312 384 312C353.1 312 328 286.9 328 256z"/></svg></button>
                <!-- Dropdown menu -->
                <div id="dropdown"  :class=" drop ? 'hidden' : '' " class="mt-2 absolute z-10 right-64 top-64 bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Modifier</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Supprimer </a>
                    </li>
                    </ul>
                </div>
            </div>

            <!-- <div class=" w-5 h-2 icon-drop">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M120 256C120 286.9 94.93 312 64 312C33.07 312 8 286.9 8 256C8 225.1 33.07 200 64 200C94.93 200 120 225.1 120 256zM280 256C280 286.9 254.9 312 224 312C193.1 312 168 286.9 168 256C168 225.1 193.1 200 224 200C254.9 200 280 225.1 280 256zM328 256C328 225.1 353.1 200 384 200C414.9 200 440 225.1 440 256C440 286.9 414.9 312 384 312C353.1 312 328 286.9 328 256z"/></svg>
            </div> -->

            <!-- layer 01 -->
            <div class="flex justify-between mb-3 mt-1">
                <div class="w-1/4 flex flex-col justify-center items-center">
                    <div><img src="./icons/map.png" alt=""></div>
                    <div class="font-semibold">{{this.Trajet.depart}}</div>
                    <div class="font-normal">{{this.Trajet.heur_depart}} 
                    <span v-if="this.Trajet.am == 1">AM</span>
                    <span v-else >PM</span>
                    </div>
                </div>

                <div class="w-2/4 flex justify-center items-center"><img src="./icons/arrow.png" alt=""></div>

                <div class="w-1/4 flex flex-col justify-center items-center">
                    <div><img src="./icons/map.png" alt=""></div>
                    <div class="font-semibold">{{this.Trajet.arrive}}</div>
                    <div class="font-normal">01:00 am</div>
                </div>
            </div>

            <!-- layer 02 -->
            <div class="flex justify-between mb-3">

                <div class="flex">
                    <img class="mr-4" src="./icons/krs.png" alt="">
                    <div class="font-semibold text-2xl">{{this.Trajet.nbr_passager}}</div>
                </div>

                <div>
                    <img v-if="this.Trajet.cigarette_autorisee == 1" src="./icons/sgr_grn.png" alt="">
                    <img v-else src="./icons/sgr-red.png" alt="">
                </div>

                <div class="flex">
                    <div class="text-s_ry font-semibold text-2xl">{{this.Trajet.prix}}</div>
                    <div class="text-s_ry font-semibold text-2xl ml-2">DH</div>
                </div>
            </div>



            <!-- layer 03 -->
            <a href="https://wa.me/">
            <div v-if="!this.$route.matched.some(route => route.path.includes('/dash/ancien'))" class="flex justify-center mb-2">
                <Button :text="button_text" />
            </div>
            </a>

        </div>
    </div>
</template>

<style>
.trajet{
    width: 830px;
}
.pay {
    border-right: 1px solid black;
    
}

</style>

<script>
import { storeKey } from 'vuex'
import Button from './button.vue'

export default {
    name: 'Trajet',
    components: {
        Button,
    },
    props: {
        Trajet: Object,
    },
    data() {
        return {
            button_text: 'contacter',
            drop: true
        }
    },
    methods: {
        changeDrop() {
            this.drop = !this.drop
        },
        get_profile(){
            console.log('test')
            this.$store.commit('setProfileId', this.Trajet.chauffeurId)
            // console.log(this.$store.state.profileId)
            console.log(this.$store.state.typeUser)
            this.$router.push('/profile')
        },
    },
    mounted() {
        console.log('--'+this.$store.state.typeUser)
    }
}

</script>