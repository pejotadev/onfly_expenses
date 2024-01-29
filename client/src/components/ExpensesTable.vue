<template>
  <q-table
    :rows="expenses"
    :columns="columns"
    row-key="id"
  >
    <template v-slot:top>
      <q-btn color="primary" label="Adicionar" to="/expenses/create" />
    </template>

    <template v-slot:body="props">
      <q-tr :props="props">
        <q-td key="id" :props="props">{{ props.row.id }}</q-td>
        <q-td key="date" :props="props">{{ props.row.date }}</q-td>
        <q-td key="value" :props="props">{{ props.row.value }}</q-td>
        <q-td key="description" :props="props">{{ props.row.description }}</q-td>
        <q-td key="type" :props="props">{{ props.row.type }}</q-td>
        <q-td key="actions" :props="props">
          <q-btn-group flat>
            <q-btn
              class="text-primary q-ml-sm q-mr-sm"
              icon="edit"
              :to="`/expenses/${props.row.id}`"
            />
            <q-btn
              class="text-negative"
              icon="delete"
              @click="deleteExpense(props.row.id)"
            />
          </q-btn-group>
        </q-td>
      </q-tr>
    </template>
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
        { name: 'id', label: 'ID', field: 'id', sortable: true },
        { name: 'date', label: 'Data', field: 'date', sortable: true },
        { name: 'value', label: 'Valor', field: 'value', sortable: true },
        { name: 'description', label: 'Descrição', field: 'description', sortable: true },
        { name: 'type', label: 'Tipo', field: 'type', sortable: true },
        {
          name: 'actions',
          label: 'Ações',
          format: (val, row) => {
            return [
              { icon: 'edit', label: 'Editar', to: `/expenses/${row.id}/edit` },
              { icon: 'delete', label: 'Excluir', to: `/expenses/${row.id}/delete` }
            ]
          },
          sortable: false,
          align: 'center',
          style: 'width: 100px'
        }

      ]
    };
  },
  methods: {
    deleteExpense(id) {
      const validation = confirm('Are you sure you want to delete this expense?')

      if(validation){
        this.$store.dispatch('expensesModule/deleteExpense', id);
      }

    }
  }
}
</script>
