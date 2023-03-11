<script setup>
import ComponentTest from '@/Components/Shared/ComponentTest.vue';
import Pagination from '@/Components/Shared/Pagination.vue';
import { createStore } from 'vuex'
</script>
  
<template>
    <Pagination />
    <ComponentTest>Your Profile</ComponentTest>
    <a @click="increment"> Clique </a>
</template>

<script>
const store = createStore({
    state() {
        return {
            count: 55
        }
    },
    mutations: {
        increment(state) {
            state.count++
        }
    },
    actions: {
        increment(context) {
            context.commit('increment')
        }
    }

})
store.commit('increment')

</script>