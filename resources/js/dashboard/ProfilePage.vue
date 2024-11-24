<script setup>
import { ref } from 'vue'
import DefaultLayout from '../Layout/DefaultLayout.vue'
import ProfileCard from '../components/ProfileCard.vue'

const pageTitle = ref('Profile')
</script>

<template>
  <DefaultLayout>
    <div class="mx-auto max-w-242.5">
      <BreadcrumbDefault :pageTitle="pageTitle"/>

      <ProfileCard/>
    </div>
  </DefaultLayout>

</template>