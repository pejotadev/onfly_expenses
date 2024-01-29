import LoginPage from '../pages/LoginPage.vue';
import HomePage from '../pages/HomePage.vue';
import ExpensesPage from '../pages/ExpensesPage.vue';
import ExpenseManagePage from '../pages/ExpenseManagePage.vue';

const routes = [
  { path: '/login', component: LoginPage },
  { path: '/', component: HomePage, meta: { requiresAuth: true } },
  { path: '/expenses', component: ExpensesPage, meta: { requiresAuth: true } },
  { path: '/expenses/create', component: ExpenseManagePage, meta: { requiresAuth: true } },
  { path: '/expenses/:id', component: ExpenseManagePage, meta: { requiresAuth: true } },
  {
    path: '/:catchAll(.*)*',
    component: () => import('../pages/ErrorNotFound.vue')
  }
];

export default routes
