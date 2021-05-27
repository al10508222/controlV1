<template>
    <q-card style="width: 100%">
        <q-item>
            <q-item-section avatar>
            <q-icon size="md" name="fas fa-clipboard-list"/>
            </q-item-section>
            <q-item-section>
                <q-item-label>Agregar incidencia</q-item-label>
                <q-item-label caption>Asigne una incidencia para el empleado</q-item-label>
            </q-item-section>
        </q-item>
        <q-separator />
        <div class="q-pa-sm">
            <q-card-section>
                <q-form ref="form"  @submit.prevent="() => {}">
                    <div class="row q-col-gutter-md">
                        <div class="col-md-7 col-sm-5 col-xs-12">
                            <div class="row q-col-gutter-md">
                                <div class="col-12 q-mb-md">
                                    <q-select
                                        :rules="[(val) => !!val || 'Este campo es requerido']"
                                        clearable
                                        outlined
                                        v-model="incident.employee"
                                        option-value="id"
                                        option-label="name"
                                        :options="employees"
                                        :disable="true"
                                        label="Empleado"
                                    />
                                </div>
                                <div class="col-12 q-mb-md">
                                    <q-select
                                    :rules="[(val) => !!val || 'Este campo es requerido']"
                                    clearable
                                    outlined
                                    map-options
                                    emit-value
                                    v-model="incident.cat_employee_incident_type_id"
                                    option-value="id"
                                    option-label="name"
                                    :options="catalogs.incident_types"
                                    label="Tipo de incidencia"
                                    />
                                </div>
                                <div class="col-12" v-if="incident.cat_employee_incident_type_id == 2">
                                    <q-select
                                    :rules="[(val) => !!val || 'Este campo es requerido']"
                                    clearable
                                    outlined
                                    map-options
                                    emit-value
                                    v-model="incident.cat_employee_inability_type_id"
                                    option-value="id"
                                    option-label="name"
                                    :options="catalogs.inability_types"
                                    label="Tipo de incapacidad"
                                    />
                                </div>
                                <div class="col-12" v-if="incident.cat_employee_incident_type_id == 2">
                                    <q-input
                                        square
                                        outlined
                                        v-model="incident.certificate"
                                        label="Código de certificado"
                                        :rules="[(val) => !!val || 'Este campo es requerido']"
                                        />
                                    </div>
                                <div class="col-12">
                                    <q-input
                                        v-model="incident.observation"
                                        square
                                        outlined
                                        label="Observaciones"
                                        type="textarea"
                                        :rules="[$rules.required($t('requiredInput'))]"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-7 col-xs-12">
                            <q-date
                              landscape
                              v-model="incident.days"
                              mask="YYYY-MM-DD"
                              multiple />
                        </div>
                    </div>
                    <q-card-actions align="right">
                        <q-btn flat @click="$router.back()" label="Cancelar" color="primary" v-close-popup />
                        <q-btn flat @click="store()" label="Guardar" color="primary" />
                    </q-card-actions>
                </q-form>
            </q-card-section>
        </div>
    </q-card>
</template>
<script>
import * as DataService from 'src/services/employee/IncidentService';
import * as EmployeeService from 'src/services/EmployeeService';
import { notifyError, notifySuccess } from 'src/utils/notify';

export default {
  data() {
    return {
      incident: {
        employee: { id: 1, name: 'Brandon Uriel Pérez Ramírez' },
        type: '',
        observation: '',
        days: []
      },
      employees: [],
      inability_types: []
    }
  },
  computed: {
    catalogs: {
      get() {
        return this.$store.state.catalogs;
      },
      set(val) {
        this.$store.commit('catalogs/setCatalogs', val)
      }
    },
  },
  mounted() {
    const catalogsConfiguration = {
      incident_types: true,
      inability_types: true,
    };
    this.$q.loading.show();
    this.$store
      .dispatch('catalogs/setCatalogs', { params: catalogsConfiguration })
      .then(() => {
        const { id } = this.$route.params;
        if (id !== undefined) {
          const endpoint = `/api/employees/${id}/edit`
          EmployeeService.edit(endpoint).then((employee) => {
            this.incident.employee = employee
          });
          this.$q.loading.hide();
        }
      });
  },
  methods: {
    store() {
      this.$q.loading.show();
      this.$refs.form.validate().then((valid) => {
        if (valid && this.incident.days.length > 0) {
          const formData = { ...this.incident }
          formData.employee_id = this.incident.employee.id
          const { id } = this.$route.params;
          DataService.store(formData, id).then((res) => {
            if (res.success) {
              notifySuccess();
              this.$router.push(`/employees/${id}/incidents`)
            } else {
              notifyError();
            }
          }).finally(() => {
            this.$q.loading.hide();
          });
        } else {
          notifyError('Llene los campos requeridos y indique al menos una fecha para la incidencia')
          this.$q.loading.hide();
        }
      })
    }
  },
}
</script>
