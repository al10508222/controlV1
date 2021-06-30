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
              v-model="catalogs.subtipologia"
              square
              outlined
              :disable="true"
              label="ID INTERNO" type="text"/>
          </div>
          <div class="col-xs-4 col-sm-4 col-md-4">
            <q-input
              :rules="[$rules.required($i18n.t('requiredInput'))]"
              v-model="form.TIPOLOGIAID"
              square
              outlined
              label="Abreviatura Tipología" type="text"/>
          </div>
          <div class="col-xs-4 col-sm-4 col-md-4">
            <q-input
              :rules="[$rules.required($i18n.t('requiredInput'))]"
              v-model="form.SUBTIPOLOGIAID"
              square
              outlined
              label="Abreviatura SubTipología" type="text"/>
          </div>
          <div class="col-xs-4 col-sm-4 col-md-4">
            <q-input
              :rules="[$rules.required($i18n.t('requiredInput'))]"
              v-model="form.SUBTIPOLOGIANOMBRE"
              square
              outlined
              label="Nombre" type="text"/>
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
import * as SubtipologiaServices from 'src/services/SubtipologiaServices';

export default {
  data() {
    return {
      form: {
        TIPOLOGIAID: '',
        SUBTIPOLOGIAID: '',
        SUBTIPOLOGIANOMBRE: '',
      },
    };
  },
  created() {
    const catalogsConfiguration = { profiles: true, subtipologia: true };
    this.$q.loading.show();
    this.$store.dispatch('catalogs/setCatalogs', { params: catalogsConfiguration }).then(() => {
      console.log(this.catalogs)
      this.$q.loading.hide();
    });
  },
  methods: {
    store() {
      this.$refs.form.validate().then((valid) => {
        if (valid) {
          const form = { ...this.form };
          SubtipologiaServices.store(form).then(() => {
            notifySuccess();
            this.$router.push('/subtipologia');
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
