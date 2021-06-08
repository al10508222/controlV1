<template>
<div>
  <q-form ref="cucopsForm" @submit.prevent="() => {}">
    <q-card style="width: 100%">
      <q-item>
        <q-item-section avatar>
            <q-icon size="md" name="fas fa-briefcase"/>
        </q-item-section>
        <q-item-section>
          <q-item-label>Detalle CuCop</q-item-label>
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
              <q-input v-model="form.tipo" square outlined label="Tipo"/>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3">
              <q-input v-model="form.clave_cucop" square outlined label="Clave CuCop"/>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3">
              <q-input v-model="form.unidad_medida" square outlined label="Unidad de medida"/>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3">
              <q-input v-model="form.partida_especifica" square outlined label="Partida Específica"/>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <q-input v-model="form.descripcion" square outlined label="Descripción"/>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
              <q-input v-model="form.nivel" square outlined label="Nivel"/>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8">
              <q-input v-model="form.tipo_contratacion" square outlined label="Tipo Contratación"/>
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
import * as CucopService from 'src/services/CucopServices';
import { notifySuccess, notifyError } from 'src/utils/notify';

export default {
  data() {
    return {
      disabled: true,
      form: {
        tipo: '',
        clave_cucop: '',
        descripcion: '',
        partida_especifica: '',
        nivel: '',
        tipo_contratacion: '',
        unidad_medida: '',
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
      this.disabled = !this.canShow('Cucop')
      CucopService.edit(id).then((data) => {
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
      CucopService.update(form, id).then(() => {
        notifySuccess();
        this.$router.push('../../cucop');
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
