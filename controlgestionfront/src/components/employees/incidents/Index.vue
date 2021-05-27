<template>
    <div>
        <q-card class="q-mb-md">
            <q-card-section>
                <div class="text-h6">
                    <q-icon size="sm" name="fas fa-user-friends"/> Administración / Trabajadores / Incidencias
                    <q-btn
                      v-if="canCreate"
                      @click="$router.push(`/employees/${$route.params.id}/incidents/create`)"
                      class="float-right"
                      round
                      size="sm"
                      outline color="primary" icon="fas fa-plus" />
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
      data: []
    }
  },
  computed: {
    canCreate: {
      get() { return this.canShow('incidents-create') }
    }
  }
}
</script>
