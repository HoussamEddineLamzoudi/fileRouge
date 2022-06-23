<template>
    <div v-if="isVisible" class="w-[1000px]">
        <div class="ww fixed inset-0 z-50 flex justify-center items-center">
            <div class="flex items-center justify-center flex-col rounded-lg shadow-lg bg-white edit-class">

            <!-- popup content -->

                <label for="message" class="block mb-2 text-4xl font-semibold text-gray-900 dark:text-gray-400">Votre Review</label>
                <textarea id="message" rows="4" class="w-5/6 block p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a comment..." v-model="info_review.body"></textarea>

            <div class="w-4/6 flex justify-center">
                <div class="w-full">
                <input type="range" v-model="info_review.rating" min="0" max="5" list="number" class="w-4/6"/>
                    <datalist id="number">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    </datalist>
                </div>
                <div class="flex">
                    <div>
                        {{this.info_review.rating}}
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div @click="add_review" class="mt-7 col-span-2 w-full bt flex justify-center mb-2">
                    <Button :text="button_text" />
            </div>

            </div>
        </div>


        <!-- background -->
        <div class="opacity-25 fixed inset-0 z-40 bg-black">

        </div>
    </div>
</template>

<script>
import Button from '../components/button.vue'

export default {
    components:{
        Button
    },
    props:{
        isVisible: Boolean,
    },
    data(){
        return{
            button_text: 'envoyer',
            info_review: {
                body: '',
                rating: 1,
                passagerId: '',
                chauffeurId: '',
            }
        }
    },
    methods: {
        add_review(){
            console.log('okokoko')
            this.info_review.chauffeurId = this.profileId
            this.info_review.passagerId = this.auth
            console.log(this.info_review)

            fetch(`http://localhost/my_php/fileRouge/backend/review/add_review`,{
                method: "POST",
                body: JSON.stringify(this.info_review)
            })
            .then((response) => response.json())
            .then((res) => {
                if(res.add_seccess == true){

                    this.$store.commit("setVisibility_rev", false)
                    this.$router.push('/profile')
                    
                }
            })
        }
    },
    
    computed:{
        auth(){
            return this.$store.state.auth
        },
        profileId(){
            return this.$store.state.profileId
        }
    },
    mounted(){
        console.log('ii'+this.auth);
    }
    
}
</script>

<style>
.edit-class{
    width: 60%;
    height: 70%;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    /* padding: 10px; */
}
</style>