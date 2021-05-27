<template>
<div>
    <div>
      <q-card>
        <q-card-section>
        <div class="text-h6">Datos personales</div>
        <div class="q-pa-md">
          <div class="q-gutter-sm">
            <q-checkbox v-model="form.personalInformation.code" label="Código de empleado" color="teal" />
            <q-checkbox v-model="form.personalInformation.name" label="Nombre" color="teal" />
            <q-checkbox v-model="form.personalInformation.lastname" label="Primer apellido" color="teal" />
            <q-checkbox v-model="form.personalInformation.second_lastname" label="Segundo apellido" color="teal" />
            <q-checkbox v-model="form.personalInformation.rfc" label="RFC" color="teal" />
            <q-checkbox v-model="form.personalInformation.curp" label="Curp" color="teal" />
            <q-checkbox v-model="form.personalInformation.nss" label="Nss" color="teal" />
            <q-checkbox v-model="form.personalInformation.cat_gender_id" label="Género" color="teal" />
            <q-checkbox v-model="form.personalInformation.cat_marital_status_id" label="Estado civil" color="teal" />
            <q-checkbox v-model="form.personalInformation.cat_country_id" label="País de nacimiento" color="teal" />
            <q-checkbox v-model="form.personalInformation.cat_state_id" label="Estado" color="teal" />
            <q-checkbox v-model="form.personalInformation.birthdate" label="Fecha de nacimiento" color="teal" />
            <q-checkbox v-model="form.personalInformation.cat_educational_level_id" label="Nivel de estudios" color="teal" />
            <div class="text-h6">Datos de contacto</div>
            <q-checkbox v-model="form.personalInformation.email" label="Correo electronico" color="teal" />
            <q-checkbox v-model="form.personalInformation.telephone" label="Teléfono" color="teal" />
            <q-checkbox v-model="form.personalInformation.cellphone" label="Móvil" color="teal" />
            <div class="text-h6">Contacto de emergencia</div>
            <q-checkbox v-model="form.personalEmergency.contact_name" label="Nombre" color="teal" />
            <q-checkbox v-model="form.personalEmergency.contact_phone" label="Número de emergencia" color="teal" />
          </div>
        </div>
        <hr>
        <div class="text-h6">Direcciones</div>
        <div class="q-pa-md">
          <div class="q-gutter-sm">
            <q-checkbox v-model="form.personalAdress.state" label="Estado" color="teal" />
            <q-checkbox v-model="form.personalAdress.town" label="Municipio/Alcaldía" color="teal" />
            <q-checkbox v-model="form.personalAdress.neighborhood" label="Colonia" color="teal" />
            <q-checkbox v-model="form.personalAdress.city" label="Ciudad" color="teal" />
            <q-checkbox v-model="form.personalAdress.zipcode" label="CP" color="teal" />
            <q-checkbox v-model="form.personalAdress.street" label="Calle" color="teal" />
            <q-checkbox v-model="form.personalAdress.ext_num" label="Número exterior" color="teal" />
            <q-checkbox v-model="form.personalAdress.int_num" label="Número interior" color="teal" />
          </div>
        </div>
        <hr>
         <div class="text-h6">Datos profesionales</div>
          <div class="q-pa-md">
          <div class="q-gutter-sm">
            <div class="text-h6">Experiencia</div>
            <q-checkbox v-model="form.personalProfessional.company" label="Empresa" color="teal" />
            <q-checkbox v-model="form.personalProfessional.position" label="Cargo" color="teal" />
            <q-checkbox v-model="form.personalProfessional.start_date" label="Fecha de inicio" color="teal" />
            <q-checkbox v-model="form.personalProfessional.end_date" label="Fecha de finalización" color="teal" />
            <q-checkbox v-model="form.personalProfessional.description" label="Descripción" color="teal" />
            <q-checkbox v-model="form.personalProfessional.achievements" label="Logros" color="teal" />
            <div class="text-h6">Educación</div>
            <q-checkbox v-model="form.personalEducation.school" label="Escuela" color="teal" />
            <q-checkbox v-model="form.personalEducation.title" label="Titulación" color="teal" />
            <q-checkbox v-model="form.personalEducation.education_status" label="Situación actual" color="teal" />
            <q-checkbox v-model="form.personalEducation.start_date" label="Fecha de inicio" color="teal" />
            <q-checkbox v-model="form.personalEducation.end_date" label="Fecha de finalización" color="teal" />
            <q-checkbox v-model="form.personalEducation.description" label="Descripción" color="teal" />
            <div class="text-h6">Certificaciones</div>
            <q-checkbox v-model="form.personalCertifications.entify" label="Emisor" color="teal" />
            <q-checkbox v-model="form.personalCertifications.name" label="Nombre de la certificación" color="teal" />
            <q-checkbox v-model="form.personalCertifications.description" label="Descripción" color="teal" />
            <q-checkbox v-model="form.personalCertifications.start_date" label="Fecha de inicio" color="teal" />
            <q-checkbox v-model="form.personalCertifications.end_date" label="Fecha de finalización" color="teal" />
            <q-checkbox v-model="form.personalCertifications.credential_id" label="ID de la credencial" color="teal" />
            <q-checkbox v-model="form.personalCertifications.url" label="URL" color="teal" />
            <div class="text-h6">Habilidades</div>
            <q-checkbox v-model="form.personalInformation.skills" label="Habilidades" color="teal" />
          </div>
        </div>
        <hr>
        <div class="text-h6">Datos bancarios</div>
          <div class="q-pa-md">
           <div class="q-gutter-sm">
            <q-checkbox v-model="form.personalBank.cat_bank_account_type" label="Tipo de cuenta" color="teal" />
             <q-checkbox v-model="form.personalBank.clabe" label="Clabe" color="teal" />
             <q-checkbox v-model="form.personalBank.cat_bank_id" label="Banco" color="teal" />
          </div>
        </div>
        <hr>
         <div class="text-h6">Movimientos laborales</div>
          <div class="q-pa-md">
           <div class="q-gutter-sm">
            <q-checkbox v-model="form.personalLabor.cat_employment_type_id" label="Tipo de movimiento" color="teal" />
             <q-checkbox v-model="form.personalLabor.date" label="Fecha de aplicación de movimiento" color="teal" />
             <q-checkbox v-model="form.personalLabor.cat_contract_type_id" label="Tipo de contratación" color="teal" />
             <q-checkbox v-model="form.personalLabor.cat_unit_id" label="Unidad administrativa" color="teal" />
             <q-checkbox v-model="form.personalLabor.position_id" label="Puesto" color="teal" />
             <q-checkbox v-model="form.personalLabor.cat_employment_location_id" label="Ubicación física" color="teal" />
             <q-checkbox v-model="form.personalLabor.has_kit" label="Kit de ingreso inicial" color="teal" />
          </div>
        </div>
        <hr>
         <div class="text-h6">Campos Personalizados</div>
          <div class="q-pa-md">
           <div class="q-gutter-sm" v-if="dynamicForm !== false">
            <div v-for="(item, key) in Object.keys(dynamicForm)" :key="key">
              <q-checkbox v-model="dynamicForm[item]" :label="filterId(item)" color="teal" />
            </div>
          </div>
          <div v-else>
            Cargando elementos...
          </div>
        </div>
       </q-card-section>
    </q-card>

  </div>
  <br>
    <div style="padding-bottom: 30px;">
      <q-btn :ripple="false" class="float-right" color="primary" label="Descargar reporte" @click="downloadReport()" no-caps icon="fas fa-file-excel" />
    </div>
  </div>
