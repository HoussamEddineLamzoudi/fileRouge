<template>
    <div>
        <!-- <div v-if="!trajets_info">

        </div> -->
        <div  v-for="(trajet, i) in trajets_info" :key="i" :value="trajet" class="mb-5">
            <trajet :Trajet="trajet" />
            <!-- {{trajet}} -->
        </div>
    </div>
</template>

<script>
import trajet from './trajet.vue'

export default {
    components: {
        trajet,
    },
    data(){
        return{
            trajet_vid: {}
        }
    },
    computed: {
        trajets_info(){
            return this.$store.state.trajets
        },
    },
    mounted(){
    }

}

</script>