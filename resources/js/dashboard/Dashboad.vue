<script setup>
import DefaultLayout from '../Layout/DefaultLayout.vue';
import DataStatsOne from '../components/DataStats/DataStatsOne.vue';
</script>

<template>
  <DefaultLayout>
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 xl:grid-cols-4 2xl:gap-7.5">
      <DataStatsOne />
    </div>
  </DefaultLayout>
</template>