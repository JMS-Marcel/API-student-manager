<script setup>
const role = localStorage.getItem("role")

</script>
<template>
  <!-- Need authentification -->
  <div class="w-full h-screen bg-slate-900">
    <h1 class="text-5xl text-white text-center border border-b-gray-400">DASHBOARD</h1>
    <p class="text-center text-white p-4">Welcome! <span class="text-xl text-pink-500 shadow-lg-violet-500 ">{{ role }}</span></p>
  </div>
</template>