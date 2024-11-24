import axios from 'axios'
import { ref } from 'vue'
import { defineStore } from 'pinia'
//Get User Currently

export const useUserCurrentlyStore = defineStore("UserCurrently",()=>{
  const data = ref({})
  
  const token = sessionStorage.getItem("token")

  const getUserCurrently = async () =>{
    await axios.get('api/user', {
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