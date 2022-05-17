<template>
  <div>
    <!-- <h1> Form </h1> -->
    <form @submit.prevent="submitForm">
      <div class="form-control">
        <label for="name">Name</label>
        <input type="text" id="name" v-model="name" />
        <label for="age">Age</label>
        <input type="number" id="age" v-model.number="age" />
        <label for="address">Address</label>
        <textarea id="address" rows="3" v-model="address"></textarea>
        <button type="submit">Submit</button>
      </div>
    </form>
  </div>
</template>
<script>
import axios from "axios";

export default {
  emits: ["save-data"],
  data() {
    return {
      name: "",
      age: "",
      address: "",
      formData: null,
      item:null
    };
  },
  methods: {
    submitForm() {
      this.formData = {
        name: this.name,
        age: this.age,
        address: this.address,
      };
      //console.log(formData);
      this.mymethod();
      //console.log(this.name)
      this.$emit("save-data", this.formData);
    },
    async mymethod() {
      console.log(this.formData);
      try {
        await axios
          .post(`http://127.0.0.1:8000/api/item/store`, this.formData)
          .then((data) => {
            console.log(data);
          });
      } catch (e) {
        console.log(e);
      }
    },
   
   
  },
  // mounted() {
  //   console.log("hello");
  //   this.mymethod();
};
</script>

<style scoped>
.form-control {
  margin: 1rem 0;
}

label {
  font-family: "Times New Roman", Times, serif;
  font-weight: bold;
  display: block;
  margin-top: 1rem;
  margin-bottom: 0.5rem;
}

input[type="checkbox"] + label {
  font-weight: normal;
  display: inline;
  margin: 0 0 0 0.5rem;
}

input,
textarea {
  display: block;
  width: 100%;
  border: 1px solid #ccc;
  font: inherit;
}

button {
  margin-top: 1rem;
}
</style>