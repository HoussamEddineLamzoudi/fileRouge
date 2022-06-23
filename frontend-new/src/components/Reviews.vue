<template>
    <div>

            <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="max-w-screen-md px-4 md:px-8 mx-auto">
        <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-8 xl:mb-12">Customer Reviews</h2>

        <div class="flex justify-between items-center border-t border-b py-4 mb-4">
            <div class="flex flex-col gap-0.5">
            <span class="block font-bold">Total</span>

            <!-- stars - start -->
            <div class="flex gap-0.5 -ml-1">

                4.3<div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                </div>

            </div>
            <!-- stars - end -->

            </div>
            <div v-if="typeUser !== 'passager'" @click="$store.commit('setVisibility_rev', true)" class="cursor-pointer inline-block bg-white hover:bg-gray-100 active:bg-gray-200 focus-visible:ring ring-indigo-300 border text-gray-500 text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-4 md:px-8 py-2 md:py-3">
                Ajouter Reiviews
                <div class="full">
                    <ReviewsPopup :isVisible="Visibility_rev" />
                </div>
            </div>

        </div>

        <div v-for="(review, i) in reviews" :key="i" :value="review" class="">
            <Review :Review="review"/>
        </div>



        </div>
        </div>

    </div>
</template>

<script>
import ReviewsPopup from '../components/ReviewsPopup.vue';
import Review from '../components/Review.vue';

export default {
    name: 'Reviews',
    components: {
        ReviewsPopup,
        Review,
    },
    data(){
        return{
            info_review: {
            chauffeurId: '',
        },
        reviews:''
        }
    },
    computed: {
        Visibility_rev(){
            return this.$store.state.rev
        }
    },
    methods:{
        test(){
            console.log('hi')
            $store.commit('setVisibility_rev', true)
            console.log(this.Visibility_rev)
        },
        get_reviews(){

            this.info_review.chauffeurId = this.profileId
            fetch(`http://localhost/my_php/fileRouge/backend/review/get_reviews`,{
                method: "POST",
                body: JSON.stringify(this.info_review)
            })
            .then((response) => response.json())
            .then((res) => {
                if(res){
                    console.log('hani');
                    this.reviews = res
                }
            })
        }
    },
    computed: {
        profileId(){
            return this.$store.state.profileId
        },
        Visibility_rev(){
            return this.$store.state.rev
        }
    },
    mounted() {
        this.get_reviews()
        // console.log('jawad'+this.profileId)
    }

}
</script>