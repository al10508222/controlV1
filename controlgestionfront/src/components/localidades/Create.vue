<template>
<div>
  <q-form ref="localidadesForm" @submit.prevent="() => {}">
    <q-card style="width: 100%">
      <q-item>
        <q-item-section avatar>
            <q-icon size="md" name="fas fa-briefcase"/>
        </q-item-section>
        <q-item-section>
          <q-item-label>Puestos</q-item-label>
          <q-item-label caption>
            Ingrese los siguientes valores
          </q-item-label>
        </q-item-section>
      </q-item>
      <q-separator />
      <div class="q-pa-sm">
        <q-card-section>
          <div class="row q-col-gutter-sm">
            <div class="col-xs-6 col-sm-6 col-md-6 q-mb-md">
              <q-input v-model="form.localidad_nombre" square outlined label="Nombre de Localidad" :rules="[$rules.required($t('requiredInput'))]"/>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 q-mb-md">
              <q-input v-model="form.cp" square outlined label="Código Postal"/>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 q-mb-md">
              <q-select clearable outlined v-model="form.entidad_id" option-value="id" option-label="entidad_nombre" map-options emit-value :options="catalogs.entidades" label="Entidad Federativa" @input="change" :rules="[$rules.required($t('requiredInput'))]"/>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 q-mb-md">
              <q-select clearable outlined v-model="form.entidad_nombre" option-value="id" option-label="entidad_nombre" map-options emit-value :options="catalogs.entidades" label="Entidad Federativa" @input="change" :rules="[$rules.required($t('requiredInput'))]"/>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 q-mb-md">
              <q-select clearable outlined v-model="form.municipio_id" option-value="id" option-label="municipio_nombre" map-options emit-value :options="filteredMunicipios" label="Municipio" :rules="[$rules.required($t('requiredInput'))]"/>
            </div>
          </div>
        </q-card-section>
        <q-card-actions align="right">
          <q-btn flat @click="$router.back()" label="Cancelar" color="primary" v-close-popup />
          <q-btn flat @click="store()" label="Guardar" color="primary" />
        </q-card-actions>
      </div>
    </q-card>
  </q-form>
</div>
</template>

<script>
import * as LocalidadesService from 'src/services/LocalidadesServices';
import { notifySuccess, notifyError } from 'src/utils/notify'

export default {
  data() {
    return {
      form: {
        localidad_nombre: '',
        municipio_id: '',
        municipio_nombre: '',
        entidad_id: '',
        entidad_nombre: ''
      },
      filteredMunicipios: [],
      municipio_id: '',
      filteredEntidades: [],
      id: ''
    };
  },
  created() {
    const catalogsConfiguration = { entidades: true, municipios: true };
    this.$q.loading.show();
    this.$store.dispatch('catalogs/setCatalogs', { params: catalogsConfiguration }).then(() => {
      this.$q.loading.hide();
    });
  },
  methods: {
    store() {
      this.submitting = true
      this.$refs.localidadesForm.validate().then((valid) => {
        if (valid) {
          const form = { ...this.form }
          this.$q.loading.show()
          LocalidadesService.store(form).then(() => {
            notifySuccess()
            this.$router.push('/localidades')
          }).catch((err) => {
            this.submitting = false
            if (err.response.status === 422) {
              err.response.data.forEach((e) => notifyError(e))
            } else {
              notifyError()
            }
          }).finally(() => {
            this.$q.loading.hide()
          })
        } else {
          this.submitting = false
        }
      })
    },
    change(val) {
      this.filteredMunicipios = this.catalogs.municipios.filter((e) => val === e.entidad_id)
      this.filteredEntidades = this.catalogs.entidades.filter((e) => val === e.id)
    },
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
};
</script>

<style>

</style>
