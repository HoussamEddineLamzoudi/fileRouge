<template>
    <div>
        <div class="flex flex-col items-center">
            <div>
            <p class="text-5xl text-center font-semibold mt-8">Les Prochaine Trajets</p>

                <Prochaine_trajets :userId="this.profileId" />
            </div>
        </div>

        <div class="mt-10">
            <Reviews />
        </div>
    </div>
</template>

<script>
import Prochaine_trajets from '../components/Prochaine_trajets.vue'
import Reviews from "../components/Reviews.vue";

export default {
    name: 'profile',
    components: {
        Prochaine_trajets,
        Reviews,
    },
    computed:{
        profileId(){
            return this.$store.state.profileId
        }
    },
    mounted(){
        console.log('->'+this.profileId)
    }
}

</script>