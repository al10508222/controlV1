<template>
<div>
  <q-form ref="positionsForm" @submit.prevent="() => {}">
    <q-card style="width: 100%">
      <q-item>
        <q-item-section avatar>
            <q-icon size="md" name="fas fa-briefcase"/>
        </q-item-section>
        <q-item-section>
          <q-item-label>Puestos</q-item-label>
          <q-item-label caption>
            Ingrese los siguientes valores
          </q-item-label>
        </q-item-section>
      </q-item>
      <q-separator />
      <div class="q-pa-sm">
        <q-card-section>
          <div class="row q-col-gutter-sm">
            <div class="col-xs-12 col-sm-12 col-md-12 q-mb-md">
              <q-input v-model="form.name" square outlined label="Nombre" :rules="[$rules.required($t('requiredInput'))]"/>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 q-mb-md">
              <q-select clearable outlined v-model="form.cat_contract_type_id" option-value="id" option-label="name" map-options emit-value :options="catalogs.contracts" label="Contratación" @input="change" :rules="[$rules.required($t('requiredInput'))]"/>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 q-mb-md">
              <q-select clearable outlined v-model="form.cat_tabulator_id" option-value="id" option-label="name" map-options emit-value :options="filteredTabulators" label="Tabulador" :rules="[$rules.required($t('requiredInput'))]"/>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 q-mb-md">
              <q-select clearable outlined v-model="form.cat_unit_id" option-value="id" option-label="name" map-options emit-value :options="catalogs.units" label="Unidad" :rules="[$rules.required($t('requiredInput'))]"/>
            </div>
          </div>
        </q-card-section>
        <q-card-actions align="right">
          <q-btn flat @click="$router.back()" label="Cancelar" color="primary" v-close-popup />
          <q-btn flat @click="store()" label="Guardar" color="primary" />
        </q-card-actions>
      </div>
    </q-card>
  </q-form>
</div>
</template>

<script>
import * as DataService from 'src/services/PositionService';
import { notifySuccess, notifyError } from 'src/utils/notify'

export default {
  data() {
    return {
      form: {
        name: '',
        cat_unit_id: '',
        cat_tabulator_id: '',
        cat_contract_type_id: '',
      },
      filteredTabulators: [],
      employee_id: ''
    };
  },
  created() {
    const catalogsConfiguration = { units: true, tabulators: true, contracts: true };
    this.$q.loading.show();
    this.$store.dispatch('catalogs/setCatalogs', { params: catalogsConfiguration }).then(() => {
      this.$q.loading.hide();
    });
  },
  methods: {
    store() {
      this.submitting = true
      this.$refs.positionsForm.validate().then((valid) => {
        if (valid) {
          const form = { ...this.form }
          this.$q.loading.show()
          DataService.store(form).then(() => {
            notifySuccess()
            this.$router.push('/positions')
          }).catch((err) => {
            this.submitting = false
            if (err.response.status === 422) {
              err.response.data.forEach((e) => notifyError(e))
            } else {
              notifyError()
            }
          }).finally(() => {
            this.$q.loading.hide()
          })
        } else {
          this.submitting = false
        }
      })
    },
    change(val) {
      this.form.cat_tabulator_id = ''
      this.filteredTabulators = this.catalogs.tabulators.filter((e) => val === e.cat_contract_type_id)
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
