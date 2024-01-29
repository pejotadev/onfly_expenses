<!-- src/pages/LoginPage.vue -->

<template>
  <q-layout>
    <q-page-container>
      <q-page class="flex flex-center">
        <div class="q-pa-md" style="width: 300px;">
          <span class="text-h6">Login</span>
          <q-form @submit="onSubmit">
            <q-input filled
              v-model="loginInfo.email"
              label="Usuário"
              type="email"
              class="q-mb-md"
              required="true"/>
            <q-input filled
              type="password"
              v-model="loginInfo.password"
              label="Senha"
              required="true"/>
            <div class="q-mt-md">
              <q-btn label="Entrar" type="submit" color="primary" />
            </div>
          </q-form>
        </div>
      </q-page>
    </q-page-container>
  </q-layout>
</template>

<script>
import { defineComponent, ref } from 'vue';
import axiosInstance from 'src/axios.js';

export default defineComponent({
  name: 'LoginPage',
  setup() {
    const loginInfo = ref({ email: '', password: '' });
    const router = useRouter();

    function onSubmit() {
      axiosInstance.post('/login', loginInfo.value)
        .then((res) => {
          localStorage.setItem('token', res.data.token);
          router.push('/home');
        })
        .catch((err) => {
          console.log(err);
          alert('Erro ao fazer login')
        });
    }

    return { loginInfo, onSubmit };
  },
});
</script>

<style scoped>
/* Estilização adicional, se necessário */
</style>
