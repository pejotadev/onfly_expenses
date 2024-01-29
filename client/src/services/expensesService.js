import axiosInstance from '../axios';

export default {
  async fetchExpenses() {
    try {
      const response = await axiosInstance.get('/expenses');

      return response.data.expenses;
    } catch (error) {
      throw error;
    }
  },

  async deleteExpense(expenseId) {
    try {
      await axiosInstance.delete(`/expenses/${expenseId}`);
    } catch (error) {
      throw error;
    }
  }

}
