<template>
    <div class="flex w-[95%] wtrajet flex-col  items-center border rounded overflow-hidden justify-around h-auto mb-5">

            <div class="filter_1 flex items-center py-4 w-full justify-around h-full">
                <div class="iconFilter">
                    <img src="./icons/time.png" alt="">
                </div>
                <div class="filter_title">
                    <label for="country-option-1" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Départ le plus tôt
                    </label>
                </div>
                <div class="radio_btn">
                    <input id="country-option-1"  @click="plus_tot" type="radio" value="" name="filter" class="w-9 h-9 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" checked>
                </div>
            </div>

            <div class="filter_2 flex items-center py-4 w-full justify-around h-full">
                <div class="iconFilter">
                    <img src="./icons/Vector.png" alt="">
                </div>
                <div class="filter_title">
                    <label for="country-option-1" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Prix le plus bas
                    </label>
                </div>
                <div class="radio_btn">
                    <input id="country-option-1" @click="filter_prix" type="radio" value="" name="filter" class="w-9 h-9 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" >
                </div>
            </div>

            <div class="filter_3 flex items-center py-4 w-full justify-around h-full">
                <div class="iconFilter">
                    <img src="./icons/Vector-1.png" alt="">
                </div>
                <div class="filter_title">
                    <label for="country-option-1" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Cigarette autorisée
                    </label>
                </div>
                <div class="radio_btn">
                    <input id="country-option-1" @click="filter_Cigarette" type="radio" value="" name="filter" class="w-9 h-9 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" >
                </div>
            </div>


            <!-- pay -->
            <div class="pay w-[85%]"></div>

            <div class="filter_4 flex items-center py-4 w-full justify-around h-full">
                <div class="filter_title">
                    <label for="country-option-1" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        06 : 01  -  12 : 00
                    </label>
                </div>
                <div class="radio_btn">
                    <input @click="filter_time" id="country-option-1" type="radio" value="" name="filter" class="w-9 h-9 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" >
                </div>
            </div>

            <div class="filter_5 flex items-center py-4 w-full justify-around h-full">
                <div class="filter_title">
                    <label for="country-option-1" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        12 : 01  -  18 : 00
                    </label>
                </div>
                <div class="radio_btn">
                    <input id="country-option-1" type="radio" value="" name="filter" class="w-9 h-9 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" >
                </div>
            </div>

            <div class="filter_6 flex items-center py-4 w-full justify-around h-full">
                <div class="filter_title">
                    <label for="country-option-1" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        18 : 01  -  00 : 00
                    </label>
                </div>
                <div class="radio_btn">
                    <input id="country-option-1" type="radio" value="" name="filter" class="w-9 h-9 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" >
                </div>
            </div>

            <div class="filter_7 flex items-center py-4 w-full justify-around h-full">
                <div class="filter_title">
                    <label for="country-option-1" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        00 : 01  -  06 : 00
                    </label>
                </div>
                <div class="radio_btn">
                    <input id="country-option-1" type="radio" value="" name="filter" class="w-9 h-9 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" >
                </div>
            </div>



        </div>
</template>

<script>
export default {
    name: 'filter',
    data(){
        return{
            testFilter: '',
            trajets: this.backup,
            prix_Trajets: '',
            cigTrajets: '',
            time: '',
        }
    },
    methods: {
        plus_tot(){

            this.$store.commit('setTrajet', this.backup)
            
        },
        filter_prix(){

            this.trajets = Array.from(this.backup)
            this.prix_Trajets = this.trajets.sort((a, b) => a.prix - b.prix);

            console.log(this.trajets);
            console.log(this.trajets)
            this.$store.commit('setTrajet', this.prix_Trajets)
        },
        filter_Cigarette(){    
            this.trajets = [...this.backup]
            this.cigTrajets = this.trajets.filter(function (el) {return el.cigarette_autorisee == 1 })
            
            console.log(this.cigTrajets)
            this.$store.commit('setTrajet', this.cigTrajets)

        },
        filter_time(){

            this.trajets = this.backup
            this.time = this.trajets.filter(function (el) {


                // return el.heur_depart == '10:00'
                return Date.parse('01/01/2000 ' +el.heur_depart) >= Date.parse('01/01/2000 06:00') && Date.parse('01/01/2000 ' +el.heur_depart) < Date.parse('01/01/2000 12:00') 
            })
            console.log(this.time);
            this.$store.commit('setTrajet', this.time)
        }
    },
    computed: {
        trajets_info(){
            return this.$store.state.trajets
        },
        backup(){
            return this.$store.state.backup_trajets
        },
    }
}
</script> 

<style scoped>
    .pay{
        border-bottom: 1px solid black;
    }
</style>