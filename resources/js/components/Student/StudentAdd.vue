<script setup>
import { ref } from 'vue'
import DefaultLayout from '../../Layout/DefaultLayout.vue';
import DefaultCard from '../DashboardForms/DefaultCard.vue';
import BreadcrumbDefault from '../Breadcrumbs/BreadcrumbDefault.vue';
import InputGroup from '../DashboardForms/InputGroup.vue';
import { useAppUrlStore } from '@/stores/appUrl'

const { APP_URL } = useAppUrlStore()

const token = sessionStorage.getItem("token")

const errorMessage = ref()

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

console.log(nom.value);


const pageTitle = ref('Student')
</script>
<template>
  <DefaultLayout>
    <BreadcrumbDefault :pageTitle="pageTitle" />
        <!-- ====== Form Layout Section Start -->
        <div class="grid">
      <div class="flex flex-col gap-9">
        <!-- Contact Form Start -->
        <DefaultCard cardTitle="Add Student">
          <form @submit.prevent="addStudent">
            <div class="p-6.5">
              <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                <InputGroup
                  v-model="nom"
                  label="First name"
                  type="text"
                  placeholder="Enter your first name"
                  customClasses="w-full xl:w-1/2"
                  required
                />

                <InputGroup
                  label="Last name"
                  type="text"
                  placeholder="Enter your last name"
                  customClasses="w-full xl:w-1/2"
                  v-model="prenom"
                  required
                />
              </div>
              <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                <InputGroup
                  label="Matricule"
                  type="text"
                  placeholder="Enter Matricule"
                  customClasses="w-full xl:w-1/2"
                  v-model="matricule"
                  required
                />

                <InputGroup
                  label="Date de naissance"
                  type="text"
                  placeholder="Date de naissance"
                  customClasses="w-full xl:w-1/2"
                  v-model="date_naissance"
                  required
                />
              </div>
              <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                <InputGroup
                label="Email"
                type="email"
                placeholder="Enter your email address"
                customClasses="w-full xl:w-1/2"
                v-model="email"
                required
              />

              <InputGroup
                label="Phone"
                type="text"
                placeholder="Enter your phone"
                customClasses="w-full xl:w-1/2"
                v-model="phone"
                required
              />
              </div>
              
              <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                <InputGroup
                  label="Password"
                  type="password"
                  placeholder="Enter password"
                  customClasses="w-full xl:w-1/2"
                  v-model="password"
                  required
                />
                
                <InputGroup
                  label="Adresse"
                  type="text"
                  placeholder="Enter adresse"
                  customClasses="w-full xl:w-1/2"
                  v-model="adresse"
                  required
                />
              </div>
             
              <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                <InputGroup
                  label="Re-type Password"
                  type="password"
                  placeholder="Re-enter"
                  customClasses="w-full xl:w-1/2"
                  v-model="password_confirmation"
                  required
                />
              </div>
            


             

              <button
                type="submit"
                class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray hover:bg-opacity-90"
              >
                Add Student
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