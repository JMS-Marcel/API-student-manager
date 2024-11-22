<script setup lang="ts">
import axios from 'axios';
import { useRouter } from 'vue-router';
import { useSidebarStore } from '../../stores/sidebar';
import HeaderArea from '../components/Header/HeaderArea.vue';
import SidebarArea from '../components/Sidebar/SidebarArea.vue';

const { toggleSidebar } = useSidebarStore()
const sidebarStore = useSidebarStore()

const router = useRouter()
const role = localStorage.getItem("role")
const token = localStorage.getItem("token")


const logout = async () => {
  await axios.delete(`api/logout-${role}`, {
    headers: {
      Authorization: `Bearer ${token}`,
    }
  })
    .then((res) => {
      if (res.data.status === 200) {
        localStorage.removeItem('token')
        localStorage.removeItem('role')
        alert(res.data.message)
        router.push('/auth')
      }
    })
    .catch((error) => console.log(error))
}

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
          <slot></slot>
        </div>
      </main>
      <!-- Main end-->
    </div>
  </div>
</template>