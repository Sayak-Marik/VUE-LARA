<template>
    <div id='myapp'>
      <button @click="showModalAdd = true">Add data</button>

  <table border='3' width='80%' style='border-collapse: collapse;'>
    <tr>
      <th>Name</th>
      <th>Age</th>
      <th>Address</th>
      <th>Actions</th>
    </tr>
     <tr v-for="item in response" :key="item.id" :num="item.id">
                       <td>{{ item.name }} </td>
                       <td>{{ item.age }}</td>
                       <td>{{ item.address }}</td>
                       <td><button @click="showModalDelete = true">Delete</button>
                          <button @click="showModalUpdate = true">Update</button></td>
                       </tr>
  </table>
  <div class="overlay" v-if="showModalAdd" @click="showModalAdd = false"></div>
  <div class="overlay" v-if="showModalDelete" @click="showModalDelete = false"></div>
  <div class="overlay" v-if="showModalUpdate" @click="showModalUpdate = false"></div>

  <!-- modal -->
  <div class="modal" v-if="showModalAdd">
  <form-two></form-two>
    <button class="close" @click="showModalAdd = false">x</button>
  </div>
  <div class="overlay" v-if="showModalAdd" @click="showModalAdd = false"></div>

  <!-- modal -->
  <div class="modal" v-if="showModalDelete">
  <delete-value></delete-value>
    <button class="close" @click="showModalDelete = false">x</button>
  </div>
  <div class="overlay" v-if="showModalDelete" @click="showModalDelete = false"></div>
  
  <!-- modal -->
  <div class="modal" v-if="showModalUpdate">
    <button class="close" @click="showModalUpdate = false">x</button>
    <add-value></add-value>
  </div>
  <div class="overlay" v-if="showModalUpdate" @click="showModalUpdate = false"></div>
  
</div>
</template>

<script>
import DeleteValue from './DeleteValue.vue';
import AddValue from './AddValue.vue';
import FormTwo from './FormTwo.vue';
import axios from 'axios';
export default {
     data(){
        return{
           count:0,
           response:[],
           showModalDelete: false,
           showModalUpdate:false,
           showModalAdd:false
        };
     },
    // props:[this.item.id],
     components:{
       DeleteValue,
       AddValue,
       FormTwo
     },
  mounted(){
        axios.get(`http://127.0.0.1:8000/api/items`)
        .then(res=>{
            console.log('response:'+res.data);
            this.response = res.data;
                console.log(this.response);    
        }).catch(
            err => {
                console.log('error: ' + err);
            }
        )
    }
        
    }
</script>

<style scoped>
.modal-vue .overlay {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, .5);
}

.modal-vue .modal {
  position: relative;
  width: 300px;
  z-index: 9999;
  margin: 0 auto;
  padding: 20px 30px;
  background-color: #fff;
}

.modal-vue .close{
  position: absolute;
  top: 10px;
  right: 10px;
}

button{
  margin: 1rem;
  padding: 0.1rem;
}
</style>