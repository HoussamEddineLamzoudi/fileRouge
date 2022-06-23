<template>
    <div class="min-h-[100vh]">
        <div class="container mb-9">
            <Barre />
        </div>
        <div v-if="trajets_info.length" class="container flex ">
            <div class="w-2/5">
                <Filter />
            </div>
            <div v-if="trajets_info.length" class="w-3/5">
                <trajets />
            </div>
        </div>
        
        
        
    </div>
</template>

<script>
import Barre from "../components/BarreRecherche.vue"
import trajets from '../components/trajets.vue'
import Filter from '../components/Filter.vue'

export default {
    components: {
        trajets,
        Barre,
        Filter,
    },
    computed: {
        trajets_info(){
            return this.$store.state.trajets
        },
    },
}

</script>