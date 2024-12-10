<script setup>
import { ref } from 'vue'
import DefaultLayout from '../Layout/DefaultLayout.vue'
import SettingCard from '../components/SettingCard.vue'
import BreadcrumbDefault from '../components/Breadcrumbs/BreadcrumbDefault.vue'

const pageTitle = ref('Settings Page')
</script>

<template>
  <DefaultLayout>
    <div class="mx-auto max-w-242.5">
      <BreadcrumbDefault :pageTitle="pageTitle"/>

      <SettingCard/>
    </div>
  </DefaultLayout>

</template>