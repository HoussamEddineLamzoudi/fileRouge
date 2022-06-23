<template>

    <div>

        <div class="lofin_item">
            <div class="bg-white py-6 sm:py-8 lg:py-12">
                <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
                    <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-8">Login</h2>

                    <form @submit.prevent="login_user" class="max-w-lg border rounded-lg mx-auto">
                        <div class="flex flex-col gap-4 p-4 md:p-8">

                            <div>
                                <label for="email"
                                    class="inline-block text-gray-800 text-sm sm:text-base mb-2">User</label>
                                <input name="email" />
                                <select name="" v-model="login_info.user"
                                    class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2">
                                    <option disabled value="">Choisissez votre profil</option>
                                    <option value="chauffeur">Chauffeur</option>
                                    <option value="passager">Passager</option>
                                </select>
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ errors.user_err }}</p>
                            </div>

                            <div>
                                <label for="email"
                                    class="inline-block text-gray-800 text-sm sm:text-base mb-2">Email</label>
                                <input name="email" type="email" v-model="login_info.email"
                                    class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ errors.email_err }}</p>
                            </div>

                            <div>
                                <label for="password"
                                    class="inline-block text-gray-800 text-sm sm:text-base mb-2">Mot de
                                    passe</label>
                                <input name="password" type="password" v-model="login_info.password"
                                    class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ errors.password_err }}
                                </p>
                            </div>

                            <!-- <button class="block bg-gray-800 hover:bg-gray-700 active:bg-gray-600 focus-visible:ring ring-gray-300 text-white text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">Log in</button> -->

                            <div class="mt-7 col-span-2 w-full bt flex justify-center">
                                <Button :text="button_text" />
                            </div>


                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>


</template>

<script>
import Button from '../components/button.vue'
// import store from "../store/index"

export default {
    name: 'login_component',
    props: {
        isVisible: Boolean,
    },
    components: {
        Button,
    },
    data() {
        return {
            button_text: 'Conection',

            login_info: {

                user: '',
                email: '',
                password: '',
            },

            errors: {

                email_err: '',
                password_err: '',
                user_err: '',
            }
        }
    },
    methods: {
        emitCancel() {
            this.$emit('cancel');
        },
        emitConfirm() {
            this.$emit('confirm');
        },
        login_user() {
            if (this.login_info.user == 'chauffeur') {

                // console.log(this.login_info.user)
                // this.errors.user_err = ''
                console.log(this.login_info);

                fetch('http://localhost/my_php/fileRouge/backend/chauffeur/login_chauffeur', {
                    method: "POST",
                    body: JSON.stringify(this.login_info)
                })
                    .then((response) => response.json())
                    .then((res) => {
                        // console.log('res')

                        if (res.login_seccess == true) {

                            console.log(res)
                            this.$store.commit("setUser", res);

                            // this.$router.next()
                            this.$router.back()

                        } else {

                            this.errors.password_err = res.password_err
                            this.errors.email_err = res.email_err
                        }
                    })
            } else if (this.login_info.user == 'passager') {

                console.log(this.login_info.user)
                this.errors.user_err = ''

                fetch('http://localhost/my_php/fileRouge/backend/passager/login_passager', {
                    method: "POST",
                    body: JSON.stringify(this.login_info)
                })
                    .then((response) => response.json())
                    .then((res) => {
                        // console.log(res)

                        if (res.login_seccess == true) {

                            
                            this.$store.commit("setUser", res);
                            this.$store.commit("setVisibility", false)

                            this.$router.push('/')

                            this.errors.password_err = res.password_err
                            this.errors.email_err = res.email_err
                        }
                    })
            } else {
                this.errors.user_err = 'merci de Choisissez votre profil ( chauffeur / passager )'
            }


        }
    },
    // mounted: {

    // }
}

</script>

<style>
</style>