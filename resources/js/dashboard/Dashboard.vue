<script setup lang="ts">
import axios from 'axios';
import { useRouter } from 'vue-router';
import { useSidebarStore } from '../../stores/sidebar';
import HeaderArea from '../components/Header/HeaderArea.vue';

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
  <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
    <HeaderArea />
    <!-- Sidebar -->

    <!-- Sidebar end -->

    <!-- Main -->
    <main>
      <slot></slot>
    </main>
    <!-- Main end-->
  </div>
</template>