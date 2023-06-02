<template>
    <p>Hello World</p>
</template>

<script setup>
import {usePiniaStore} from "../store";
import {ref, onMounted} from "vue"

const store = usePiniaStore()

onMounted(() => {
    console.log(store.supplier)
})

</script>

<style scoped>

</style>
