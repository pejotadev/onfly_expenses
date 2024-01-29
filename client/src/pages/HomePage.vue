<template>

  <q-layout>
    <q-page-container>
      <q-page padding>
        <h6>
          Dashboard
        </h6>
        <p>
          Welcome to the dashboard!
        </p>

        <q-row>
          <q-col>
            <q-card>
              <q-card-section>
                <q-card-title>
                  Valor total:
                </q-card-title>
                <q-card-main>
                  {{ expensesPerType
                    .reduce((acc, cur) => acc + cur.value, 0)
                    .toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })}}
                </q-card-main>
              </q-card-section>
              <q-card-section v-if="expensesPerType">
                <q-card-title>
                  Gráfico:
                </q-card-title>

                <Chart
                direction="circular"
                :size="{ width, height: 400 }"
                :data="expensesPerType"
                :margin="{
                  left: Math.round((width - 360)/2),
                  top: 20,
                  right: 0,
                  bottom: 20
                }"
                :axis="axis"
                :config="{ controlHover: false }"
                >
                <template #layers>
                  <Pie
                    :dataKeys="['type', 'value']"
                    :pie-style="{ innerRadius: 100, padAngle: 0.05 }" />
                </template>
                <template #widgets>
                  <Tooltip
                    :config="{
                      type: { },
                      value: { label: 'value' },
                    }"
                    hideLine
                  />
                </template>
              </Chart>

              </q-card-section>
              <q-card-actions align="right">
                <q-btn
                  color="primary"
                  label="View"
                  to="/expenses"
                />

              </q-card-actions>

            </q-card>
          </q-col>
        </q-row>
      </q-page>
    </q-page-container>
  </q-layout>
</template>

<script>
import { defineComponent, ref, onMounted } from 'vue';
import { useRouter } from 'vue-router';
import { Chart, Responsive, Pie, Tooltip } from 'vue3-charts'
import { mapActions, mapState } from 'vuex';

export default defineComponent({
  name: 'HomePage',
  components: { Chart, Pie, Tooltip },
  setup() {
    const direction = ref('horizontal')
    const margin = ref()
    const width = 400

    return {direction, margin, width}
  },
  computed: {
    ...mapState('expensesModule', ['expenses', 'expensesPerType']),
  },
  methods: {
    ...mapActions('expensesModule', ['fetchExpenses'])
  },
  mounted() {
     this.fetchExpenses();
  }
});
</script>

<style scoped>
/* Estilização adicional, se necessário */
</style>
