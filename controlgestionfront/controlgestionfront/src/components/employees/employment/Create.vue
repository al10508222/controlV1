<template>
  <q-card style="width: 100%">
    <q-form ref="employmentForm">
      <q-card-section>
        <div class="text-h6">Agregar movimiento</div>
        <div class="row q-col-gutter-md">
          <div class="col-12">
            <q-select clearable outlined v-model="employment.cat_employment_type" use-input input-debounce="0" option-value="id" option-label="name" :options="catalogs.employment_types" label="Tipo de movimiento"/>
          </div>
          <div class="col-12">
            <q-input square outlined v-model="employment.date" label="Fecha de aplicación del movimiento" mask="date" :rules="['date']">
              <template v-slot:append>
              <q-icon name="event" class="cursor-pointer">
                  <q-popup-proxy ref="qDateProxy" transition-show="scale" transition-hide="scale">
                  <q-date v-model="employment.date" :options="(date) => date <= todayDateString">
                      <div class="row items-center justify-end">
                      <q-btn v-close-popup label="Cerrar" color="primary" flat />
                      </div>
                  </q-date>
                  </q-popup-proxy>
              </q-icon>
              </template>
            </q-input>
          </div>
          <div class="col-12">
            <q-select @input="loadPositions" clearable outlined v-model="employment.contract_type" use-input input-debounce="0" option-value="id" option-label="name" :options="catalogs.contracts" label="Tipo de contratación"/>
          </div>
          <div class="col-12">
            <q-select @input="loadPositions" clearable outlined use-input v-model="employment.unit" option-value="id" option-label="name" :options="catalogs.units" label="Unidad"/>
          </div>
          <div class="col-12">
            <q-select :rules="[val => !!val || 'Este campo es requerido']"
                :disable="positionOptions.length <= 0"
                v-model="employment.position"
                standard
                use-input input-debounce="0" behaviour="menu" clearable outlined option-value="id" option-label="name" :options="positionOptions" label="Puesto" />
          </div>
          <div class="col-12">
            <q-select :rules="[val => !!val || 'Este campo es requerido']"
                v-model="employment.location"
                standard
                use-input
                input-debounce="0" behaviour="menu" clearable outlined option-value="id" option-label="name" :options="catalogs.employment_locations" label="Ubicación física" />
          </div>
          <div class="col-12">
            <q-select
              v-if="employment.location && employment.location.id == 3"
              :rules="[val => !!val || 'Este campo es requerido']"
              v-model="employment.client"
              standard
              use-input
              input-debounce="0" behaviour="menu" clearable outlined option-value="id" option-label="name" :options="catalogs.employment_clients" label="Cliente" />
          </div>
        </div>
      </q-card-section>
      <q-card-actions align="right">
        <q-btn flat label="Cancelar" color="primary" v-close-popup />
          <q-btn flat label="Agregar" color="primary" v-close-popup @click="addEmployment"/>
      </q-card-actions>
    </q-form>
  </q-card>
</template>

<script>
import * as PositionService from 'src/services/PositionService';
import { utils } from '../../../mixins/utils';

export default {
  mixins: [utils],
  data() {
    return {
      positionOptions: [],
      employment: {
        cat_employment_type: '',
        date: '',
        unit: '',
        contract_type: '',
        location: '',
        position: '',
      },
      loadingStates: false,
    };
  },
  computed: {
    catalogs: {
      get() {
        return this.$store.state.catalogs;
      }
    },
  },
  methods: {
    loadPositions() {
      // Clear select
      this.employment.position = null;
      const query = {
        cat_unit_id: this.employment.unit.id,
        cat_contract_type_id: this.employment.contract_type.id
      }

      PositionService.retrieve(query).then((res) => {
        this.positionOptions = res.positions;
      }).catch((err) => {
        console.log(err)
      })
    },
    addEmployment() {
      this.$store.commit('employee/addEmployment', this.form);
    }
  }
};
</script>

<style>

</style>
