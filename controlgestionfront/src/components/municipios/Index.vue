<template>
  <div>
    <q-card>
      <q-card-section>
        <div class="text-h6">
          <q-icon size="sm" name="fas fa-check"/> Catálogo de Municipios
          <q-btn class="float-right" round size="sm" @click="$router.push('/municipios/create')"  outline color="primary" icon="fas fa-plus"  v-if="canShow('municipios-create')"/>
        </div>
      </q-card-section>
    </q-card>
    <Table />
  </div>
</template>

<script>

import Table from './Table';

export default {
  components: {
    Table
  },
  data() {
    return {
      form: {
        ENTIDADFEDERATIVAID: '',
        ENTIDADFEDERATIVANOMBRE: ''
      },
      filteredEntidades: [],
      ENTIDADFEDERATIVAID: ''
    };
  },
  created() {
    const catalogsConfiguration = { entidades: true };
    this.$q.loading.show();
    this.$store.dispatch('catalogs/setCatalogs', { params: catalogsConfiguration }).then(() => {
      this.$q.loading.hide();
    });
  },
  methods: {
    change(val) {
      this.filteredEntidades = this.catalogs.entidades.filter((e) => val === e.ENTIDADFEDERATIVAID)
    },
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
  },
};
</script>
