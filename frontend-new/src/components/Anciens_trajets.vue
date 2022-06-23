<template>
    <div>
        <div v-if="ancien_trajet.length">
            <div class="text-center">
                <p class="text-5xl font-semibold mt-8 mb-12">Votre Anciens trajets</p>
            </div>
            <div class="flex flex-col items-center mt-() mb-5" v-for="(trajet, i) in ancien_trajet" :key="i" :value="trajet">
            <div> </div>
                <p class="text-s_ry text-3xl font-bold my-8">{{trajet.date_depart}}</p>
                <Trajet :Trajet="trajet"/>
            </div>
        </div>
        <div v-else class="text-5xl font-semibold mt-8 text-center">
            <p>vous avez pas des ancien trajets</p>
        </div>
    </div>
</template>

<script>
import Trajet from './trajet.vue'

export default {
    name: 'Anciens-trajets',
    components: {
        Trajet,
    },
    data(){
        return{
            info_trajet: {
                chauffeurId: '',
                today: '',
            },
            ancien_trajet: ''
        }
    },
    methods: {
        get_new_date(){
            let today = new Date();
            let date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
            this.info_trajet.today = date

            //remplir info trajet
            this.info_trajet.chauffeurId = this.auth
            // console.log(this.info_trajet)
        },
        get_ancien_trajet(){

console.log('wyah')
            fetch(`http://localhost/my_php/fileRouge/backend/trajet/ancien_trajet`,{
                method: "POST",
                body: JSON.stringify(this.info_trajet)
            })
            .then((response) => response.json())
            .then((res) => {
                if(res){

                    this.ancien_trajet = res
                }
            })
        }
    },
    computed:{
        auth(){
            return this.$store.state.auth
        },
    },
    mounted(){
        this.get_new_date(),
        this.get_ancien_trajet()
    }
}

</script>

<style>

</style>