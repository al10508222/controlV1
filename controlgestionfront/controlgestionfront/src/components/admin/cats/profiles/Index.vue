<template>
  <div>
    <q-card>
      <q-card-section>
        <div class="text-h6">
          <q-icon size="sm" name="fas fa-passport"/> Administración / Catálogos / Perfiles
          <q-btn class="float-right" round size="sm" @click="$router.push('/admin/profiles/create')"  outline color="primary" icon="fas fa-plus" v-if="canCreate"/>
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
  computed: {
    canCreate: {
      get() {
        return this.canShow('roles-create');
      }
    }
  }
}
</script>
