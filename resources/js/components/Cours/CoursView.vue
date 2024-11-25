<script setup>
import { ref } from 'vue';
import PageActionDefault from '../../Layout/PageActionDefault.vue';

const pageTitle = ref('Cours View')
</script>
<template>
  <PageActionDefault :pageTitle="pageTitle">
        <h1>Cours View</h1>
  </PageActionDefault>
</template>