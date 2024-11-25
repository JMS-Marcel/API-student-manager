<script setup>
import { ref } from 'vue'
import PageActionDefault from '../../Layout/PageActionDefault.vue';

const pageTitle = ref('Student View')
</script>
<template>
  <PageActionDefault :pageTitle="pageTitle">

        <h1>Student View</h1>

  </PageActionDefault>
</template>