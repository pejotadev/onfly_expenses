import expensesService from '../services/expensesService';

const expensesModule = {
  namespaced: true,
  state: {
    expenses: [],
    expensesPerType: [],
    expensesPerMonth: []
  },
  mutations: {
    setExpenses(state, expenses) {
      state.expenses = expenses;

      const result = {};
      expenses.forEach(item => {
        // Converte o valor para número, pois está em formato de string
        const value = parseFloat(item.value);

        // Se o tipo já existe no objeto result, soma o valor; caso contrário, inicializa com o valor atual
        if (result[item.type]) {
            result[item.type] += value;
        } else {
            result[item.type] = value;
        }
      });
      state.expensesPerType = Object.keys(result).map(type => ({ type, value: result[type] }));

      const result2 = {};
      expenses.forEach(item => {
        const date = new Date(item.date);
        const month = date.getMonth() + 1;
        const year = date.getFullYear();
        const key = `${month}/${year}`;

        if (result2[key]) {
          result2[key] += +item.value;
        } else {
          result2[key] = +item.value;
        }
      });
      state.expensesPerMonth = Object.keys(result2).map(key => ({ date: key, value: result2[key] }));

    },
    addExpense(state, expense) {
      state.expenses.push(expense);
    },
    updateExpense(state, expense) {
      const index = state.expenses.findIndex(exp => exp.id === expense.id);
      state.expenses[index] = expense;
    },
    removeExpense(state, expenseId) {
      const index = state.expenses.findIndex(exp => exp.id === expenseId);
      state.expenses.splice(index, 1);
    }
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
    },
    async deleteExpense({ commit }, expenseId) {
      try {
        await expensesService.deleteExpense(expenseId);
        commit('removeExpense', expenseId);
      } catch (error) {
        // Tratar erro
        console.log(error);
      }
    }
  }
};

export default expensesModule;
