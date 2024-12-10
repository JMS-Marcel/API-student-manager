<script setup>
import { ref, computed } from 'vue'
import { useUserCurrentlyStore } from '../../stores/UserCurrently'

const UserCurrently = useUserCurrentlyStore()


computed(() => UserCurrently.getUserCurrently())

const hidden = ref(false)

const hiddenBox = () =>{
  hidden.value = !hidden.value
}

setTimeout(() => {
  hidden.value = true
}, 8000);

</script>
<template>
  <div
    class="flex justify-between rounded-md border border-stroke bg-white py-4 px-7.5 mb-6 shadow-default dark:border-strokedark dark:bg-boxdark"
    :class="{'hidden':hidden}">
    <div>
      <h1 class="text-title-md font-bold text-black dark:text-white">Welcome Back, {{ UserCurrently.data.nom+ ' ' +UserCurrently.data.prenom }}</h1>
      <p class="text-sm font-medium">Have a Goood day at work</p>
    </div>
    <button @click="hiddenBox">x</button>
  </div>
</template>