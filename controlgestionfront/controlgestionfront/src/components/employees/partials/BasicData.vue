<template>
  <section>
    <div class="text-h6">Datos de empleado</div>
    <div class="row q-col-gutter-lg q-mb-md">
      <div class="col-xs-6 col-sm-6 col-md-4">
        <q-input
          square
          outlined
          v-model="employee.code"
          maxlength="25"
          label="Código de empleado"
          :readonly="readonly"
          :rules="[(val) => !!val || 'Este campo es requerido']"
          />
      </div>
    </div>
    <div class="text-h6 q-mt-md">Datos personales</div>
    <div class="row q-col-gutter-lg">
      <div class="col-xs-12 col-sm-6 col-md-4">
        <q-input
          square
          outlined
          v-model="employee.name"
          maxlength="50"
          label="Nombre(s)"
          :readonly="readonly"
          :rules="[(val) => !!val || 'Este campo es requerido']"
        />
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4">
        <q-input
          square
          outlined
          v-model="employee.lastname"
          :readonly="readonly"
          maxlength="25"
          label="Primer apellido"
          :rules="[(val) => !!val || 'Este campo es requerido']"
        />
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4">
        <q-input
          square
          outlined
          v-model="employee.second_lastname"
          :readonly="readonly"
          maxlength="25"
          label="Segundo apellido"
          :rules="[(val) => !!val || 'Este campo es requerido']"
        />
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4">
        <q-input
          square
          outlined
          v-model="employee.birthdate"
          label="Fecha de nacimiento"
          :readonly="readonly"
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
                  v-model="employee.birthdate"
                  :readonly="readonly"
                  :options="(date) => date <= todayDateString"
                >
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
          :rules="[(val) => !!val || 'Este campo es requerido']"
          clearable
          outlined
          v-model="employee.gender"
          :readonly="readonly"
          option-value="id"
          option-label="name"
          :options="catalogs.genders"
          label="Género"
        />
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4">
        <q-select
         :readonly="readonly"
          v-model="employee.country"
          standard
          use-input
          input-debounce="0"
          behavior="menu"
          clearable
          outlined
          option-value="id"
          option-label="name"
          :options="CountryOptions"
          label="País de nacimiento"
          @input="updateStates"
          @filter="filterFnCountry"
          @clear="() => {(stateOptions = []), (employee.state = null);}"
         :rules="[(val) => !!val || 'Este campo es requerido']"
        />
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4">
        <q-select
          :loading="loadingStates"
          :disable="StateOptions.length <= 0 || loadingStates"
          clearable
          outlined
          v-model="employee.state"
          use-input
          input-debounce="0"
          option-value="id"
          option-label="name"
          :readonly="readonly"
          :options="StateOptions"
          label="Estado"
          @filter="filterFnState"
          :rules="[(val) => !!val || 'Este campo es requerido']"
        />
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4">
        <q-input
          square
          outlined
          v-model="employee.rfc"
          :readonly="readonly"
          maxlength="13"
          label="RFC"
          :rules="[(val) => !!val || 'Este campo es requerido']"
          mask="XXXX######XX#"
        />
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4">
        <q-input
          square
          outlined
          v-model="employee.curp"
          :readonly="readonly"
          maxlength="18"
          label="CURP"
          :rules="[
            $rules.required($i18n.t('requiredInput')),
            this.curpValidate(employee.curp, $t('minLengthCurp'))
          ]"
          mask="XXXX######XXXXXX##"
        />
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4">
        <q-input
          square
          outlined
          v-model="employee.nss"
          :readonly="readonly"
          maxlength="16"
          label="NSS"
          :rules="[(val) => !!val || 'Este campo es requerido']"
          mask="##-##-##-####-#"
          unmasked-value
        />
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4">
        <q-select
          :rules="[(val) => !!val || 'Este campo es requerido']"
          clearable
          outlined
          use-input
          v-model="employee.marital_status"
          :readonly="readonly"
          option-value="id"
          option-label="name"
          :options="catalogs.marital_statuses"
          label="Estado civil"
          @filter="filterFn"
        />
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4">
        <q-select
          :rules="[(val) => !!val || 'Este campo es requerido']"
          v-model="employee.education_level"
          standard
          use-input
          input-debounce="0"
          behaviour="menu"
          :readonly="readonly"
          clearable
          outlined
          option-value="id"
          option-label="name"
          :options="catalogs.education_levels"
          label="Nivel de estudios"
        />
      </div>
    </div>

    <div class="text-h6 q-mt-md">Datos de contacto</div>
    <div class="row q-col-gutter-lg">
      <div class="col-xs-12 col-sm-6 col-md-4">
        <q-input
          square
          outlined
          v-model="employee.email"
          :readonly="readonly"
          maxlength="50"
          label="Correo electrónico"
          :rules="[(val) => !!val || 'El correo de contacto es requerido y debe ser un email válido', isValidEmail]"
        />
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4">
        <q-input
          square
          outlined
          v-model="employee.telephone"
          :readonly="readonly"
          maxlength="16"
          label="Teléfono"
          mask="(###) ### - ####"
        />
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4">
        <q-input
          square
          outlined
          v-model="employee.cellphone"
          :readonly="readonly"
          maxlength="16"
          label="Móvil"
          :rules="[(val) => !!val || 'Este campo es requerido']"
          mask="(###) ### - ####"
        />
      </div>
    </div>
    <div class="text-h6 q-mt-md">Contacto de Emergencia</div>
    <div class="row q-col-gutter-lg">
      <div class="col-xs-12 col-sm-6 col-md-4">
        <q-input
          :readonly="readonly"
          square
          outlined v-model="employee.contact.name" maxlength="40" label="Nombre" />
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4">
        <q-input
          square
          outlined
          :readonly="readonly"
          v-model="employee.contact.phone"
          maxlength="16"
          label="Número de emergencia"
          mask="(###) ### - ####"
        />
      </div>
    </div>
  </section>
