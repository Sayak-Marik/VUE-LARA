<template>
<div>
  <br><br>
  <view-table></view-table>
</div>
</template>

<script>
//import AddValue from './components/AddValue.vue';
//import FormTwo from './components/FormTwo.vue';
import ViewTable from './components/ViewTable.vue';
export default {
  name: 'App',
  components: {
    //FormTwo,
    ViewTable
},
  
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
