import { createRouter, createWebHistory } from 'vue-router';
import routes from './routes';

const router = createRouter({
  history: createWebHistory(),
  routes,
});

router.beforeEach((to, from, next) => {
  const requiresAuth = to.matched.length ?
    to.matched.some(record => record.meta.requiresAuth) :
    true;
  const isAuthenticated = localStorage.getItem('token'); // Verifica se o token está armazenado

  if (requiresAuth && !isAuthenticated) {
    next('/login'); // Redireciona para a página de login se não estiver autenticado
  } else {
    // autenticar();
    next(); // Continua para a rota pretendida se estiver autenticado
  }
});

export default router;
