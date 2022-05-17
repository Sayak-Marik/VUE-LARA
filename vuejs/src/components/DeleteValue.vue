<template>
    <div>
        <button @click="DeleteValue">Remove</button>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    data(){
       return{
           num:null
       } ;
    },
    methods: {
    async DeleteValue(){
      console.log(this.formData);
      try {
        await axios
          .delete(`http://127.0.0.1:8000/api/item/delete/${this.num}`)
          .then((data) => {
            console.log(data);
          });
      } catch (e) {
        console.log(e);
      }
    },
  
} 
}
</script>