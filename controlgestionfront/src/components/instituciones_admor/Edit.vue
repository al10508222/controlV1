<template>
<div>
  <q-form ref="tipologiaForm" @submit.prevent="() => {}">
    <q-card style="width: 100%">
      <q-item>
        <q-item-section avatar>
            <q-icon size="md" name="fas fa-briefcase"/>
        </q-item-section>
        <q-item-section>
          <q-item-label>Editar Institución de Administración Ordinario</q-item-label>
        </q-item-section>
      </q-item>
      <q-separator />
      <div class="q-pa-sm">
        <q-card-section>
          <div class="row q-col-gutter-sm">
            <div class="col-xs-3 col-sm-3 col-md-3">
              <q-input v-model="form.INSTITUCIONADMORID" square outlined label="ID INSTITUCION" />
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
              <q-input v-model="form.INSTITUCIONADMORNOMBRE" square outlined label="INSTITUCION NOMBRE"/>
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
import * as InstitucionesAdmorServices from 'src/services/InstitucionesAdmorServices';
import { notifySuccess, notifyError } from 'src/utils/notify';

export default {
  data() {
    return {
      disabled: true,
      form: {
        INSTITUCIONADMORID: '',
        INSTITUCIONADMORNOMBRE: ''
      }
    };
  },
  created() {
    const catalogsConfiguration = { profiles: true, institucion_admor: true };
    const { id } = this.$route.params
    this.$q.loading.show();
    this.$store.dispatch('catalogs/setCatalogs', { params: catalogsConfiguration }).then(() => {
      this.disabled = !this.canShow('instituciones_admor')
      InstitucionesAdmorServices.edit(id).then((data) => {
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
      InstitucionesAdmorServices.update(form, id).then((data) => {
        console.log(data)
        notifySuccess();
        this.$router.push('../../instituciones_admor');
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
