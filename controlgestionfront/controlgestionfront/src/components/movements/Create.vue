<template>
  <div>
    <q-card style="width: 100%">
      <q-item>
        <q-item-section avatar>
          <q-icon size="md" name="fas fa-file-signature" />
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
              <div class="col-xs-12 col-sm-6 col-md-6">
                <q-input
                  square
                  debounce="300"
                  @input="searchEmployee"
                  outlined
                  v-model="curp"
                  maxlength="18"
                  label="CURP"
                  :rules="[
                    $rules.required($i18n.t('requiredInput')),
                    this.curpValidate(curp, $t('minLengthCurp'))
                  ]"
                  mask="XXXX######XXXXXX##"
                />
              </div>
              <div class="col-xs-12 col-sm-6 col-md-6">
                <q-select
                  v-model="employment.employee_id"
                  label="Empleado"
                  outlined
                  disabled
                  emit-value
                  map-options
                  option-value="id"
                  option-label="full_name"
                  :options="employeeOptions"
                  input-debounce="0"
                >
                </q-select>
              </div>
              <div class="col-12" v-if="employment.employee_id">
                <div class="quote">
                  <div v-if="current_employment == null">
                    <p>
                      <span class="text-bold">Este empleado aún no cuenta con ningún puesto</span>
                    </p>
                  </div>
                  <div v-if="current_employment != null && current_employment.position == undefined">
                    <p>
                      <span class="text-bold">Este empleado no tiene ningún puesto porque fue dado de baja</span>
                    </p>
                    <p>
                      <span class="text-bold"> Motivo de baja: </span>
                      {{ current_employment.off_work_reason ? current_employment.off_work_reason.name : 'N/A'}}
                    </p>
                    <p>
                      <span class="text-bold"> Observación: </span>
                      {{ current_employment.observation }}
                    </p>
                  </div>
                  <div v-if="current_employment != null && current_employment.position != undefined">
                    <p>
                      <span class="text-bold">Puesto actual: </span>
                      {{ current_employment.position ? current_employment.position.name : 'N/A'  }}
                    </p>
                  <p>
                    <span class="text-bold">Contratación: </span>
                    {{ current_employment.contract_type ? current_employment.contract_type.name : 'N/A' }}
                  </p>
                  <p>
                    <span class="text-bold">Unidad Administrativa: </span>
                    {{ current_employment.unit ? current_employment.unit.name : 'N/A' }}
                  </p>
                  <p>
                    <span class="text-bold">Desde: </span>
                    {{ current_employment.date | readableDate }}
                  </p>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-4">
                <q-select
                  clearable
                  outlined
                  v-model="employment.cat_employment_type_id"
                  use-input
                  map-options
                  emit-value
                  input-debounce="0"
                  @input="clearForm"
                  option-value="id"
                  option-label="name"
                  :rules="[val => !!val || 'Este campo es requerido']"
                  :options="employmentTypeOptions"
                  label="Tipo de movimiento"
                />
              </div>
              <div v-if="employment.cat_employment_type_id === 5" class="col-xs-12 col-sm-6 col-md-4" >
                <q-select
                  clearable
                  outlined
                  v-model="employment.cat_off_work_reason_id"
                  use-input
                  map-options
                  emit-value
                  input-debounce="0"
                  option-value="id"
                  option-label="name"
                  :rules="[val => !!val || 'Este campo es requerido']"
                  :options="catalogs.off_work_reasons"
                  label="Motivo de baja"
                />
              </div>
              <div v-if="employment.cat_employment_type_id === 5" class="col-xs-12 col-sm-6 col-md-4">
                <q-input
                  v-model="employment.observation"
                  square
                  outlined
                  maxlenghth="175"
                  label="Observación"
                  :rules="[$rules.required($t('requiredInput'))]"
                />
              </div>
              <div class="col-xs-12 col-sm-6 col-md-4">
                <q-input
                  square
                  outlined
                  v-model="employment.date"
                  label="Fecha de aplicación del movimiento"
                  mask="date"
                  :rules="['date']"
                  @click="$refs.qDateProxy.show()"
                >
                  <template v-slot:append>
                    <q-icon name="event" class="cursor-pointer">
                      <q-popup-proxy
                        ref="qDateProxy"
                        transition-show="scale"
                        transition-hide="scale"
                      >
                        <q-date
                          v-model="employment.date"
                          :options="dateOptionsFn"
                        >
                          <div class="row items-center justify-end">
                            <q-btn
                              v-close-popup
                              label="Cerrar"
                              color="primary"
                              flat
                            />
                          </div>
                        </q-date>
                      </q-popup-proxy>
                    </q-icon>
                  </template>
                </q-input>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-4" v-if="employment.cat_employment_type_id !== 5">
                <q-select
                  @input="loadPositions"
                  emit-value
                  map-options
                  :disable="employment.cat_employment_type_id === 2"
                  clearable
                  outlined
                  v-model="employment.cat_contract_type_id"
                  use-input
                  input-debounce="0"
                  option-value="id"
                  option-label="name"
                  :options="catalogs.contracts"
                  label="Tipo de contratación"
                />
              </div>
              <div class="col-xs-12 col-sm-6 col-md-4" v-if="employment.cat_employment_type_id !== 5">
                <q-select
                  @input="loadPositions"
                  :disable="employment.cat_employment_type_id === 2"
                  clearable
                  map-options
                  emit-value
                  outlined
                  use-input
                  v-model="employment.cat_unit_id"
                  option-value="id"
                  option-label="name"
                  :options="catalogs.units"
                  label="Unidad Administrativa"
                />
              </div>
              <div class="col-xs-12 col-sm-6 col-md-4" v-if="employment.cat_employment_type_id !== 5">
                <q-select
                  @input="$forceUpdate()"
                  :disable="employment.cat_employment_type_id === 2 || positionOptions.length <= 0"
                  :rules="[val => !!val || 'Este campo es requerido. Compruebe que existen puestos en el sistema con los parámetros asignados']"
                  v-model="employment.position_id"
                  emit-value
                  map-options
                  standard
                  use-input
                  input-debounce="0"
                  behaviour="menu"
                  clearable
                  outlined
                  option-value="id"
                  option-label="name"
                  :options="positionOptions"
                  label="Puesto"
                />
              </div>
              <div class="col-xs-12 col-sm-6 col-md-4" v-if="employment.cat_employment_type_id !== 5">
                <q-select
                  :rules="[val => !!val || 'Este campo es requerido']"
                  :disable="employment.cat_employment_type_id === 2"
                  emit-value
                  map-options
                  v-model="employment.cat_employment_location_id"
                  standard
                  use-input
                  input-debounce="0"
                  behaviour="menu"
                  clearable
                  outlined
                  option-value="id"
                  option-label="name"
                  :options="catalogs.employment_locations"
                  label="Ubicación física"
                />
              </div>
              <div
                class="col-xs-12 col-sm-6 col-md-4"
                v-if="employment.cat_employment_location_id == 3 && employment.cat_employment_type_id !== 5"
              >
                <q-select
                  :rules="[val => !!val || 'Este campo es requerido']"
                  v-model="employment.client"
                  standard
                  use-input
                  input-debounce="0"
                  behaviour="menu"
                  clearable
                  outlined
                  option-value="id"
                  option-label="name"
                  :options="catalogs.employment_clients"
                  label="Cliente"
                />
              </div>
              <div class="col-xs-12 col-sm-6 col-md-4" v-if="employment.cat_employment_type_id !== 5">
                <q-toggle
                  :disable="employment.cat_employment_type_id === 2"
                  v-model="employment.has_kit"
                  label="Tiene kit de ingreso inicial"
                  left-label
                  keep-color
                />
              </div>
            </div>
          </q-form>
        </q-card-section>
        <q-card-actions align="right">
          <q-btn
            flat
            @click="$router.back()"
            label="Cancelar"
            color="primary"
            v-close-popup
          />
          <q-btn flat @click="store()" label="Guardar" color="primary" />
        </q-card-actions>
      </div>
    </q-card>
  </div>