</template>

<script>
import * as CatalogService from 'src/services/admin/CatalogService';
import { curpValidate } from 'src/utils/validations'
import { utils } from '../../../mixins/utils';

export default {
  props: ['readonly'],
  mixins: [utils],
  data() {
    return {
      CountryOptions: [],
      StateOptions: [],
      InitialStateOptions: [],
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
      },
    },
  },
  created() {
    this.maritalOptions = this.catalogs.marital_statuses;
  },
  methods: {
    curpValidate,
    isValidEmail(val) {
      const emailPattern = /^(?=[a-zA-Z0-9@._%+-]{6,254}$)[a-zA-Z0-9._%+-]{1,64}@(?:[a-zA-Z0-9-]{1,63}\.){1,8}[a-zA-Z]{2,63}$/;
      return emailPattern.test(val) || 'Debe ingresar un correo válido';
    },
    updateStates(country) {
      if (country != null) {
        this.loadingStates = true;
        CatalogService.getStates(country.id).then((states) => {
          this.InitialStateOptions = states;
          this.StateOptions = this.InitialStateOptions;
          this.loadingStates = false;
        });
      }
    },
    filterFnCountry(val, update) {
      update(() => {
        const needle = val.toLowerCase();
        this.CountryOptions = this.catalogs.countries.filter(
          (v) => v.name.toLowerCase().indexOf(needle) > -1
        );
      });
    },
    filterFnState(val, update) {
      update(() => {
        const needle = val.toString().toLowerCase();
        this.StateOptions = this.InitialStateOptions.filter(
          (v) => v.name.toString().toLowerCase().indexOf(needle) > -1
        );
        return this.StateOptions;
      });
    },
    filterFn(val, update) {
      update(() => {
        const needle = val.toString().toLowerCase();
        this.options = this.catalogs.marital_statuses.filter(
          (v) => v.name.toString().toLowerCase().indexOf(needle) > -1
        );
        return this.options;
      });
    },
  },
};
</script>

<style></style>
