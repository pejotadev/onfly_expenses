import { createStore } from 'vuex';
import expensesModule from './expensesModule';

const store = createStore({
  modules: {
    expensesModule,
  },
  actions: {
    async fetchExpenses({ commit }) {
      try {
        const expenses = await expensesService.fetchExpenses();
        commit('setExpenses', expenses);
      } catch (error) {
        // Tratar erro
        console.log(error);
      }
    }
    // Outras ações
  },
});

export default store;
