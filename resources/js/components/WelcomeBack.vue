<script setup>
import { computed } from 'vue'
import { useUserCurrentlyStore } from '../../stores/UserCurrently'

const UserCurrently = useUserCurrentlyStore()


computed(() => UserCurrently.getUserCurrently())

</script>
<template>
  <div
    class="rounded-md border border-stroke bg-white py-4 px-7.5 mb-6 shadow-default dark:border-strokedark dark:bg-boxdark">
    <h1 class="text-title-md font-bold text-black dark:text-white">Welcome Back, {{ UserCurrently.data.nom+ ' ' +UserCurrently.data.prenom }}</h1>
    <p class="text-sm font-medium">Have a Goood day at work</p>
  </div>
</template>