</template>

<script>
/* eslint import/newline-after-import: "off" */
import Vue from 'vue';
import { downloadEmployeeReport, getCatalogEmployeeReport } from 'src/services/EmployeeService'
import { modelPersonalInformation, modelPersonalEmergency, modelPersonalAdress, modelPersonalProfessional, modelPersonalEducation, modelPersonalCertifications, modelPersonalBank, modelPersonalLabor } from './ModelForm'

export default {
  data() {
    return {
      catalog: {
        cat_custom_field: []
      },
      dynamicForm: true,
      form: {
        ...modelPersonalInformation(),
        ...modelPersonalEmergency(),
        ...modelPersonalAdress(),
        ...modelPersonalProfessional(),
        ...modelPersonalEducation(),
        ...modelPersonalCertifications(),
        ...modelPersonalBank(),
        ...modelPersonalLabor(),
      },
    }
  },

  created() {
    this.initServices();
  },

  mounted() {

  },

  methods: {
    downloadReport() {
      this.$q.loading.show();
      const personalInformation = Object.keys(this.form.personalInformation).filter((item) => this.form.personalInformation[item] === true && this.form.personalInformation[item])
      const personalEmergency = Object.keys(this.form.personalEmergency).filter((item) => this.form.personalEmergency[item] === true && this.form.personalEmergency[item])
      const personalAdress = Object.keys(this.form.personalAdress).filter((item) => this.form.personalAdress[item] === true && this.form.personalAdress[item])
      const personalProfessional = Object.keys(this.form.personalProfessional).filter((item) => this.form.personalProfessional[item] === true && this.form.personalProfessional[item])
      const personalEducation = Object.keys(this.form.personalEducation).filter((item) => this.form.personalEducation[item] === true && this.form.personalEducation[item])
      const personalCertifications = Object.keys(this.form.personalCertifications).filter((item) => this.form.personalCertifications[item] === true && this.form.personalCertifications[item])
      const personalBank = Object.keys(this.form.personalBank).filter((item) => this.form.personalBank[item] === true && this.form.personalBank[item])
      const personalLabor = Object.keys(this.form.personalLabor).filter((item) => this.form.personalLabor[item] === true && this.form.personalLabor[item])
      const dynamicForm = Object.keys(this.dynamicForm).filter((item) => this.dynamicForm[item] === true && this.dynamicForm[item])
      const payload = {
        personalInformation,
        personalEmergency,
        personalAdress,
        personalProfessional,
        personalEducation,
        personalCertifications,
        personalBank,
        personalLabor,
        dynamicForm
      }
      downloadEmployeeReport(payload).then((response) => {
        const blob = new Blob([response.data], { type: response.data.type })
        const linkUrl = window.URL.createObjectURL(blob)
        const link = document.createElement('a')
        link.href = linkUrl
        const title = 'Reporte.pdf';
        link.setAttribute('download', title)
        document.body.appendChild(link)
        link.click()

        this.$q.loading.hide();
      }).finally(() => {
        this.$q.loading.hide();
      });
    },
    filterId(id) {
      if (!id) return '';
      const tmp = parseInt(id, 10);
      const { name } = this.catalog.cat_custom_field.find((item) => item.id === tmp);
      return name;
    },
    async initServices() {
      try {
        const { data } = await getCatalogEmployeeReport();
        this.catalog = data.catalog;
        this.dynamicForm = {};
        this.catalog.cat_custom_field.forEach((item) => {
          Vue.set(this.dynamicForm, item.id, false)
        });
      } catch (error) {
        console.log(error);
      }
    }
  }
}
</script>
