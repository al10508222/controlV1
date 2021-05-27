<template>
  <div>
    <q-card>
      <q-card-section>
        <div class="text-h6">Editar trabajador</div>
        <br />
        <q-form
          ref="registerForm"
          @submit.prevent="() => {}"
          class="q-gutter-lg"
        >
          <q-tabs
            v-model="tab"
            dense
            class="text-grey"
            active-color="primary"
            indicator-color="primary"
            align="justify"
            narrow-indicator
          >
            <q-tab name="personal" label="Datos personales" />
            <q-tab name="address" label="Direcciones" />
            <q-tab name="professional" label="Datos profesionales" />
            <q-tab name="bank" label="Datos bancarios" />
            <q-tab name="digital-record" label="Expediente digital" />
            <q-tab name="job" label="Movimientos laborales" />
            <q-tab name="custom-fields" label="Campos personalizados" />
          </q-tabs>

          <q-separator />

          <q-tab-panels v-model="tab" animated>
            <q-tab-panel name="personal">
              <div class="text-h6">Datos personales</div>
              <BasicData :readonly="!canEdit"/>
            </q-tab-panel>

            <q-tab-panel name="address">
              <Addresses :readonly="!canEdit"/>
            </q-tab-panel>

            <q-tab-panel name="professional">
              <div class="text-h6">Datos profesionales</div>
              <ProfessionalData :readonly="!canEdit" />
            </q-tab-panel>

            <q-tab-panel name="bank">
              <Accounts />
            </q-tab-panel>

            <q-tab-panel name="digital-record">
              <div class="text-h6">Expediente digital</div>
              <DigitalFiles />
            </q-tab-panel>
            <q-tab-panel name="job">
              <EmploymentMovements />
            </q-tab-panel>

            <q-tab-panel name="custom-fields">
              <CustomFields :module-id="moduleId" />
            </q-tab-panel>
          </q-tab-panels>
          <q-card-actions align="right">
            <q-btn flat @click="$router.push('/')" label="Cancelar" color="primary" />
            <q-btn flat @click="updateEmployee()" label="Guardar" color="primary" v-if="canCreate && canEdit" />
          </q-card-actions>
        </q-form>
      </q-card-section>
    </q-card>
  </div>
</template>

<script>
import { notifyError, notifySuccess } from 'src/utils/notify';
import CustomFields from 'components/customFields/FormComponent'
import BasicData from './partials/BasicData';
import Accounts from './partials/Accounts';
import Addresses from './partials/Addresses';
import DigitalFiles from './partials/DigitalFilesEdit';
import ProfessionalData from './partials/ProfessionalData';
import EmploymentMovements from './partials/EmploymentMovements';

export default {
  components: {
    BasicData,
    Accounts,
    Addresses,
    DigitalFiles,
    ProfessionalData,
    EmploymentMovements,
    CustomFields,
  },
  data() {
    return {
      tab: 'personal',
      submitting: false,
      moduleId: 1,
    };
  },
  computed: {
    canEdit: {
      get() {
        return this.canShow('employee-edit');
      }
    },
    canCreate: {
      get() {
        return this.canShow('employee-create');
      }
    },
    employee: {
      get() {
        return this.$store.state.employee;
      },
    },
    documents: {
      get() {
        return this.$store.state.employee.documents;
      },
      set(val) {
        this.$store.commit('employee/updateDocuments', val);
      },
    },
    catalogs: {
      get() {
        return this.$store.state.catalogs;
      },
    },
  },
  mounted() {
    const catalogsConfiguration = {
      banks: true,
      countries: true,
      states: true,
      genders: true,
      marital_statuses: true,
      education_statuses: true,
      documents: true,
      contracts: true,
      units: true,
      documents_employee: true,
      education_levels: true,
      bank_account_types: true,
      employment_types: true,
      employment_locations: true,
      employment_clients: true,
    };
    const { id } = this.$route.params;
    this.$q.loading.show();
    this.$store
      .dispatch('catalogs/setCatalogs', { params: catalogsConfiguration })
      .then(() => {
        this.$store
          .dispatch('employee/edit', { params: id })
          .then((res) => {
            console.log(res);
          })
          .finally(() => {
            this.$q.loading.hide();
          });
      });
  },
  methods: {
    updateEmployee() {
      const employeeData = { ...this.employee };
      const { id } = this.$route.params;
      this.submitting = true;
      this.$refs.registerForm
        .validate()
        .then((valid) => {
          if (valid) {
            this.$q.loading.show();
            employeeData.id = id;
            employeeData.cat_gender_id = employeeData.gender.id;
            employeeData.cat_country_id = employeeData.country.id;
            employeeData.cat_marital_status_id = employeeData.marital_status.id;
            employeeData.cat_educational_level_id = employeeData.education_level.id;
            employeeData.cat_state_id = employeeData.state.id;

            this.$store
              .dispatch('employee/update', employeeData)
              .then((res) => {
                this.$q.loading.hide();

                if (res.status === 422) {
                  this.submitting = false;
                  notifyError('Los datos del formulario no están completos')
                } else if (res.data.success) {
                  notifySuccess()
                  this.$router.push('/employees');
                } else {
                  notifyError('Ha ocurrido un error al tratar de guardar al empleado.')
                }
              });
          } else {
            this.submitting = false;
          }
        })
        .catch((e) => {
          console.log(e);
          notifyError('Complete los datos básicos del empleado')
          this.submitting = false;
          this.$q.loading.hide();
        });
    },
  },
};
</script>
