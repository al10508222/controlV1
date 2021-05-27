<template>
  <div>
    <div class="text-h6">
      Direcciones
      <q-btn class="float-right" round size="sm" @click="addAddress" outline color="primary" icon="fas fa-plus" v-if="canCreate" />
    </div>
    <div class="address-list" v-for="(address, index) in employee.addresses" :key="address.id">
      <p><i class="fas fa-map-marker-alt"></i> Dirección {{index+1}}</p>
      <Address :address="address" :readonly="!canEdit"/>
    </div>
    <!-- <div class="text-left">
      <q-btn float push color="blue-10" @click="addAddress" label="Agregar" />
    </div> -->
  </div>
</template>

<script>
import Address from './Address';

export default {
  components: { Address },
  methods: {
    addAddress() {
      this.$store.commit('employee/addAddress', {});
    }
  },
  computed: {
    employee: {
      get() {
        return this.$store.state.employee;
      },
      set(val) {
        this.$store.commit('employee/updateEmployee', val);
      },
    },
    canEdit: {
      get() {
        return this.canShow('employee-edit');
      }
    },
    canCreate: {
      get() {
        return this.canShow('employee-create');
      }
    }
  }
}
</script>

<style>

</style>
