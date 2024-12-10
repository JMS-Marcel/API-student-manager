<script setup>
import { onMounted, ref } from 'vue'
import DefaultLayout from '../../Layout/DefaultLayout.vue';
import DefaultCard from '../DashboardForms/DefaultCard.vue';
import BreadcrumbDefault from '../Breadcrumbs/BreadcrumbDefault.vue';
import InputGroup from '../DashboardForms/InputGroup.vue';
import { useAppUrlStore } from '@/stores/appUrl'
import { useRoute } from 'vue-router';
import axios from 'axios';

const route = useRoute()

const data = ref({})

const userID = ref()

const { APP_URL } = useAppUrlStore()

const token = sessionStorage.getItem("token")

userID.value = route.params.id

// Champs du formulaire
const nom = ref('')
const prenom = ref('')
const email = ref('')
const date_naissance = ref('')
const password = ref('')
const password_confirmation = ref('')
const phone = ref('')
const matricule = ref('')        
const adresse = ref('') 

const errorMessage = ref()

const getStudentId = async () =>{
 await axios.get(`${APP_URL}/api/student/${userID.value}`)
    .then(res => data.value = res.data.student)
    .catch(error => {
      if (error.request.status === 404 && error.request.statusText === "Not Found") {
          errorMessage.value = `L'étudiant id : ${userID.value} n'existe pas 🙁` 
        }
    })
} 
onMounted(()=> getStudentId())  

const updateStudent = () =>{
  const payload = {
    nom: nom.value,
    prenom: prenom.value,
    email: email.value,
    date_naissance: date_naissance.value,
    password: password.value,
    password_confirmation: password_confirmation.value,
    phone: phone.value,
    matricule: matricule.value,
    adresse: adresse.value 

  }
  axios.put(`${APP_URL}/api/student/${userID.value}`, payload, {
    headers: {
      Authorization: `Bearer ${token}`,
    }
  })
    .then(res => (console.log(res.status)
    ))
    .catch(error => {
    console.log(error)
    errorMessage.value = error.request
  }
    )
}
const pageTitle = ref('Student')
</script>
<template>
  <DefaultLayout>
    <BreadcrumbDefault :pageTitle="pageTitle" />
    <div class="bg-danger" v-if="errorMessage">{{ errorMessage }}</div>
        <!-- ====== Form Layout Section Start -->
        <div class="grid">
      <div class="flex flex-col gap-9">
        <!-- Contact Form Start -->
        <DefaultCard cardTitle="Edit Student">
          <form @submit.prevent="updateStudent">
            <div class="p-6.5">
              <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                <InputGroup
                  v-model="nom"
                  label="First name"
                  type="text"
                  placeholder="Enter your first name"
                  customClasses="w-full xl:w-1/2"
                  :value="data.nom"
                  required
                  
                />

                <InputGroup
                v-model="prenom"
                  label="Last name"
                  type="text"
                  placeholder="Enter your last name"
                  customClasses="w-full xl:w-1/2"
                  :value="data.prenom"
                  required
                />
              </div>
              <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                <InputGroup
                v-model="matricule"
                  label="Matricule"
                  type="text"
                  placeholder="Enter Matricule"
                  customClasses="w-full xl:w-1/2"
                  :value="data.matricule"
                  required
                />

                <InputGroup
                  v-model="date_naissance"
                  label="Date de naissance"
                  type="text"
                  placeholder="Date de naissance"
                  customClasses="w-full xl:w-1/2"
                  :value="data.date_naissance"
                  required
                />
              </div>
              <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                <InputGroup
                v-model="email"
                label="Email"
                type="email"
                placeholder="Enter your email address"
                customClasses="w-full xl:w-1/2"
                :value="data.email"
                required
              />

              <InputGroup
                v-model="phone"
                label="Phone"
                type="text"
                placeholder="Enter your phone"
                customClasses="w-full xl:w-1/2"
                :value="data.phone"
                required
              />
              </div>
              
              <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                <InputGroup
                  v-model="password"
                  label="Password"
                  type="password"
                  placeholder="Enter password"
                  customClasses="w-full xl:w-1/2"
                  required
                />
                
                <InputGroup
                  v-model="adresse"
                  label="Adresse"
                  type="text"
                  placeholder="Enter adresse"
                  customClasses="w-full xl:w-1/2"
                  :value="data.adresse"
                  required
                />
              </div>
             
              <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                <InputGroup
                  v-model="password_confirmation"
                  label="Re-type Password"
                  type="password"
                  placeholder="Re-enter"
                  customClasses="w-full xl:w-1/2"
                  required
                />
              </div>
            


             

              <button
                type="submit"
                class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray hover:bg-opacity-90"
              >
                Send Message
              </button>
            </div>
          </form>
        </DefaultCard>
        <!-- Contact Form End -->
      </div>
    </div>
    <!-- ====== Form Layout Section End -->
  </DefaultLayout>

</template>