<template>
<q-card style="width: 100%">
  <q-item>
    <q-item-section avatar>
        <q-icon size="md" name="fas fa-check"/>
    </q-item-section>
    <q-item-section>
      <q-item-label>Agregar Nuevo Registro</q-item-label>
      <q-item-label caption>
        Ingrese las siguientes valores
      </q-item-label>
    </q-item-section>
  </q-item>
  <q-separator />
  <div class="q-pa-sm">
    <q-card-section>
      <q-form ref="form" @submit.prevent="() => {}">
        <div class="row q-col-gutter-sm">
          <div class="col-xs-12 col-sm-12 col-md-4">
            <q-input
              :rules="[$rules.required($i18n.t('requiredInput'))]"
              v-model="form.ENTIDADFEDERATIVANOMBRE"
              square
              outlined
              label="Nombre de la Entidad Federativa" type="text"/>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-4">
            <q-input
              :rules="[$rules.required($i18n.t('requiredInput'))]"
              v-model="form.ENTIDADFEDERATIVAABREVIACION"
              square
              outlined
              label="Nombre Corto de la Entidad Federativa" type="text"/>
          </div>
        </div>
      </q-form>
    </q-card-section>
    <q-card-actions align="right">
      <q-btn flat @click="$router.back()" label="Cancelar" color="primary" v-close-popup />
      <q-btn flat @click="store()" label="Guardar" color="primary" />
    </q-card-actions>
  </div>
</q-card>
</template>

<script>
import { notifySuccess } from 'src/utils/notify';
import * as EntidadesService from 'src/services/EntidadesServides';

export default {
  data() {
    return {
      form: {
        ENTIDADFEDERATIVANOMBRE: '',
        ENTIDADFEDERATIVAABREVIACION: ''
      }
    };
  },
  created() {
    const catalogsConfiguration = { profiles: true, entidades_projects: true };
    this.$q.loading.show();
    this.$store.dispatch('catalogs/setCatalogs', { params: catalogsConfiguration }).then(() => {
      this.$q.loading.hide();
    });
  },
  methods: {
    store() {
      this.$refs.form.validate().then((valid) => {
        if (valid) {
          const form = { ...this.form };
          EntidadesService.store(form).then(() => {
            notifySuccess();
            this.$router.push('/entidades');
          }).catch((err) => {
            console.log(err)
          })
        }
      })
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
