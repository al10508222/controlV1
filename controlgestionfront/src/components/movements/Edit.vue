<template>
    <div>
       <q-card style="width: 100%">
            <q-item>
                <q-item-section avatar>
                    <q-icon size="md" name="fas fa-file-signature"/>
                </q-item-section>
                <q-item-section>
                    <q-item-label>Agregar movimiento</q-item-label>
                    <q-item-label caption>Ingrese los siguientes valores</q-item-label>
                </q-item-section>
            </q-item>
            <q-separator />
            <div class="q-pa-sm">
                <q-card-section>
                    <q-form ref="form" @submit.prevent="() => {}" class="q-gutter-lg">
                      <div class="row q-col-gutter-md">
          <div class="col-xs-12 col-sm-6 col-md-4">
            <q-select
              clearable
              outlined
              v-model="employment.cat_employment_type_id"
              use-input
              map-options
              emit-value
              input-debounce="0"
              option-value="id"
              option-label="name"
              :rules="[val => !!val || 'Este campo es requerido']"
              :options="catalogs.employment_types"
              label="Tipo de movimiento"
              :readonly="!canEdit"/>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-4">
              <q-select
                v-model="employment.employee_id"
                label="Empleado"
                outlined
                emit-value
                option-value="value"
                option-label="label"
                :options="employeeOptions"
                @filter="filterFn"
                use-input
                input-debounce="0"
                :disable="disabled"
                :readonly="!canEdit"
              >
                <template v-slot:option="scope">
                <q-item v-bind="scope.itemProps" v-on="scope.itemEvents">
                    <q-item-section avatar>
                    <q-icon name="fas fa-user" />
                    </q-item-section>
                    <q-item-section>
                    <q-item-label v-html="scope.opt.label" />
                    <q-item-label caption>{{
                        scope.opt.description
                    }}</q-item-label>
                    </q-item-section>
                </q-item>
                </template>
              </q-select>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-4">
            <q-input square outlined v-model="employment.date" label="Fecha de aplicación del movimiento" mask="date" :rules="['date']" @click="$refs.qDateProxy.show()" :readonly="!canEdit">
              <template v-slot:append>
              <q-icon name="event" class="cursor-pointer">
                  <q-popup-proxy ref="qDateProxy" transition-show="scale" transition-hide="scale">
                  <q-date v-model="employment.date" :options="(date) => date <= todayDateString" :readonly="!canEdit">
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
            <q-select
              @input="loadPositions"
              emit-value
              map-options
              clearable
              outlined
              v-model="employment.cat_contract_type_id" use-input input-debounce="0" option-value="id" option-label="name" :options="catalogs.contracts" label="Tipo de contratación" :readonly="!canEdit"/>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-4">
            <q-select
              @input="loadPositions"
              clearable
              map-options
              emit-value
              outlined
              use-input
              v-model="employment.cat_unit_id" option-value="id" option-label="name" :options="catalogs.units" label="Unidad Administrativa" :readonly="!canEdit"/>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-4">
            <q-select
                @input="$forceUpdate()"
                :rules="[val => !!val || 'Este campo es requerido']"
                :disable="positionOptions.length <= 0"
                v-model="employment.position_id"
                emit-value
                map-options
                standard
                use-input input-debounce="0" behaviour="menu" clearable outlined option-value="id" option-label="name" :options="positionOptions" label="Puesto" :readonly="!canEdit"/>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-4">
            <q-select :rules="[val => !!val || 'Este campo es requerido']"
                emit-value
                map-options
                v-model="employment.cat_employment_location_id"
                standard
                use-input
                input-debounce="0" behaviour="menu" clearable outlined option-value="id" option-label="name" :options="catalogs.employment_locations" label="Ubicación física" :readonly="!canEdit"/>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-4" v-if="employment.cat_employment_location_id == 3">
            <q-select
              :rules="[val => !!val || 'Este campo es requerido']"
              v-model="employment.client"
              standard
              use-input
              input-debounce="0" behaviour="menu" clearable outlined option-value="id" option-label="name" :options="catalogs.employment_clients" label="Cliente" :readonly="!canEdit"/>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-4">
            <q-toggle
              v-model="employment.has_kit"
              label="Tiene kit de ingreso inicial"
              left-label
              keep-color
              :disable="!canEdit"
            />
          </div>
        </div>
                    </q-form>
                </q-card-section>
                <q-card-actions align="right">
                    <q-btn flat @click="$router.back()" label="Cancelar" color="primary" v-close-popup />
                    <q-btn flat @click="store()" label="Guardar" color="primary" v-if="canEdit"/>
                </q-card-actions>
            </div>
       </q-card>
    </div>
</template>
<script>
import * as PositionService from 'src/services/PositionService'
import * as EmployeeService from 'src/services/EmployeeService'
import * as DataService from 'src/services/MovementService';
import { notifyError, notifySuccess } from 'src/utils/notify';
import { utils } from 'src/mixins/utils';

export default {
  mixins: [utils],
  data() {
    return {
      disabled: false,
      employment: {
        location: ''
      },
      pagination: {
        page: 1,
        rowsPerPage: 10,
      },
      employeeOptions: [],
      positionOptions: [],
      loadingState: false,
    }
  },
  computed: {
    catalogs: {
      get() {
        return this.$store.state.catalogs;
      }
    },
    canEdit: {
      get() {
        return this.canShow('movements-edit');
      }
    }
  },
  created() {
    const catalogsConfiguration = {
      contracts: true,
      units: true,
      employment_types: true,
      employment_locations: true,
    }
    this.$q.loading.show();
    this.$store.dispatch('catalogs/setCatalogs', { params: catalogsConfiguration })
      .then(() => {
        this.$q.loading.hide();
      })
  },
  methods: {
    store() {
      this.submitting = true
      this.$refs.form.validate().then((valid) => {
        if (valid) {
          const form = { ...this.employment }
          this.$q.loading.show()
          DataService.store(form).then((response) => {
            console.log(response)
            if (response.success) {
              notifySuccess();
              this.$router.push('/movements');
            } else {
              notifyError();
            }
          }).catch(() => {
            this.submitting = false
            notifyError()
          }).finally(() => {
            this.$q.loading.hide()
          });
        } else {
          this.submitting = false
        }
      })
    },
    filterFn(val, update, abort) {
      if (val.length < 3) {
        abort()
        return
      }

      setTimeout(() => {
        update(() => {
          const needle = val.toLowerCase();
          const { page, rowsPerPage } = this.pagination

          EmployeeService.index({ params: { page, rowsPerPage, needle } }).then((response) => {
            if (response.data !== undefined) {
              this.employeeOptions = response.data.map((em) => ({
                label: `${em.name} ${em.lastname} ${em.second_lastname}`,
                value: em.id,
                description: em.curp
              }))
            }
          }).catch((err) => {
            console.log(err)
          })
        });
      }, 100)
    },
    loadPositions() {
      this.employment.position = '';
      this.positionOptions = [];
      if (this.employment.cat_unit_id !== undefined && this.employment.cat_contract_type_id !== undefined) {
        const query = {
          cat_unit_id: this.employment.cat_unit_id,
          cat_contract_type_id: this.employment.cat_contract_type_id
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
    }
  }
}
</script>
