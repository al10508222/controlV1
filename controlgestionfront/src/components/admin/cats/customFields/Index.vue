<template>
  <div>
    <q-card>
      <q-card-section>
        <div class="text-h6">
          <q-icon size="sm" name="fas fa-tools"/> Administración / Catálogos / Campos Personalizados
          <q-btn class="float-right" round size="sm" @click="$router.push('/admin/cat/customFields/create')"  outline color="primary" icon="fas fa-plus" v-if="canCreate"/>
        </div>
      </q-card-section>
    </q-card>
    <Table :canView="canView" :canEdit="canEdit" :canDelete="canDelete"/>
  </div>
</template>

<script>

import Table from './Table';

export default {
  components: {
    Table
  },
  computed: {
    canCreate: {
      get() {
        return this.canShow('customField-create');
      }
    },
    canView: {
      get() {
        return this.canShow('customField-view');
      }
    },
    canEdit: {
      get() {
        return this.canShow('customField-edit');
      }
    },
    canDelete: {
      get() {
        return this.canShow('customField-delete');
      }
    }
  }
};
</script>
