<script setup>
import DefaultLayout from '../Layout/DefaultLayout.vue';
import DataStatsOne from '../components/DataStats/DataStatsOne.vue';
import ChartOne from '../components/Charts/ChartOne.vue';
import ChartTwo from '../components/Charts/ChartTwo.vue';
import WelcomeBack from '../components/WelcomeBack.vue';
</script>

<template>
  <DefaultLayout>
    <WelcomeBack />
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 xl:grid-cols-4 2xl:gap-7.5">
      <DataStatsOne />
    </div>
    <div class="mt-4 grid grid-cols-12 gap-4 md:mt-6 md:gap-6 2xl:mt-7.5 2xl:gap-7.5">
      <ChartOne/>

      <ChartTwo/>
    </div>
  </DefaultLayout>
</template>