import LoginPage from '../pages/LoginPage.vue';
import HomePage from '../pages/HomePage.vue';
import ExpensesManagerPage from '../pages/ExpensesManagerPage.vue';

const routes = [
  { path: '/login', component: LoginPage },
  { path: '/', component: HomePage, meta: { requiresAuth: true } },
  {
    path: '/:catchAll(.*)*',
    component: () => import('../pages/ErrorNotFound.vue')
  }
];

export default routes
