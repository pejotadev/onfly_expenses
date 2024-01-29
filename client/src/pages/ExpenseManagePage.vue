<template>
  <q-page padding>
    <q-form @submit="onSubmit" @reset="onReset" class="q-gutter-md">

      <div class="row">
        <div>
          <q-date
            v-model="form.date"
            label="Date"
            :rules="[val => !!val || 'Date is required']"
          />
        </div>

        <div class="col q-pa-sm">
          <q-input
            v-model="form.description"
            label="Description"
            :rules="[val => !!val || 'Description is required']"
          />

          <q-input
            v-model="formattedValue"
            label="Value"
            :rules="currencyRules"
          />

          <q-select
            v-model="form.type"
            :options="types"
            label="Type"
            :rules="[val => !!val || 'Type is required']"
          />
        </div>
      </div>
      <div>
        <q-btn label="Submit" type="submit" color="primary" />
        <q-btn label="Reset" type="reset" color="secondary" class="q-ml-sm"/>
      </div>

    </q-form>
  </q-page>

</template>

<script>
import { defineComponent, ref } from 'vue';
import axiosInstance from 'src/axios.js';
import { useRouter } from 'vue-router';
import moment from 'moment';

export default defineComponent({
  name: 'ExpenseManagePage',
  data() {
    return {
      types: ['food', 'rent', 'transport', 'leisure', 'others'],
      currencyRules: [
        val => !!val || 'Invalid BRL currency format',
        val => this.isValidCurrency(val) || 'Invalid BRL currency format'
      ],
      form: {
        description: '',
        value: null,
        date: new Date(),
        type: '',
      }
    }
  },
  computed: {
    formattedValue: {
      get() {
        return this.form.value ? this.formatCurrency(this.form.value) : '';
      },
      set(newValue) {
        this.form.value = this.parseCurrency(newValue);
      }
    }
  },
  methods: {
    onSubmit() {
      const router = useRouter();
      axiosInstance.post('/expenses', this.form)
        .then(() => {
          alert('Despesa criada com sucesso');
          location='/expenses'
        })
        .catch((err) => {
          console.log(err);
          alert( err.response.data.message)
        });
    },
    onReset() {
      this.form = {
        description: '',
        value: 0,
        date: new Date(),
        type: '',
      }
    },
    formatCurrency(value) {
      return new Intl.NumberFormat('pt-BR', {
        style: 'currency',
        currency: 'BRL'
      }).format(value);
    },
    parseCurrency(formattedValue) {
      return parseFloat(formattedValue.replace(/[R$\.,]/g, '').replace(',', '.') / 100);
    },
    isValidCurrency(value) {
      return /^\R\$\s?\d{1,3}(\.\d{3})*,\d{2}$/.test(value);
    },
  },
  mounted() {
    const id = this.$route.params.id;
    if (id) {
      axiosInstance.get(`/expenses/${id}`)
        .then((res) => {
          this.form = {
             ...res.data.expense,
             date: moment(res.data.expense.date).format('DD/MM/YYYY')
            };
        })
        .catch((err) => {
          console.log(err);
          alert('Erro ao buscar despesa')
        });
    }
  }
});
</script>

<style scoped>
/* Estilização adicional, se necessário */
</style>
