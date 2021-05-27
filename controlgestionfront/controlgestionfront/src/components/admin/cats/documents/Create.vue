<template>
<q-card style="width: 100%">
  <q-item>
    <q-item-section avatar>
        <q-icon size="md" name="fas fa-passport"/>
    </q-item-section>
    <q-item-section>
      <q-item-label>Agregar documento</q-item-label>
      <q-item-label caption>
        Ingrese los siguientes valores
      </q-item-label>
    </q-item-section>
  </q-item>
  <q-separator />
  <div class="q-pa-sm">
    <q-card-section>
      <div class="row q-col-gutter-sm">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <q-input v-model="form.name" square outlined label="Nombre" />
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <q-input v-model="form.observations" square outlined label="Observaciones" />
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <q-checkbox v-model="form.is_required" label="¿Es obligatorio?" />
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <q-checkbox v-model="form.is_visible_for_all" label="¿Es visible para todos?" />
      </div>
      <div v-if="!form.is_visible_for_all" class="col-xs-12 col-sm-12 col-md-12">
        <q-select
          label="Filtrar por tipo de contrato"
          outlined
          map-options
          emit-value
          v-model="form.contractTypes"
          option-value="id"
          option-label="name"
          :options="catalogs.contracts"
          use-input
          use-chips
          multiple
          hide-dropdown-icon
          input-debounce="0"
        />
      </div>
       <div v-if="!form.is_visible_for_all" class="col-xs-12 col-sm-12 col-md-12">
        <q-select
          label="Módulo"
          outlined
          map-options
          emit-value
          v-model="form.cat_module_id"
          option-value="id"
          option-label="name"
          :options="catalogs.cat_modules"
          use-input
          hide-dropdown-icon
          input-debounce="0"
        />
      </div>
      </div>
    </q-card-section>
    <q-card-actions align="right">
      <q-btn flat @click="$router.back()" label="Cancelar" color="primary" v-close-popup />
      <q-btn flat @click="store()" label="Guardar" color="primary" />
    </q-card-actions>
  </div>
</q-card>
</template>

<script>
import * as DataService from 'src/services/admin/catalogs/DocumentService';
import { notifySuccess, notifyError } from 'src/utils/notify'

export default {
  data() {
    return {
      form: {
        name: '',
        observations: '',
        is_required: false,
        is_visible_for_all: false,
        contractTypes: []
      }
    };
  },
  created() {
    const catalogsConfiguration = { contracts: true, cat_modules: true, };
    this.$q.loading.show();
    this.$store.dispatch('catalogs/setCatalogs', { params: catalogsConfiguration }).then(() => {
      this.$q.loading.hide();
    });
  },
  methods: {
    store() {
      const form = { ...this.form };
      DataService.store(form).then(() => {
        notifySuccess('Se ha creado el documento correctamente');
        this.$router.push('/admin/cat/documents');
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

<style>

</style>
