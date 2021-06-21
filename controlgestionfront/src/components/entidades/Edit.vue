<template>
<div>
  <q-form ref="EntidadesForm" @submit.prevent="() => {}">
    <q-card style="width: 100%">
      <q-item>
        <q-item-section avatar>
            <q-icon size="md" name="fas fa-briefcase"/>
        </q-item-section>
        <q-item-section>
          <q-item-label>Editar Entidad Federativa</q-item-label>
        </q-item-section>
      </q-item>
      <q-separator />
      <div class="q-pa-sm">
        <q-card-section>
          <div class="row q-col-gutter-sm">
            <div class="col-xs-3 col-sm-3 col-md-3" hidden>
              <q-input v-model="form.ENTIDADFEDERATIVAID" square outlined label="ID"/>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3">
              <q-input v-model="form.ENTIDADFEDERATIVANOMBRE" square outlined label="Nombre Entidad"/>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3">
              <q-input v-model="form.ENTIDADFEDERATIVAABREVIACION" square outlined label="Nombre Corto de Entidad"/>
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
import * as EntidadesService from 'src/services/EntidadesServides';
import { notifySuccess, notifyError } from 'src/utils/notify';

export default {
  data() {
    return {
      disabled: true,
      form: {
        ENTIDADFEDERATIVAID: '',
        ENTIDADFEDERATIVANOMBRE: '',
        ENTIDADFEDERATIVAABREVIACION: ''
      }
    };
  },
  created() {
    const catalogsConfiguration = { profiles: true, entidades: true };
    const { id } = this.$route.params
    this.$q.loading.show();
    this.$store.dispatch('catalogs/setCatalogs', { params: catalogsConfiguration }).then(() => {
      this.disabled = !this.canShow('entidades')
      EntidadesService.edit(id).then((data) => {
        this.form = data
        this.$q.loading.hide();
      }).catch((err) => {
        console.log(err)
        this.$q.loading.hide();
      })
    });
  },
  methods: {
    update() {
      const form = { ...this.form };
      const { id } = this.$route.params
      console.log(this.$route.params)
      EntidadesService.update(form, id).then((data) => {
        console.log(data)
        notifySuccess();
        this.$router.push('../../entidades');
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
