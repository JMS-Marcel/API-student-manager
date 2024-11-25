<script setup>
import { ref } from 'vue'
import PageActionDefault from '../../Layout/PageActionDefault.vue';

const pageTitle = ref('Cours List')
</script>
<template>
  <PageActionDefault :pageTitle="pageTitle">
        <h1>Cours list</h1>
  </PageActionDefault>
</template>