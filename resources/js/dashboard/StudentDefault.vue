<script setup>
import { ref } from 'vue';
import BreadcrumbDefault from '../components/Breadcrumbs/BreadcrumbDefault.vue';
import DefaultLayout from '../Layout/DefaultLayout.vue';

const pageTitle = ref('Student')
</script>
<template>
 
  <DefaultLayout>
    <div class="mx-auto max-w-242.5">
      <BreadcrumbDefault :pageTitle="pageTitle"/>
    </div>
    <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
      <slot name="student"></slot>
    </div>
  </DefaultLayout>

</template>