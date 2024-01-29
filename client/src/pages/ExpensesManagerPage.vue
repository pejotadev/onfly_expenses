<template>
  <q-layout>
    <q-page-container>
      <q-page>
        {{ expenses }}
        <expenses-table :expenses="expenses" @refresh="fetchExpenses"/>
      </q-page>
    </q-page-container>
  </q-layout>
</template>

<script>
import ExpensesTable from 'components/ExpensesTable.vue';
import { mapActions, mapState } from 'vuex';

export default {
  name: 'ExpensesManagerPage',

  components: {
    ExpensesTable
  },

  computed: {
    ...mapState('expensesModule', ['expenses'])
  },

  methods: {
    ...mapActions('expensesModule', ['fetchExpenses'])
  },

  mounted() {
    this.fetchExpenses();
  }
}
</script>
