<template>
<div>
  <q-form ref="tipologiaForm" @submit.prevent="() => {}">
    <q-card style="width: 100%">
      <q-item>
        <q-item-section avatar>
            <q-icon size="md" name="fas fa-briefcase"/>
        </q-item-section>
        <q-item-section>
          <q-item-label>Ver Tipologia</q-item-label>
        </q-item-section>
      </q-item>
      <q-separator />
      <div class="q-pa-sm">
        <q-card-section>
          <div class="row q-col-gutter-sm">
            <div class="col-xs-3 col-sm-3 col-md-3">
              <q-input v-model="form.TIPOLOGIAID" square outlined label="ID TIPOLOGIA" :disable="true"/>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3">
              <q-input v-model="form.SUBTIPOLOGIAID" square outlined label="ID SUBTIPOLOGIA" :disable="true"/>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
              <q-input v-model="form.SUBTIPOLOGIANOMBRE" square outlined label="NOMBRE SUBTIPOLOGIA"/>
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
import * as SubtipologiaServices from 'src/services/SubtipologiaServices';
import { notifySuccess, notifyError } from 'src/utils/notify';

export default {
  data() {
    return {
      disabled: true,
      form: {
        TIPOLOGIAID: '',
        TIPOLOGIANOMBRE: ''
      }
    };
  },
  created() {
    const catalogsConfiguration = { profiles: true, subtipologia: true };
    const { id } = this.$route.params
    this.$q.loading.show();
    this.$store.dispatch('catalogs/setCatalogs', { params: catalogsConfiguration }).then(() => {
      this.disabled = !this.canShow('subtipologia')
      SubtipologiaServices.edit(id).then((data) => {
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
      SubtipologiaServices.update(form, id).then((data) => {
        console.log(data)
        notifySuccess();
        this.$router.push('../../subtipologia');
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
