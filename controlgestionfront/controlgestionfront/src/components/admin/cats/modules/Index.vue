<template>
  <div>
    <q-card>
      <q-card-section>
        <div class="text-h6">
          <q-icon size="sm" name="fas fa-passport"/> Administración / Catálogos / Modulos
          <q-btn class="float-right" round size="sm" @click="$router.push('/admin/cat/modules/create')"  outline color="primary" icon="fas fa-plus" />
        </div>
      </q-card-section>
    </q-card>
  </div>
</template>

<script>

// import Table from './Table';

export default {
  components: {
  },
  data() {
    return {
      editDialog: false,
    };
  },
  methods: {
  },
  computed: {
    catalogs: {
      get() {
        return this.$store.state.catalogs;
      },
      set(val) {
        this.$store.commit('catalogs/setCatalogs', val)
      }
    },
    users: {
      get() {
        return this.$store.state.user.users;
      },
    },
  },
};
</script>
