import expensesService from '../services/expensesService';

const expensesModule = {
  namespaced: true,
  state: {
    expenses: []
  },
  mutations: {
    setExpenses(state, expenses) {
      state.expenses = expenses;
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
        console.log(expenses);
        commit('setExpenses', expenses);
      } catch (error) {
        // Tratar erro
        console.log(error);
      }
    }
  }
};

export default expensesModule;
