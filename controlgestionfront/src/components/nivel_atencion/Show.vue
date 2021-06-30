<template>
<div>
  <q-form ref="AsentamientoForm" @submit.prevent="() => {}">
    <q-card style="width: 100%">
      <q-item>
        <q-item-section avatar>
            <q-icon size="md" name="fas fa-briefcase"/>
        </q-item-section>
        <q-item-section>
          <q-item-label>Ver Nivel de Atención</q-item-label>
        </q-item-section>
      </q-item>
      <q-separator />
      <div class="q-pa-sm">
        <q-card-section>
          <div class="row q-col-gutter-sm">
            <div class="col-xs-3 col-sm-3 col-md-3">
              <q-input v-model="form.NIVELATENCIONID" square :disable="true" outlined label="ID"/>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
              <q-input v-model="form.NIVELATENCIONNOMBRE" square outlined label="Nombre"/>
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
import * as NivelAtencionServices from 'src/services/NivelAtencionServices';

export default {
  data() {
    return {
      disabled: true,
      form: {
        NIVELATENCIONID: '',
        NIVELATENCIONNOMBRE: ''
      }
    };
  },
  created() {
    const catalogsConfiguration = { profiles: true, NivelAtencion: true };
    const { id } = this.$route.params
    this.$q.loading.show();
    this.$store.dispatch('catalogs/setCatalogs', { params: catalogsConfiguration }).then(() => {
      this.disabled = !this.canShow('nivel_atencion')
      NivelAtencionServices.edit(id).then((data) => {
        console.log(data)
        this.form = data
        this.$q.loading.hide();
      }).catch((err) => {
        console.log(err)
        this.$q.loading.hide();
      })
    });
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
