<template>  
    <div>
        <Reviews />
    </div>
</template>

<script>
import { computed } from 'vue'
import Reviews from '../components/Reviews.vue'

export default {
    name: 'add_reviews',
    components: {
        Reviews,
    },
    
}
</script>