<template>
    <div>
        <button  class="ttest inline-block bg-s_ry hover:bg-p_ry active:bg-primary focus-visible:ring ring-indigo-300 text-white text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">{{text}}</button>
    </div>
</template>

<script>


export default {
props: {
    text: String,
},
}
</script>

<style>

</style>
