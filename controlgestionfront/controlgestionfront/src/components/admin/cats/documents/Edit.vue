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
          <q-input
            v-model="form.name" square outlined label="Nombre" :disable="disabled"/>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <q-input v-model="form.observations" square outlined label="Observaciones" :disable="disabled"/>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <q-checkbox v-model="form.is_required" label="¿Es obligatorio?" :disable="disabled"/>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <q-checkbox v-model="form.is_visible" label="¿Es visible para todos?" :disable="disabled"/>
      </div>
      <div v-if="!form.is_visible" class="col-xs-12 col-sm-12 col-md-12">
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
          :disable="disabled"
        />
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
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
          :disable="disabled"
        />
      </div>
      </div>
    </q-card-section>
    <q-card-actions align="right">
      <q-btn flat @click="$router.back()" label="Cancelar" color="primary" v-close-popup />
      <q-btn flat @click="update()" label="Guardar" color="primary" v-if="canEdit"/>
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
        is_visible: false,
        contractTypes: [],
        cat_module_id: null,
      }
    };
  },
  // beforeCreate() {
  //   console.log('ahora', this.$store.state.user.information.permissions)
  //   this.disabled = !this.canShow('catalogs-edit')
  // },
  created() {
    const catalogsConfiguration = { contracts: true, cat_modules: true, };
    const { id } = this.$route.params
    this.$q.loading.show();
    this.$store.dispatch('catalogs/setCatalogs', { params: catalogsConfiguration }).then(() => {
      DataService.edit(id).then((data) => {
        this.form = data;
        data.contract_types.forEach((obj) => {
          this.form.contractTypes.push(obj.contract.id);
        });
        this.$q.loading.hide();
      }).catch(() => {
        this.$q.loading.hide();
      })
      this.$q.loading.hide();
    });
  },
  methods: {
    update() {
      const form = { ...this.form };
      const { id } = this.$route.params
      DataService.update(form, id).then(() => {
        notifySuccess('Se ha actualizado el documento correctamente');
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
    disabled: {
      get() { return !this.canShow('catalogs-edit') }
    },
    canEdit() {
      return !this.disabled;
    },
  },
};
</script>

<style>

</style>
