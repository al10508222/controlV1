<template>
  <div class="row q-col-gutter-sm">
    <div class="col-xs-12 col-sm-6 col-md-3">
      <q-select clearable outlined v-model="address.state" :readonly="readonly" option-value="id" option-label="name" :options="stateOptions" label="Estado" />
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3">
      <q-input square outlined v-model="address.town" :readonly="readonly" maxlength="45" label="Municipio/Alcaldía" />
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3">
      <q-input square outlined v-model="address.neighborhood" :readonly="readonly" maxlength="45" label="Colonia" />
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3">
      <q-input square outlined v-model="address.city" :readonly="readonly" maxlength="35" label="Ciudad"/>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3">
      <q-input square outlined v-model="address.zipcode" :readonly="readonly" maxlength="5" label="CP" />
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3">
      <q-input square outlined v-model="address.street" :readonly="readonly" maxlength="40" label="Calle" />
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3">
      <q-input square outlined v-model="address.ext_num" :readonly="readonly" maxlength="7" label="Número exterior" />
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3">
      <q-input square outlined v-model="address.int_num" :readonly="readonly" maxlength="7" label="Número interior" />
    </div>
  </div>
</template>

<script>
import * as CatalogService from 'src/services/admin/CatalogService';

export default {
  props: {
    address: {
      type: Object,
      required: true,
    },
    readonly: {
      type: Boolean,
      default: false,
    }
  },
  data() {
    return {
      stateOptions: [],
      loadingStates: false
    }
  },
  computed: {
    catalogs: {
      get() {
        return this.$store.state.catalogs;
      }
    },
  },
  created() {
    this.loadingStates = true;
    const COUNTRY = 142; // Id for México
    CatalogService.getStates(COUNTRY).then((states) => {
      this.stateOptions = states
      this.loadingStates = false
    })
  },
};
</script>

<style>

</style>
