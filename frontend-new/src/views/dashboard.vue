<template>
    <div class="flex w-full">
        <div class="w-1/6">
            <Sidebar />
        </div>
        <div class="w-5/6">
            <router-view />
        </div>
    </div>

</template>

<!-- <template>
    <div class="flex w-full">
        <div class="w-1/6">
            <Sidebar />
        </div>
        <div class="w-5/6">
            <div v-if=" affiche == 'Prochaine' ">
                <Prochaine_trajets />
            </div>
            <div v-if=" affiche == 'Anciens' ">
                <Anciens_trajets />
            </div>
            <div v-if=" affiche == 'Riviews' ">
                <p class="text-5xl font-extrabold">Riviews</p>
            </div>
        </div>
    </div>
</template> -->

<script>
import Sidebar from '../components/sidebare.vue'
import Prochaine_trajets from '../components/Prochaine_trajets.vue'
import Anciens_trajets from '../components/Anciens_trajets.vue'

export default {
    name: 'Dashboard',
    components: {
        Sidebar,
        Prochaine_trajets,
        Anciens_trajets,
    },
    data() {
        return{
            affiche: 'Prochaine',
        }
    },
    methods: {

    },
    mounted() {

    }
}
</script>