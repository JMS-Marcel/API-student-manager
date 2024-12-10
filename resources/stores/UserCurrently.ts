import axios from 'axios'
import { ref } from 'vue'
import { defineStore } from 'pinia'
import { useAppUrlStore } from '@/stores/appUrl'
//Get User Currently

export const useUserCurrentlyStore = defineStore("UserCurrently",()=>{
  const { APP_URL } = useAppUrlStore()

  const data = ref({
    "nom": '',
    "prenom": ''
  })
  
  const token = sessionStorage.getItem("token")

  const getUserCurrently = async () =>{
    await axios.get(`${APP_URL}/api/user`, {
    headers:{
      Authorization: `Bearer ${token}`
    }
  })
  .then((res) => {
     return data.value = res.data
    
  })
  .catch((error) => console.error(error))
  }
 

  return {data, getUserCurrently}
})