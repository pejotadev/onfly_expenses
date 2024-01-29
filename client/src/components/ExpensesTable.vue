<template>
  <q-table
    :rows="expenses"
    :columns="columns"
    row-key="id"
  >
  </q-table>

</template>

<script>
export default {
  name: 'ExpensesTable',
  props: {
    expenses: Array
  },
  data() {
    return {
      columns: [
        "type",
        "value",
        "description",
        "date",
        "created_at",
        "updated_at"
      ]
    };
  }
}
</script>
