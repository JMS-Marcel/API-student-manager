<script setup>
import DefaultLayout from '../Layout/DefaultLayout.vue';
import DataStatsOne from '../components/DataStats/DataStatsOne.vue';
import ChartOne from '../components/Charts/ChartOne.vue';
</script>

<template>
  <DefaultLayout>
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 xl:grid-cols-4 2xl:gap-7.5">
      <DataStatsOne />
    </div>
    <div class="mt-4 grid grid-cols-12 gap-4 md:mt-6 md:gap-6 2xl:mt-7.5 2xl:gap-7.5">
      <ChartOne/>
    </div>
  </DefaultLayout>
</template>