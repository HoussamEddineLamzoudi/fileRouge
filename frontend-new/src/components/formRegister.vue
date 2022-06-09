<template>

    
        <div class="bg-white py-6 sm:py-8 lg:py-12 w-1/2">
        <div class=" px-4 md:px-8 mx-auto">
            <!-- text - start -->
            <div class="mb-10 md:mb-16">
            <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">Chauffeur</h2>
            </div>
            <!-- text - end -->

            <!-- form - start -->
            <form class="max-w-screen-md grid sm:grid-cols-2 gap-4 mx-auto">
            <div>
                <label for="first-name" class="inline-block text-gray-800 text-sm sm:text-base mb-2">Prénom*</label>
                <input type="text" name="prenom" class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
            </div>

            <div>
                <label for="last-name" class="inline-block text-gray-800 text-sm sm:text-base mb-2">Nom*</label>
                <input type="text" name="nom" class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
            </div>

            <div class="sm:col-span-2">
                <label for="company" class="inline-block text-gray-800 text-sm sm:text-base mb-2">Email*</label>
                <input type="email" name="email" class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
            </div>

            <div class="sm:col-span-2">
                <label for="email" class="inline-block text-gray-800 text-sm sm:text-base mb-2">Mot de passe*</label>
                <input type="password" name="password" class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
            </div>

            <div class="sm:col-span-2">
                <label for="subject" class="inline-block text-gray-800 text-sm sm:text-base mb-2">Numero du telephone*</label>
                <input type="text" name="numTel" class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
            </div>

            <div class="sm:col-span-2">
                <label for="subject" class="inline-block text-gray-800 text-sm sm:text-base mb-2">Numero whatsapp*</label>
                <input type="text" name="numWhatsapp" class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
            </div>

            <div>
                <input type="hidden" name="hasCar" value="true"/>
            </div>

            

            <div class="sm:col-span-2 flex justify-between items-center">
                <button class="inline-block bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700 focus-visible:ring ring-indigo-300 text-white text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">Send</button>
            </div>

            
            </form>
            <!-- form - end -->
        </div>
        </div>

</template>

<script>

</script>

<style>

</style>