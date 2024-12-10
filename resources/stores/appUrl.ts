import { defineStore } from "pinia";
import { ref } from "vue";
import { useBrowserLocation } from '@vueuse/core';

export const useAppUrlStore = defineStore("APP_URL", () => {
  const APP_URL = ref({})
  const urlLocation = ref()
  
  urlLocation.value = useBrowserLocation()

  APP_URL.value = urlLocation.value.value.origin

  return {APP_URL}
})