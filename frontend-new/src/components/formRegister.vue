<template>

    
        <div class="bg-white py-6 sm:py-8 lg:py-12 w-1/2">
        <div class=" px-4 md:px-8 mx-auto">
            <!-- text - start -->
            <div class="mb-10 md:mb-16">
            <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">{{user}}</h2>
            </div>
            <!-- text - end -->

            <!-- form - start -->
            <form 
                @submit.prevent="register_user" 
                class="max-w-screen-md grid sm:grid-cols-2 gap-4 mx-auto"
            >
            <div>
                <label for="first-name" class="inline-block text-gray-800 text-sm sm:text-base mb-2">Prénom*</label>
                <input type="text" name="prenom" v-model="register_info.prenom"  class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{errors.prenom_err}}</p>
            </div>

            <div>
                <label for="last-name" class="inline-block text-gray-800 text-sm sm:text-base mb-2">Nom*</label>
                <input type="text" name="nom" v-model="register_info.nom" class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{errors.nom_err}}</p>
            </div>

            <div class="sm:col-span-2">
                <label for="company" class="inline-block text-gray-800 text-sm sm:text-base mb-2">Email*</label>
                <input type="email" name="email" v-model="register_info.email" class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{errors.email_err}}</p>
            </div>

            <div class="sm:col-span-2">
                <label for="email" class="inline-block text-gray-800 text-sm sm:text-base mb-2">Mot de passe*</label>
                <input type="password" name="password" v-model="register_info.password" class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{errors.password_err}}</p>
            </div>

            <div class="sm:col-span-2">
                <label for="subject" class="inline-block text-gray-800 text-sm sm:text-base mb-2">Numero du telephone*</label>
                <input type="text" name="numTel" v-model="register_info.numTel" class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{errors.numTel_err}}</p>
            </div>

            <div class="sm:col-span-2">
                <label for="subject" class="inline-block text-gray-800 text-sm sm:text-base mb-2">Numero whatsapp*</label>
                <input type="text" name="numWhatsapp" v-model="register_info.numWhatsapp" class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{errors.numWhatsapp_err}}</p>
            </div>

            <!-- <div>
                <input type="hidden" name="hasCar" :value="hasCar"/>
            </div> -->


            <div class="mt-7 col-span-2 w-full bt flex justify-center">
                <Button :text="button_text" />
            </div>

            
            </form>
            <!-- form - end -->
        </div>
        </div>

</template>

<script>
import { URLAPI } from '../utils/constants';
import Button from './button.vue';


export default {
    name: "formRegister",
    components: {
        Button

    },
    data() {
        return{
            button_text: "S'inscrire",

            register_info: {
                prenom: '',
                nom: '',
                email: '',
                password: '',
                numTel: '',
                numWhatsapp: '',
                hasCar: this.hasCar,
            },
            
            errors: {

                prenom_err: '',
                nom_err: '',
                email_err: '',
                password_err: '',
                numTel_err: '',
                numWhatsapp_err: '',
            }
        };
    },
    props: {
    user: String,
    hasCar: String,
    },
    methods: {
        register_user(){
            // console.log(this.register_info)

            if(this.hasCar == "true"){
                let user = '66chauffeur'
                console.log(user)

                fetch(`http://localhost/my_php/fileRouge/backend/chauffeur/register_chauffeur`,{
                method: "POST",
                body: JSON.stringify(this.register_info)
                })
                .then((response) => response.json())
                .then((res) => {
                    if(res.regester_seccess == true){
                        
                        // console.log(res)
                        // alert('regester is seccess ^-^, hi dear ')
                        this.$router.push('/')
                        
                    }else{
                        this.errors.prenom_err = res.prenom_err
                        this.errors.nom_err = res.nom_err
                        this.errors.password_err = res.password_err
                        this.errors.email_err = res.email_err
                        this.errors.numTel_err = res.numTel_err
                        this.errors.numWhatsapp_err = res.numWhatsapp_err
                    }
            })
            } else{
                let user = '66passager'
                console.log(user)

                fetch(`http://localhost/my_php/fileRouge/backend/passager/register_passager`,{
                method: "POST",
                body: JSON.stringify(this.register_info)
                })
                .then((response) => response.json())
                .then((res) => {
                    if(res.regester_seccess == true){
                        
                        // console.log(res)
                        // alert('regester is seccess ^-^, hi dear ')
                        this.$router.push('/')
                        
                    }else{
                        this.errors.prenom_err = res.prenom_err
                        this.errors.nom_err = res.nom_err
                        this.errors.password_err = res.password_err
                        this.errors.email_err = res.email_err
                        this.errors.numTel_err = res.numTel_err
                        this.errors.numWhatsapp_err = res.numWhatsapp_err
                    }
            })
            }
            
        }
        // async register_user (){
        //     // console.log(this.register_info)

        //     let res = await fetch('http://localhost/my_php/fileRouge/backend/chauffeur/register_chauffeur',{
        //         method: "POST",
        //         body: JSON.stringify(this.register_info)
        //     })
        //     let json = await res.json()
        //     if(json){
        //         console.log("ok");
        //     }
        // }
    }

}

</script>

<style>

</style>