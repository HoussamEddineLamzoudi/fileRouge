<template>
    <!-- review -->
    <div class="divide-y">
        
        <!-- review - start -->
        <div class="flex flex-col gap-3 py-4 md:py-8">
        <div>
            <!-- {{this.Review}} -->
            <!-- reviewer -->
            <span class="block text-sm font-bold">{{this.Review.userName}}</span>
            <!-- date -->
            <span class="block text-gray-500 text-sm">{{this.Review.published_at}}</span>
        </div>

        <!-- stars - start -->

        <div class="flex gap-0.5 -ml-1">
            <div v-for="n in Review.rating">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
            </div>

            <div v-for="n in 5-Review.rating">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-300" viewBox="0 0 20 20" fill="currentColor">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
            </div>
        </div>
        <!-- stars - end -->

        
        <!-- body -->
        <p class="text-gray-600">{{Review.body}}</p>
        </div>
        <!-- review - end -->

    </div>
</template>

<script>
export default {
    props:{
        Review: Object,
    }
}
</script>

<style>

</style>