<template>
  <q-layout view="lHh Lpr lFf">
    <q-header elevated>
      <q-toolbar>
        <q-btn
          flat
          dense
          round
          icon="menu"
          aria-label="Menu"
          @click="toggleLeftDrawer"
        />

        <q-toolbar-title>
          Onfly Expenses
        </q-toolbar-title>

        <div>Quasar v{{ $q.version }}</div>
      </q-toolbar>
    </q-header>

    <q-drawer
      v-if="token"
      v-model="leftDrawerOpen"
      show-if-above
      bordered
    >
      <q-list>
        <q-item-label
          header
        >
          <span class="text-primary">Onfly</span>
        </q-item-label>

        <q-item-section>
          <q-item-label
            header
            lines="1"
            onclick="location='/'"
            class="cursor-pointer q-hoverable"
          >
            Dashboard
          </q-item-label>
          <q-item-label
            header
            lines="1"
            onclick="location='/expenses'"
            class="cursor-pointer q-hoverable"
          >
            Expenses
          </q-item-label>

          <q-item-label
            header
            lines="1"
            @click="logout"
            class="cursor-pointer q-hoverable"
          >
            Logout
          </q-item-label>
        </q-item-section>

      </q-list>
    </q-drawer>

    <q-page-container>
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script>
import { defineComponent, ref } from 'vue'

export default defineComponent({
  name: 'MainLayout',
  components: {
  },

  setup () {
    const leftDrawerOpen = ref(false)

    const token = localStorage.getItem('token')

    return {
      token,
      logout () {
        localStorage.removeItem('token')
        location = '/login'
      },
      leftDrawerOpen,
      toggleLeftDrawer () {
        leftDrawerOpen.value = !leftDrawerOpen.value
      }
    }
  }
})
</script>
