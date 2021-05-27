<template>
<q-card style="width: 100%">
  <q-item>
    <q-item-section avatar>
        <q-icon size="md" name="fas fa-passport"/>
    </q-item-section>
    <q-item-section>
      <q-item-label>Nuevo Modulo del sistema</q-item-label>
      <q-item-label caption>
        Ingrese las siguientos valores
      </q-item-label>
    </q-item-section>
  </q-item>
  <q-separator />
  <div class="q-pa-sm">
    <q-card-section>
      <div class="row q-col-gutter-sm">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <q-input v-model="form.code" square outlined label="Codigo" />
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <q-input v-model="form.description" square outlined label="Descripción" />
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
import * as DataService from 'src/services/admin/catalogs/ModulesService';
import { notifySuccess, notifyError } from 'src/utils/notify';

export default {
  data() {
    return {
      form: {
        code: '',
        description: '',
      }
    };
  },

  methods: {
    store() {
      const form = { ...this.form };
      DataService.store(form).then(() => {
        notifySuccess();
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
