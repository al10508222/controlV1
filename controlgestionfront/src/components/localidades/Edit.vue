<template>
<div>
  <q-form ref="LocalidadsForm" @submit.prevent="() => {}">
    <q-card style="width: 100%">
      <q-item>
        <q-item-section avatar>
            <q-icon size="md" name="fas fa-briefcase"/>
        </q-item-section>
        <q-item-section>
          <q-item-label>Editar Localidad</q-item-label>
        </q-item-section>
      </q-item>
      <q-separator />
      <div class="q-pa-sm">
        <q-card-section>
          <div class="row q-col-gutter-sm">
            <div class="col-xs-3 col-sm-3 col-md-3" hidden>
              <q-input v-model="form.id" square outlined label="id"/>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
              <q-input v-model="form.entidad_nombre" square outlined :disable="true" label="Nombre Entidad Federativa (No modificable)"/>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
              <q-input v-model="form.municipio_nombre" square outlined :disable="true" label="Nombre Municipio (No modificable)"/>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
              <q-input v-model="form.localidad_id" square outlined label="# Localidad"/>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-5">
              <q-input v-model="form.localidad_nombre" square outlined label="Nombre Localidad"/>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-5">
              <q-input v-model="form.cp" square outlined :disable="true" label="Código Postal"/>
            </div>
          </div>
        </q-card-section>
        <q-card-actions align="right">
          <q-btn flat @click="$router.back()" label="Regresar" color="primary" v-close-popup />
          <q-btn flat @click="update()" label="Guardar" color="primary" v-if="disabled"/>
        </q-card-actions>
      </div>
    </q-card>
  </q-form>
</div>
</template>

<script>
import * as LocalidadesService from 'src/services/LocalidadesServices';
import { notifySuccess, notifyError } from 'src/utils/notify';

export default {
  data() {
    return {
      disabled: true,
      form: {
        entidad_id: '',
        municipio_nombre: '',
        id: '',
        consecutivo: ''
      },
      filteredTabulators: [],
      model: null,
      options: []
    };
  },
  created() {
    const catalogsConfiguration = { profiles: true };
    const { id } = this.$route.params
    this.$q.loading.show();
    this.$store.dispatch('catalogs/setCatalogs', { params: catalogsConfiguration }).then(() => {
      this.disabled = !this.canShow('localidades')
      LocalidadesService.edit(id).then((data) => {
        this.form = data
        this.form.id = this.form.id.map((obj) => obj.id, []);
        this.$q.loading.hide();
      }).catch(() => {
        this.$q.loading.hide();
      })
    });
  },
  methods: {
    update() {
      const form = { ...this.form };
      const { id } = this.$route.params
      LocalidadesService.update(form, id).then(() => {
        notifySuccess();
        this.$router.push('../../localidades');
      }).catch((err) => {
        notifyError(err)
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
