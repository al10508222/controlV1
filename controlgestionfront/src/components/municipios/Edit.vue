<template>
<div>
  <q-form ref="MunicipiosForm" @submit.prevent="() => {}">
    <q-card style="width: 100%">
      <q-item>
        <q-item-section avatar>
            <q-icon size="md" name="fas fa-briefcase"/>
        </q-item-section>
        <q-item-section>
          <q-item-label>Editar Municipio</q-item-label>
        </q-item-section>
      </q-item>
      <q-separator />
      <div class="q-pa-sm">
        <q-card-section>
          <div class="row q-col-gutter-sm">
            <div class="col-xs-3 col-sm-3 col-md-3" hidden>
              <q-input v-model="form.id" square outlined label="id"/>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3">
              <q-select outlined v-model="model" :options="options" label="Filled" />
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3">
              <q-input v-model="form.municipio_nombre" square outlined label="Nombre Municipio"/>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3">
              <q-input v-model="form.consecutivo" square outlined label="# Municipio"/>
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
import * as MunicipiosService from 'src/services/MunicipiosServices';
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
      this.disabled = !this.canShow('Municipios')
      MunicipiosService.edit(id).then((data) => {
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
      MunicipiosService.update(form, id).then(() => {
        notifySuccess();
        this.$router.push('../../municipios');
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
