<template>
  <div>
    <q-card>
      <q-card-section>
        <div class="text-h6">
          <q-icon size="sm" name="fas fa-check"/> Catálogo CUCoP
          <q-btn class="float-right" round size="sm" @click="$router.push('/cucop/create')"  outline color="primary" icon="fas fa-plus"  v-if="canShow('cucop-create')"/>
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
    // cucops: {
    //   get() {
    //     return this.$store.state.user.cucops;
    //   },
    // },
  },
};
</script>
