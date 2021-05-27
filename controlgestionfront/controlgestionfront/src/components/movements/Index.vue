<template>
    <div>
        <q-card>
            <q-card-section>
                <div class="text h6">
                    <q-icon size="sm" name="fas fa-user-friends"/> Movimientos de Personal
                    <q-btn class="float-right" round size="sm" @click="$router.push('/movements/create')"  outline color="primary" icon="fas fa-plus" v-if="canCreate" />
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
    Table,
  },
  computed: {
    canCreate: {
      get() {
        return this.canShow('movements-create');
      }
    }
  }
}
</script>
