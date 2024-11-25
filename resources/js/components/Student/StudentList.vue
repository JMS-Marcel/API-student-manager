<script setup>
import { ref } from 'vue'
import PageActionDefault from '../../Layout/PageActionDefault.vue';

const pageTitle = ref('Student List')
</script>
<template>
  <PageActionDefault :pageTitle="pageTitle">
        <h1>Student list</h1>
  </PageActionDefault>
</template>