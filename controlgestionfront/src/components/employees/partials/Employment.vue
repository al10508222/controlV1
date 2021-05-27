<template>
        <div class="row q-col-gutter-md">
          <div class="col-xs-12 col-sm-6 col-md-4">
            <q-select
              clearable
              outlined
              v-model="employment.employment_type"
              :readonly="readonly"
              use-input input-debounce="0"
              option-value="id"
              option-label="name"
              :rules="[val => !!val || 'Este campo es requerido']"
              :options="catalogs.employment_types"
              label="Tipo de movimiento"/>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-4">
            <q-input square outlined v-model="employment.date" :readonly="readonly" label="Fecha de aplicación del movimiento" mask="date" :rules="['date']" @click="$refs.qDateProxy.show()">
              <template v-slot:append>
              <q-icon name="event" class="cursor-pointer">
                  <q-popup-proxy ref="qDateProxy" transition-show="scale" transition-hide="scale">
                  <q-date v-model="employment.date" :readonly="readonly" :options="(date) => date <= todayDateString">
                      <div class="row items-center justify-end">
                      <q-btn v-close-popup label="Cerrar" color="primary" flat />
                      </div>
                  </q-date>
                  </q-popup-proxy>
              </q-icon>
              </template>
            </q-input>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-4">
            <q-select @input="loadPositions" :readonly="readonly" clearable outlined v-model="employment.contract_type" use-input input-debounce="0" option-value="id" option-label="name" :options="catalogs.contracts" label="Tipo de contratación"/>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-4">
            <q-select @input="loadPositions" :readonly="readonly" clearable outlined use-input v-model="employment.unit" option-value="id" option-label="name" :options="catalogs.units" label="Unidad Administrativa"/>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-4">
            <q-select
                @input="$forceUpdate()"
                :rules="[val => !!val || 'Este campo es requerido']"
                :disable="positionOptions.length <= 0"
                :readonly="readonly"
                v-model="employment.position"
                standard
                use-input input-debounce="0" behaviour="menu" clearable outlined option-value="id" option-label="name" :options="positionOptions" label="Puesto" />
          </div>
          <div class="col-xs-12 col-sm-6 col-md-4">
            <q-select :rules="[val => !!val || 'Este campo es requerido']"
                v-model="employment.location"
                standard
                use-input
                :readonly="readonly"
                input-debounce="0" behaviour="menu" clearable outlined option-value="id" option-label="name" :options="catalogs.employment_locations" label="Ubicación física" />
          </div>
          <div class="col-xs-12 col-sm-6 col-md-4" v-if="employment.location && employment.location.id == 3">
            <q-select
              :rules="[val => !!val || 'Este campo es requerido']"
              v-model="employment.client"
              standard
              use-input
              :readonly="readonly"
              input-debounce="0" behaviour="menu" clearable outlined option-value="id" option-label="name" :options="catalogs.employment_clients" label="Cliente" />
          </div>
          <div class="col-xs-12 col-sm-6 col-md-4">
            <q-toggle
              v-model="employment.has_kit"
              label="Tiene kit de ingreso inicial"
              :disable="readonly"
              left-label
              keep-color
            />
          </div>
        </div>
</template>

<script>
import * as PositionService from 'src/services/PositionService';
import { notifyError } from 'src/utils/notify';
import { utils } from '../../../mixins/utils';

export default {
  mixins: [utils],
  props: {
    employment: {
      required: true,
      type: Object,
    },
    readonly: {
      type: Boolean,
      default: false
    }
  },
  data() {
    return {
      positionOptions: [],
      loadingStates: false,
    };
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
    catalogs: {
      get() {
        return this.$store.state.catalogs;
      }
    },
  },
  methods: {
    loadPositions() {
      // Clear select
      this.employment.position = '';
      this.positionOptions = [];
      if (this.employment.unit !== undefined && this.employment.contract_type !== undefined) {
        const query = {
          cat_unit_id: this.employment.unit.id,
          cat_contract_type_id: this.employment.contract_type.id,
          employee_positions: this.employee.employments.filter((emp) => emp.position !== undefined && emp.position !== '').map((e) => e.position.id),
        }
        PositionService.retrieve(query).then((res) => {
          if (res.positions.length > 0) {
            this.positionOptions = res.positions;
          } else {
            notifyError('No se han encontrado puestos para este tipo de Contratación y Unidad Administrativa. Pruebe con otros datos');
          }
        }).catch((err) => {
          console.log(err)
        })
      }
    },
  }
};
</script>

<style>

</style>
