<script setup>
import { ref } from 'vue'
import PageActionDefault from '../../Layout/PageActionDefault.vue';

const pageTitle = ref('Student Edit')
</script>
<template>
  <PageActionDefault :pageTitle="pageTitle">
        <h1>Student Edit</h1>
  </PageActionDefault>
</template>