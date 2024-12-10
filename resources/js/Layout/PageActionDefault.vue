<script setup>
import BreadcrumbDefault from '../components/Breadcrumbs/BreadcrumbDefault.vue';
import DefaultLayout from '../Layout/DefaultLayout.vue';
const props = defineProps(['pageTitle'])

const pageTitle = props.pageTitle
</script>
<template>
 
  <DefaultLayout>
    <div class="mx-auto max-w-242.5">
      <BreadcrumbDefault :pageTitle="pageTitle"/>
    </div>
    <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
      <slot></slot>
    </div>
  </DefaultLayout>

</template>