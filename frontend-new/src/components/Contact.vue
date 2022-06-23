<template>
<div class="con mt-16">
    <h1>Contact Us</h1>
</div>

<div>
    <div class="w-full container flex">
        <div class="single_address">
            <i class="fa fa-map-marker"></i>
            <h4>Our Address</h4> 
            <p>3481 Melrose Place, Beverly Hills</p>
        </div>
        <div class="single_address">
            <i class="fa fa-envelope"></i>
            <h4>Send your message</h4>
            <p>Info@example.com</p>
        </div>
        <div class="single_address">
            <i class="fa fa-phone"></i>
            <h4>Call us on</h4>
            <p>(+1) 517 397 7100</p>
        </div>
        <div class="single_address">
            <i class="fa fa-clock"></i>
            <h4>Work Time</h4>
            <p>Mon - Fri: 08.00 - 16.00. <br>Sat: 10.00 - 14.00</p>
        </div>					
	</div>
</div>

<div class="register_container container_page w-full flex justify-center items-center">
    <!-- <div class=" flex w-1/2  h-[100vh] items-center justify-center">
            testestest<img src="../components/img/re.png" />
    </div> -->


    <!-- ------------------------------ -->


    
        <div class="bg-white py-6 sm:py-8 lg:py-12 w-1/2 mb-3">
        <div class=" px-4 md:px-8 mx-auto">
            <!-- text - start -->
            <div class="mb-10 md:mb-16">
            <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6"></h2>
            </div>
            <!-- text - end -->

            <!-- form - start -->
            <form 
                @submit.prevent="" 
                class="max-w-screen-md grid sm:grid-cols-2 gap-4 mx-auto"
            >
            <div>
                <label class="inline-block text-gray-800 text-sm sm:text-base mb-2">Prénom</label>
                <input type="text" name="prenom"   class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
            </div>

            <div>
                <label class="inline-block text-gray-800 text-sm sm:text-base mb-2">Nom</label>
                <input type="text" name="nom"  class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
            </div>

            <div class="sm:col-span-2">
                <label class="inline-block text-gray-800 text-sm sm:text-base mb-2">Email</label>
                <input type="email" name="email"  class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
            </div>

            <div class="sm:col-span-2">
                <label lass="inline-block text-gray-800 text-sm sm:text-base mb-2">Sujet</label>
                <input type="text" class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
            </div>

            <div class="sm:col-span-2 w-[100%]">
                <label for="message" class="message inline-block text-gray-800 text-sm sm:text-base mb-2">Votre Message</label>
                <textarea id="message" rows="10" class="w-full block p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a comment..." ></textarea>
            </div>
            
            </form>
            <!-- form - end -->
        </div>
        </div>


    
</div>

</template>




<style scoped>
h1{
    font-size: 44px;
    font-weight: 500;
    margin-top: 0;
    position: relative;
    text-transform: capitalize;
    margin-bottom: 15px;
    text-align: center;
    margin-bottom: 6%;
    color: #268ECE;
}
.single_address {
    overflow: hidden;
    margin-bottom: 10px;
    padding-left: 40px;
    width: 25%;
}

@media only screen and (max-width:768px) {
    .single_address {
        padding-left: 0px;
    }
}

.single_address i {
    background: #f6f6f6;
    color: #268ECE;
    border-radius: 30px;
    width: 60px;
    height: 60px;
    line-height: 60px;
    text-align: center;
    float: left;
    margin-right: 14px;
    font-size: 22px;
    -webkit-box-shadow: 0 5px 30px 0 rgba(0, 0, 0, 0.1);
    box-shadow: 0 5px 30px 0 rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    -webkit-transition: all 0.3s ease 0s;
    -o-transition: all 0.3s ease 0s;
    transition: all 0.3s ease 0s;
}

.single_address:hover i {
    background: #268ECE;
    color: #fff;
}

.single_address h4 {
    font-size: 18px;
    margin-bottom: 0px;
    overflow: hidden;
    font-weight: 600;
}

.single_address p {
    overflow: hidden;
    margin-top: 5px;
}
</style>