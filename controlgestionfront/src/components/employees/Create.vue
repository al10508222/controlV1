<template>
  <div>
    <q-card>
      <q-card-section>
        <div class="text-h6">Registrar trabajador</div>
        <br />
        <q-form
          ref="registerForm"
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

          <q-banner inline-actions class="text-white bg-negative q-mb-sm" rounded v-if="hasErrors">
                <div>
                  <span class="text-weight-bold">El fórmulario tiene los siguientes errores:</span>
                  <ul>
                    <li v-for="error in errors" :key="error.id">
                      {{error}}
                    </li>
                  </ul>
                </div>
                <template v-slot:action>
                  <q-btn flat color="white" label="Cerrar" @click="hasErrors = false"/>
                </template>
          </q-banner>

          <q-tab-panels v-model="tab" animated>
            <q-tab-panel name="personal">
             <BasicData />
            </q-tab-panel>

            <q-tab-panel name="address">
              <Addresses />
            </q-tab-panel>

            <q-tab-panel name="professional">
              <div class="text-h6">Datos profesionales</div>
              <ProfessionalData />
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
              <CustomFields />
            </q-tab-panel>
          </q-tab-panels>
          <q-card-actions align="right">
            <q-btn flat @click="$router.push('/')" label="Cancelar" color="primary" />
            <q-btn flat @click="submitEmployee()" label="Guardar" color="primary" />
          </q-card-actions>
        </q-form>
      </q-card-section>
    </q-card>
  </div>
</template>

<script>
import { notifyError, notifySuccess } from 'src/utils/notify';
import CustomFields from 'components/customFields/FormComponent'
import * as CustomFieldsService from 'src/services/CustomFieldsService';
import BasicData from './partials/BasicData';
import Accounts from './partials/Accounts';
import Addresses from './partials/Addresses';
import DigitalFiles from './partials/DigitalFiles';
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
      },
    },
  },
  beforeCreate() {
    this.$store.commit('employee/reset');
  },
  created() {
    const catalogsConfiguration = {
      banks: true,
      countries: true,
      states: true,
      genders: true,
      marital_statuses: true,
      education_levels: true,
      documents_employee: true,
      contracts: true,
      units: true,
      education_statuses: true,
      bank_account_types: true,
      employment_types: true,
      employment_locations: true,
      employment_clients: true,
    };
    this.$q.loading.show();
    CustomFieldsService.index(this.moduleId).then((d) => {
      this.$store.commit('employee/setCustomValues', d.fields)
    })
    this.$store
      .dispatch('catalogs/setCatalogs', { params: catalogsConfiguration })
      .then(() => {
        this.$q.loading.hide();
      });
  },
  mounted() {
  },
  data() {
    return {
      tab: 'personal',
      errors: [],
      hasErrors: false,
      submitting: false,
      moduleId: 1,
    };
  },
  methods: {
    submitEmployee() {
      this.submitting = true;
      this.$refs.registerForm.validate().then((valid) => {
        if (valid) {
          const employeeData = { ...this.employee };
          this.$q.loading.show();
          employeeData.cat_gender_id = employeeData.gender.id;
          employeeData.cat_country_id = employeeData.country
            ? employeeData.country.id
            : '';
          employeeData.cat_marital_status_id = employeeData.marital_status
            ? employeeData.marital_status.id
            : '';
          employeeData.cat_educational_level_id = employeeData.education_level
            ? employeeData.education_level.id
            : '';
          employeeData.cat_state_id = employeeData.state
            ? employeeData.state.id
            : '';
          this.$store.dispatch('employee/save', employeeData).then((res) => {
            this.$q.loading.hide();
            if (res.status === 422) {
              this.errors = res.data.errors
              this.hasErrors = true;
              this.submitting = false;
              notifyError();
            } else if (res.data.success) {
              notifySuccess()
              this.$router.push('/employees');
            } else {
              this.submitting = false;
              notifyError();
            }
          });
        } else {
          this.submitting = false;
        }
      });
    },
  },
};
</script>
