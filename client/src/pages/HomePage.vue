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
                  Gráficos:
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

                <Chart
                :size="{ width: 500, height: 420 }"
                :data="expensesPerType"
                :margin="margin"
                :direction="direction"
                :axis="axis">

                <template #layers>
                  <Grid strokeDasharray="2,2" />
                  <Bar :dataKeys="['type', 'value']" :barStyle="{ fill: '#90e0ef' }" />
                </template>
              </Chart>

              <Chart
              v-if="expensesPerMonth"
              :size="{ width: 500, height: 420 }"
              :data="expensesPerMonth"
              :margin="margin"
              :direction="direction"
              :axis="axis">

              <template #layers>
                <Grid strokeDasharray="2,2" />
                <Area :dataKeys="['date', 'value']" type="monotone" :areaStyle="{ fill: 'url(#grad)' }" />
                <LineChart
                  :dataKeys="['date', 'value']"
                  type="monotone"
                  :lineStyle="{
                    stroke: '#9f7aea'
                  }"
                />
                <MarkerChart v-if="marker" :value="1000" label="Mean." color="green" strokeWidth="2" strokeDasharray="6 6" />
                <defs>
                  <linearGradient id="grad" gradientTransform="rotate(90)">
                    <stop offset="0%" stop-color="#be90ff" stop-opacity="1" />
                    <stop offset="100%" stop-color="white" stop-opacity="0.4" />
                  </linearGradient>
                </defs>
              </template>

              <template #widgets>
                <Tooltip
                  borderColor="#48CAE4"
                  :config="{
                    pl: { color: '#9f7aea' },
                    avg: { hide: true },
                    inc: { hide: true }
                  }"
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
import { Chart, Responsive, Pie, Tooltip, Grid, Bar, Line as LineChart, Marker as MarkerChart } from 'vue3-charts'
import { mapActions, mapState } from 'vuex';

export default defineComponent({
  name: 'HomePage',
  components: { Chart, Pie, Tooltip, Grid, Bar, LineChart, MarkerChart },
  setup() {
    const direction = ref('horizontal')
    const margin = ref()
    const width = 400
    const axis = ref({
      primary: {
        type: 'band'
      },
      secondary: {
        domain: ['dataMin', 'dataMax + 100'],
        type: 'linear',
        ticks: 8
      }
    })

    return {direction, margin, width, axis}
  },
  computed: {
    ...mapState('expensesModule', ['expenses', 'expensesPerType', 'expensesPerMonth']),
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
