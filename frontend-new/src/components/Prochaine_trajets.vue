<template>
<div>
    <div v-if="prochaine_trajet.length">
        <div class="text-center">
            <p v-if="this.$route.matched.some(route => route.path.includes('/dash/prochaine'))" class="text-5xl font-semibold mt-8">Votre Prochaine Trajets</p>
        </div>
        <div class="flex flex-col items-center mt-16 mb-5" v-for="(trajet, i) in prochaine_trajet" :key="i" :value="trajet">
            <p class="text-s_ry text-3xl font-bold my-8">{{trajet.date_depart}}</p>
            <Trajet :Trajet="trajet"/>
        </div>
    </div>
    <div v-else class="text-center text-5xl font-semibold mt-8">
        vous avez pas des future trajets
    </div>
</div>
</template>

<script>
import Trajet from './trajet.vue'

export default {
    name: 'Prochaine-trajets',
    props: {
        userId: Number
    },
    components: {
        Trajet,
    },
    data(){
        return{
            info_trajet: {
                chauffeurId: '',
                today: '',
            },
            prochaine_trajet: ''
        }
    },
    methods: {
        get_new_date(){
            let today = new Date();
            let date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
            this.info_trajet.today = date

            //remplir info trajet
            if(this.$store.state.typeUser == 'passager'){
                this.info_trajet.chauffeurId = this.userId
            } else{
                this.info_trajet.chauffeurId = this.auth
            }
            // console.log(this.info_trajet)
        },
        get_prochaine_trajet(){

            fetch(`http://localhost/my_php/fileRouge/backend/trajet/prochaine_trajet`,{
                method: "POST",
                body: JSON.stringify(this.info_trajet)
            })
            .then((response) => response.json())
            .then((res) => {
                if(res){

                    this.prochaine_trajet = res
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
        this.get_prochaine_trajet(),
        console.log('oo'+this.userId)
    }
}

</script>

<style>

</style>