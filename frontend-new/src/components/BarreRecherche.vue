<template>
    <div>
        <form @submit.prevent="" >
        <div class="w-3/5 h-24 gap-3 container wtrajet flex flex-col md:flex-row items-center border rounded overflow-hidden justify-around mt-5">

            <input type="text" placeholder="Départ" v-model="search_trajet.depart" list="cities" class="bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2"/>
            <datalist id="cities" class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2">
                <option v-for="(city, i) in cities" :key="i" :value="city">{{city}}</option>
            </datalist>
            
            <input type="text" placeholder="Destination" v-model="search_trajet.arrive" list="cities" class="bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2"/>
            <datalist id="cities" class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2">
                <option v-for="(city, i) in cities" :key="i" :value="city">{{city}}</option>
            </datalist>

            <!-- <div class="">
                <litepie-datepicker
                    v-model="dateValue"
                ></litepie-datepicker>
            </div> -->

            <input type="date" placeholder="Aujourd'hui" v-model="search_trajet.date_depart" class="bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2 w-full" />

            <input type="number" v-model="search_trajet.nbr_passager" class="bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 w-20 px-3 py-2"/>

            <Button :text="button_text" @click="send_info" />
        </div>
        </form>
    </div>
            <p class="text-center text-5xl font-bold mt-10">{{this.aucune}}</p>
</template>

<script>
import Button from './button.vue'
import axios from "axios"
// import { coolGray } from 'tailwindcss/colors'


export default {
    name: 'barre',
    components: {
        Button,
    },
    data() {
        return{
            button_text: 'Rechercher',
            aucune: '',
            cities: [],

            search_trajet : {
                depart: '',
                arrive: '',
                date_depart: '',
                nbr_passager: '1',
            },
            char: ''
        }
    },
    methods: {
        
        async get_cities() {
        await axios.post('https://countriesnow.space/api/v0.1/countries/cities', {
        country: "Morocco"
        }).then(response =>{

            response.data.data.forEach(element => {
            this.cities.push(element)
        }
        )
        }).then( ()=>{
        }
            
            // console.log(this.cities)
        )
        },
        get_new_date(){

            let today = new Date();
            if(today.getMonth()+1 < 10){
                this.char = '0'
            }
            let date = today.getFullYear()+'-'+this.char+(today.getMonth()+1)+'-'+today.getDate();
            this.search_trajet.date_depart = date
        },
        send_info() {
            // console.log(this.search_trajet)


            fetch(`http://localhost/my_php/fileRouge/backend/trajet/get_trajet`,{
                method: "POST",
                body: JSON.stringify(this.search_trajet)
            })
            .then((response) => response.json())
            .then((res) => {
                if(res){
                    console.log(res)
                    this.$store.commit('setTrajet', res)
                    this.$store.commit('setBackup', res)
                    // console.log(this.trajets)
                }
                if(this.trajets_info.length == 0){
                    console.log('00000')
                    this.aucune = 'aucun résultat trouvé'
                }
            })
        }
    },
    mounted() {
        this.get_cities()
        this.get_new_date()
        console.log(this.search_trajet)
    },
    computed: {
        trajets_info(){
            return this.$store.state.trajets
        },
    },
}

</script>

<style>

</style>