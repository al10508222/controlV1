<template>
<div>
  <q-form ref="VialidadessForm" @submit.prevent="() => {}">
    <q-card style="width: 100%">
      <q-item>
        <q-item-section avatar>
            <q-icon size="md" name="fas fa-briefcase"/>
        </q-item-section>
        <q-item-section>
          <q-item-label>Ver Vialidad</q-item-label>
        </q-item-section>
      </q-item>
      <q-separator />
      <div class="q-pa-sm">
        <q-card-section>
          <div class="row q-col-gutter-sm">
            <div class="col-xs-3 col-sm-3 col-md-3">
              <q-input v-model="form.id" square outlined label="id" :disable="true"/>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3">
              <q-input v-model="form.vialidad_nombre" square outlined label="Nombre Vialidad" :disable="true"/>
            </div>
          </div>
        </q-card-section>
        <q-card-actions align="right">
          <q-btn flat @click="$router.back()" label="Regresar" color="primary" v-close-popup />
        </q-card-actions>
      </div>
    </q-card>
  </q-form>
</div>
</template>

<script>
import * as VialidadesService from 'src/services/VialidadesServices';
import { notifySuccess, notifyError } from 'src/utils/notify';

export default {
  data() {
    return {
      disabled: true,
      form: {
        vialidad_nombre: '',
        id: ''
      },
      filteredTabulators: []
    };
  },
  created() {
    const catalogsConfiguration = { profiles: true };
    const { id } = this.$route.params
    this.$q.loading.show();
    this.$store.dispatch('catalogs/setCatalogs', { params: catalogsConfiguration }).then(() => {
      this.disabled = !this.canShow('vialidades')
      VialidadesService.edit(id).then((data) => {
        this.form = data
        this.form.tipo = this.form.tipo.map((obj) => obj.id, []);
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
      VialidadesService.update(form, id).then(() => {
        notifySuccess();
        this.$router.push('../../vialidades');
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
