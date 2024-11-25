<script setup>
import { ref } from 'vue'
import PageActionDefault from '../../Layout/PageActionDefault.vue';

const pageTitle = ref('Student Add')
</script>
<template>
  <PageActionDefault :pageTitle="pageTitle">
        <h1>Student ADD</h1>
  </PageActionDefault>
</template>