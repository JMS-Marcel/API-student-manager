<script setup>
import { ref } from 'vue'
import PageActionDefault from '../../Layout/PageActionDefault.vue';

const pageTitle = ref('Teacher List')
</script>
<template>
  <PageActionDefault :pageTitle="pageTitle">
        <h1>teacher list</h1>
  </PageActionDefault>
</template>