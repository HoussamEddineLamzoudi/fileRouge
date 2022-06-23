<template>
    <div class="w-full">
        <div class="steps_animation"></div>

        <div class="multiForm mt-52 container w-3/5 py-5 items-center border rounded h-72 mb-5 ">

            <form @submit.prevent="" class="max-w-screen-md gap-4 mx-auto">

            <div class="">

                <div v-if="currentActive == 1" class="step1">
                    <div class="">
                        <label for="first-name" class="inline-block text-gray-800 text-sm font-semibold sm:text-base ml-4 mb-2">Ville De Départ</label>
                        <input type="text" placeholder="Départ" list="cities" name="depart" v-model="trajet.depart" class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
                        <datalist id="cities" class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2">
                            <option v-for="(city, i) in cities" :key="i" :value="city">{{city}}</option>
                        </datalist>
                    </div>

                    <div class="mb-5">
                        <label for="first-name" class="inline-block text-gray-800 text-sm font-semibold sm:text-base ml-4 mb-2">Ville d'arrivée</label>
                        <input type="text" placeholder="Destination" list="cities" name="arrive" v-model="trajet.arrive" class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
                        <datalist id="cities" class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2">
                            <option v-for="(city, i) in cities" :key="i" :value="city">{{city}}</option>
                        </datalist>
                    </div>

                </div>

                <div v-if="currentActive == 2" class="step2 ">
                    
                    <input type="date" placeholder="Aujourd'hui" v-model="trajet.date_depart" class="bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2 w-full mb-5" />

                    <div class="flex justify-between">

                        <select name="" v-model="trajet.heur_depart" id="" class="bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 w-[80%] px-3 py-2  mb-5">
                            <option v-for="(time, i) in times" :key="i" :value="time">{{time}}</option>
                        </select>

                        <select name="am" id="" v-model="trajet.am" class="bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2 w-[15%] mb-5">
                            <option value="1">AM</option>
                            <option value="0">PM</option>
                        </select>

                    </div>

                </div>

                <div v-if="currentActive == 3" class="step2 ">
                    
                    <div class="mb-5">
                        <label for="nbr_passager" class="inline-block text-gray-800 text-sm font-semibold sm:text-base ml-4 mb-2">Nombre des passagers</label>
                        <input type="number" placeholder="Entrez le nombre des passagers" name="nbr_passager" v-model="trajet.nbr_passager" class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
                    </div>

                    <div class="mb-5">
                        <label for="prix" class="inline-block text-gray-800 text-sm font-semibold sm:text-base ml-4 mb-2">Prix</label>
                        <input type="number" placeholder="Entrez le prix" name="prix" v-model="trajet.prix" class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
                    </div>

                </div>

                <div v-if="currentActive == 4" class="step2 flex flex-col items-center">
                    <p class="text-3xl font-semibold text-center">Permettez-vous aux passagers de fumer ?</p>

                    <div class="flex justify-center gap-24 my-12">
                        <div class="">
                            <label for="1" class="border-2  rounded px-5 pp pt-12 cursor-pointer hover:border-green-300" :class="trajet.cigarette_autorisee == '1' ? 'border-green-300' : ''"><img src="../components/icons/sgr_grn.png"  alt=""></label>
                            <input v-show="false" id="1" type="radio" v-model="trajet.cigarette_autorisee" value="1" name="filter" class="w-7 h-7 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" >
                        </div>
                        
                        <div class="">
                            <label for="2" class="mr-4 border-2 rounded py-5 pl-12 pr-12 cursor-pointer hover:border-red-400" :class="trajet.cigarette_autorisee == '0' ? 'border-red-400' : ''"><img src="../components/icons/sgr-red.png" alt=""></label>
                            <input v-show="false" id="2" type="radio" v-model="trajet.cigarette_autorisee" value="0" name="filter" class="w-7 h-7 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        </div>
                        <div class="mt-5" :class="true"></div>
                    </div>

                </div>
                <div>
                    <Toast position="top-left" />
                </div>
                </div>


            </form>

        </div>

        <div class="container buttons w-3/5 flex flex-row justify-between ">

            <div v-if="currentActive > 1" @click="previous" class="flex justify-start"><Button :text="button_text_1" /></div>
            <div v-if="currentActive == totalSteps" @click="ajouter" class="flex justify-center" ><Button :text="button_text_2" /></div>
            <div v-if="currentActive < totalSteps" @click="next" class="flex justify-end"><Button :text="button_text_3"  /></div>
            
        </div>


    </div>
</template>

<script>
import Button from './button.vue'
import axios from 'axios'

import Toast from 'primevue/toast';

export default {
    name: 'MultiForm',
    components: {
        Button,
        Toast
    },
    data() {
        return{
            button_text_1: 'Précédente',
            button_text_2: 'Aouter',
            button_text_3: 'Suivante',
            times : [],
            currentActive: 1,

            totalSteps: 4,

            today : new Date(2011, 1, 1, 0, 30, 0),
            


        
            trajet: {

                depart: '',
                arrive: '',
                date_depart: '',
                heur_depart: '',
                am: '',
                nbr_passager: '',
                prix: '',
                cigarette_autorisee: '',
                chauffeurId: this.$store.state.auth,
            },

            cities: [],
        }
    },
    methods: {
        
        async get_cities() {
        await axios.post('https://countriesnow.space/api/v0.1/countries/cities', {
        country: "Morocco"
        }).then(response =>{

            response.data.data.forEach(element => {
                this.cities.push(element)
        })
        }).then(() => {
            console.log('Morocco')
        })
        },

        previous(){

            this.currentActive--
        },

        next(){

            this.currentActive++
            console.log(this.trajet)
        },

        ajouter(){

            fetch(`http://localhost/my_php/fileRouge/backend/trajet/addTrajet`,{
                method: "POST",
                body: JSON.stringify(this.trajet)
            })
            .then((response) => response.json())
            .then((res) => {
                if(res.add_seccess == true){
                    // console.log('ok rani trasit')
                    this.$toast.add({severity:'success', summary: 'Success Message', detail:'added with Success', life: 3000})
                    this.$router.push('/dash/prochaine')

                }
            })
            
        },
        time_slot(){
        for (let i = 0; i < 24; i++) {
            
                var timePeriod = "00:30:00";   
            
            var dateMillis = this.today.getTime();
            

            var parts = timePeriod.split(/:/);
            var timePeriodMillis = (parseInt(parts[0], 10) * 60 * 60 * 1000) +
                        (parseInt(parts[1], 10) * 60 * 1000) + 
                        (parseInt(parts[2], 10) * 1000);


            this.today.setTime(dateMillis + timePeriodMillis);

            // console.log(this.today); 
            // console.log(this.today.toString().substring(16,21));
            this.times.push(this.today.toString().substring(16,21))
        }
    }
},
    mounted() {
        this.get_cities(),
        this.time_slot(),
        console.log(this.$store.state.auth)

    },
    
}
</script>

<style>
.pp{
    padding-bottom: 45%;
}
</style>