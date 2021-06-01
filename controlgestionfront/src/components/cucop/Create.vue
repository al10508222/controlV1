<template>
<q-card style="width: 100%">
  <q-item>
    <q-item-section avatar>
        <q-icon size="md" name="fas fa-check"/>
    </q-item-section>
    <q-item-section>
      <q-item-label>Agregar Cucop</q-item-label>
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
              v-model="form.tipo"
              square
              outlined
              label="Tipo" type="number"/>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-4">
            <q-input
              :rules="[$rules.required($i18n.t('requiredInput'))]"
              v-model="form.clave_cucop"
              square
              outlined
              label="Clave CUCoP" type="number"/>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-4">
            <q-input
              :rules="[$rules.required($i18n.t('requiredInput'))]"
              v-model="form.clave_cucop2"
              square
              outlined
              label="Clave CUCoP +" type="number"/>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-4">
            <q-input
              :rules="[$rules.required($i18n.t('requiredInput'))]"
              v-model="form.descripcion"
              square
              outlined
              label="Descripción"/>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-2">
            <q-input
              :rules="[$rules.required($i18n.t('requiredInput'))]"
              v-model="form.partida_especifica"
              square
              outlined
              label="Partida específica"/>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-2">
            <q-input
              :rules="[$rules.required($i18n.t('requiredInput'))]"
              v-model="form.cabm"
              square
              outlined
              label="C.A.B.M."/>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-2">
            <q-input
              :rules="[$rules.required($i18n.t('requiredInput'))]"
              v-model="form.unidad_medida"
              square
              outlined
              label="Unidad de medida"/>
          </div>
            <div class="col-xs-12 col-sm-12 col-md-2">
            <q-input
              :rules="[$rules.required($i18n.t('requiredInput'))]"
              v-model="form.nivel"
              square
              outlined
              label="Nivel" type="number"/>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-4">
            <q-input
              :rules="[$rules.required($i18n.t('requiredInput'))]"
              v-model="form.tipo_contratacion"
              square
              outlined
              label="Tipo de contratación"/>
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
import * as CucopServices from 'src/services/CucopServices';

export default {
  data() {
    return {
      form: {
        tipo: '',
        clave_cucop: '',
        clave_cucop2: '',
        descripcion: '',
        partida_especifica: '',
        cabm: '',
        unidad_medida: '',
        nivel: '',
        tipo_contratacion: ''
      }
    };
  },
  created() {
    const catalogsConfiguration = { profiles: true, Cucop_projects: true };
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
          CucopServices.store(form).then(() => {
            notifySuccess();
            this.$router.push('/cucop');
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
