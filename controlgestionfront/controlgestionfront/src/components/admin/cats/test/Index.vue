<template>
  <div>
    <q-card>
      <q-card-section>
        <div class="text-h6">
          <q-icon size="sm" name="fas fa-project-diagram"/> Administración / Catálogos / Unidades
          <q-btn class="float-right" round size="sm" @click="$router.push('/admin/cat/test/create')"  outline color="primary" icon="fas fa-plus" />
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
    };
  },
  methods: {
  },
  computed: {
  },
};
</script>
