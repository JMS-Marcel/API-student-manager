<script setup lang="ts">
import { useSidebarStore } from '../../stores/sidebar';
import HeaderArea from '../components/Header/HeaderArea.vue';
import SidebarArea from '../components/Sidebar/SidebarArea.vue';

const { toggleSidebar } = useSidebarStore()
const sidebarStore = useSidebarStore()
const role = sessionStorage.getItem("role")
  

</script>
<template>
  <div class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <SidebarArea/>
    <!-- Sidebar end -->
    <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
      <HeaderArea />

      <!-- Main -->
      <main>
        <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
          <h1>{{role?.toUpperCase() + ' / DASHBOARD'}}</h1>
          <slot></slot>
        </div>
      </main>
      <!-- Main end-->
    </div>
  </div>
</template>