</template>
<script>
import * as PositionService from 'src/services/PositionService';
import * as EmployeeService from 'src/services/EmployeeService';
import * as DataService from 'src/services/MovementService';
import { notifyError, notifySuccess } from 'src/utils/notify';
import { curpValidate } from 'src/utils/validations';
import { utils } from 'src/mixins/utils';
import { date } from 'quasar';

export default {
  mixins: [utils],
  data() {
    return {
      disabled: false,
      curp: '',
      current_employment: {},
      employment: {
      },
      pagination: {
        page: 1,
        rowsPerPage: 10
      },
      employeeOptions: [],
      positionOptions: [],
      loadingState: false
    };
  },
  watch: {
    'employment.cat_employment_type_id': function (employmentType) {
      switch (employmentType) {
        case 1:
          // Nuevo ingreso
          break;
        case 2:
          // Renovación
          this.employment.cat_contract_type_id = this.current_employment.cat_contract_type_id
          this.employment.cat_unit_id = this.current_employment.cat_unit_id
          this.employment.position_id = this.current_employment.position_id
          this.employment.cat_employment_location_id = this.current_employment.cat_employment_location_id
          this.employment.has_kit = this.current_employment.has_kit
          this.positionOptions = [this.current_employment.position]
          break;
        default:
          console.log('do nothing')
      }
    },
  },
  computed: {
    catalogs: {
      get() {
        return this.$store.state.catalogs;
      }
    },
    employmentTypeOptions: {
      get() {
        if (this.current_employment == null) {
          return this.$store.state.catalogs.employment_types.filter(
            (e) => e.id === 1,
          )
        }
        if (this.current_employment != null && this.current_employment.cat_employment_type_id === 5) {
          return this.$store.state.catalogs.employment_types.filter(
            (e) => e.id === 6,
          )
        }
        return this.$store.state.catalogs.employment_types.filter(
          (e) => e.id !== 1 && e.id !== 6,
        )
      }
    }
  },
  created() {
    const catalogsConfiguration = {
      contracts: true,
      units: true,
      employment_types: true,
      employment_locations: true,
      off_work_reasons: true,
    };
    this.$q.loading.show();
    this.$store
      .dispatch('catalogs/setCatalogs', { params: catalogsConfiguration })
      .then(() => {
        const { curp } = this.$route.params;
        if (curp !== undefined) {
          this.curp = curp
          this.searchEmployee(curp)
        }
        this.$q.loading.hide();
      });
  },
  methods: {
    dateOptionsFn(fecha) {
      if (this.employment.cat_employment_type_id === 1) {
        return fecha <= this.todayDateString
      }
      const movementDate = date.extractDate(this.current_employment.date, 'YYYY-MM-DD')
      // const enUSFormatter = new Intl.DateTimeFormat('en-US');
      return fecha > date.formatDate(movementDate, 'YYYY/MM/DD')
    },
    clearForm() {
      this.employment.position_id = null
      this.employment.cat_contract_type_id = null
      this.employment.cat_unit_id = null
    },
    store() {
      this.submitting = true;
      this.$refs.form.validate().then((valid) => {
        if (valid) {
          const form = { ...this.employment };
          this.$q.loading.show();
          DataService.store(form)
            .then((response) => {
              if (response.success) {
                notifySuccess();
                this.$router.push('/movements');
              } else {
                notifyError();
              }
            })
            .catch(() => {
              this.submitting = false;
              notifyError();
            })
            .finally(() => {
              this.$q.loading.hide();
            });
        } else {
          this.submitting = false;
        }
      });
    },
    curpValidate,
    searchEmployee(curp) {
      console.log('curp', curp);
      EmployeeService.searchByCURP({ params: { curp } })
        .then((response) => {
          console.log(response);
          if (response.employee !== null) {
            this.employeeOptions = [response.employee];
            this.employment.employee_id = response.employee.id;
            this.current_employment = response.employee.employment
          }
        })
        .catch((err) => {
          console.log(err);
        });
    },
    filterFn(val, update, abort) {
      if (val.length < 3) {
        abort();
        return;
      }

      setTimeout(() => {
        update(() => {
          const needle = val.toLowerCase();
          const { page, rowsPerPage } = this.pagination;

          EmployeeService.index({ params: { page, rowsPerPage, needle } })
            .then((response) => {
              if (response.data !== undefined) {
                this.employeeOptions = response.data.map((em) => ({
                  label: `${em.name} ${em.lastname} ${em.second_lastname}`,
                  value: em.id,
                  description: em.curp
                }));
              }
            })
            .catch((err) => {
              console.log(err);
            });
        });
      }, 100);
    },
    loadPositions() {
      this.employment.position = '';
      this.positionOptions = [];
      if (
        this.employment.cat_unit_id !== undefined
        && this.employment.cat_contract_type_id !== undefined
      ) {
        const query = {
          cat_unit_id: this.employment.cat_unit_id,
          cat_contract_type_id: this.employment.cat_contract_type_id
        };
        PositionService.retrieve(query)
          .then((res) => {
            if (res.positions.length > 0) {
              this.positionOptions = res.positions;
            } else {
              notifyError(
                'No se han encontrado puestos para este tipo de Contratación y Unidad Administrativa. Pruebe con otros datos'
              );
            }
          })
          .catch((err) => {
            console.log(err);
          });
      }
    }
  }
};
</script>
