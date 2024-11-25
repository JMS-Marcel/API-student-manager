<script setup>
import { ref } from 'vue';
import PageActionDefault from '../../Layout/PageActionDefault.vue';

const pageTitle = ref('Teacher View')
</script>
<template>
  <PageActionDefault :pageTitle="pageTitle">
        <h1>Teacher View</h1>
  </PageActionDefault>
</template>