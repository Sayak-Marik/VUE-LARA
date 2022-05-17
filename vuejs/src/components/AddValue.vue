
<template>
  <div>
    <form @submit.prevent="submitForm">
      <div class="form-control">
        <label for="name">Name</label>
        <input type="text" id="name" v-model="name" />
        <label for="age">Age</label>
        <input type="number" id="age" v-model.number="age" />
        <label for="address">Address</label>
        <textarea id="address" rows="3" v-model="address"></textarea>
        </div>
    </form>
    <button @click="UpdateItem">Update</button>
  </div>
</template>

<script>
import axios from 'axios'

export default  {
   data() {
    return {
      name: "",
      age: "",
      address: "",
      formData: null,
      num:null
    };
   },
  methods: {
    
    async UpdateItem(){
      this.formData={
        name:this.name,
        age:this.age,
        address:this.address
      };
      console.log(this.formData);
      try {
        await axios
          .put(`http://127.0.0.1:8000/api/item/update/${this.num}`,this.formData)
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

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}

button{
  margin-block-end: 1rem;
  margin-right: 1rem;
}
.form-control {
  margin: 1rem 0;
}
</style>
