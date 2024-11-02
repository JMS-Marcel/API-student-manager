<template>

 <h1 class="text-3xl w-full m-auto">
    Admin List:
  </h1>
 <div>
  <ul >
    <li v-for="admin in admins" :key="admin.id" class="flex align-items-center justify-center">
      <div class="text-2xl bg-slate-300 p-4 m-4 w-96 rounded-xl">
        <h2>Nom: {{ admin.nom}}</h2>
        <h2>Prenom: {{ admin.prenom}}</h2>
        <h2>Telephone: {{ admin.phone}}</h2>
        <h2>Email: {{ admin.email }}</h2>
        <h2>Date de naissance: {{ admin.date_naissance }}</h2>

      </div>
      <br>
    </li>
  </ul>
 </div>
</template>

<script setup>
import axios from 'axios';
import { ref, onMounted } from 'vue';

const admins = ref([]);

const getAdmins = () => {
  axios.get("/api/admin")
  .then((res) => admins.value = res.data.admin)
  .catch((error) => console.error(error))
}
onMounted(() => getAdmins())
</script>


