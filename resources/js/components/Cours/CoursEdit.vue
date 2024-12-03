<script setup>
import { ref } from 'vue'
import DefaultLayout from '../../Layout/DefaultLayout.vue';
import DefaultCard from '../DashboardForms/DefaultCard.vue';
import BreadcrumbDefault from '../Breadcrumbs/BreadcrumbDefault.vue';
import InputGroup from '../DashboardForms/InputGroup.vue';



const pageTitle = ref('Form Layout')
</script>
<template>
  <DefaultLayout>
    <BreadcrumbDefault :pageTitle="pageTitle" />
        <!-- ====== Form Layout Section Start -->
        <div class="grid">
      <div class="flex flex-col gap-9">
        <!-- Contact Form Start -->
        <DefaultCard cardTitle="Contact Form">
          <form action="#">
            <div class="p-6.5">
              <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                <InputGroup
                  label="Nom"
                  type="text"
                  placeholder="Enter your first name"
                  customClasses="w-full xl:w-1/2"
                  required
                />

                <InputGroup
                  label="Description"
                  type="text"
                  placeholder="Enter your last name"
                  customClasses="w-full xl:w-1/2"
                  required
                />
              </div>

              <button
                class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray hover:bg-opacity-90"
              >
                Edit
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