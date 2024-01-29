
<!-- src/pages/LoginPage.vue -->

<template>
  <h1>
    Home Page
  </h1>
</template>

<script>
import { defineComponent, ref } from 'vue';
import axiosInstance from 'src/axios.js';
import { useRouter } from 'vue-router';
import expensesTable from 'src/components/ExpensesTable.vue';

export default defineComponent({
  name: 'HomePage',
  setup() {

    return {  };
  },
});
</script>

<style scoped>
/* Estilização adicional, se necessário */
</style>
