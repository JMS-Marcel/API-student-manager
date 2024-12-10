<script setup>
import { onMounted, ref } from 'vue'
import PageActionDefault from '../../Layout/PageActionDefault.vue';
import { useRoute } from 'vue-router';
import axios from 'axios';
import { useAppUrlStore } from '../../../stores/appUrl';


const route = useRoute()

const data = ref({})

const { APP_URL } = useAppUrlStore()

const userID = ref()

const errorMessages = ref()

userID.value = route.params.id

const getUserID = async () => {

 await axios.get(`${APP_URL}/api/student/${userID.value}`)
    .then(res =>data.value = res.data.student)
    .catch((error)=>{
      if (error.request.status === 404 && error.request.statusText === "Not Found") {
        errorMessages.value = `L'étudiant id : ${userID.value} n'existe pas 🙁` 
      }       
    })
}
onMounted(()=> getUserID())


const pageTitle = ref('Student View')
</script>
<template>
  <PageActionDefault :pageTitle="pageTitle">
      <div class="bg-danger text-3xl text-white text-center m-3" v-if="errorMessages">{{ errorMessages }}</div>

      <div v-if="!errorMessages">
          <h1 >Student View {{ $route.params.id }}</h1>
          <p class="text-white">Matricule : {{ data.matricule }}</p>
          {{ data.nom + " "+data.prenom  }}
        </div>

  </PageActionDefault>
</template>