import axiosInstance from '../axios';

export default {
  async fetchExpenses() {
    try {
      const response = await axiosInstance.get('/expenses');

      return response.data.expenses;
    } catch (error) {
      throw error;
    }
  }
  // Outras operações de usuário
}
