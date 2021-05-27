<template>
<q-card style="width: 100%">
  <q-item>
    <q-item-section avatar>
      <q-icon size="md" name="fas fa-tools"/>
    </q-item-section>
    <q-item-section>
      <q-item-label>Agregar campo personalizado</q-item-label>
      <q-item-label caption>
        Ingrese los siguientes valores
      </q-item-label>
    </q-item-section>
  </q-item>
  <q-separator/>
  <div class="q-pa-sm">
    <q-form ref="form" @submit.prevent="() => {}" class="q-gutter-lg">
      <q-card-section>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 q-mb-md">
            <q-input v-model="form.name" :rules="[val => !!val || 'Este campo es requerido']" square outlined label="Nombre"/>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 q-mb-md">
            <q-input v-model="form.description" :rules="[val => !!val || 'Este campo es requerido']" square outlined label="Descripción"/>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 q-mb-md">
            <q-select label="Módulo" :rules="[val => !!val || 'Este campo es requerido']" outlined map-options emit-value v-model="form.cat_modules_id" option-value="id" option-label="name" :options="catalogs.cat_modules" clearable/>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 q-mb-md">
            <q-checkbox left-label v-model="form.is_required" label="¿Es requerido?"/>
            <q-checkbox left-label v-model="calculator" label="¿Es un campo en la calculadora?"/>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 q-mb-md">
            <q-select label="Tipo de dato" :rules="[val => !!val || 'Este campo es requerido']" :disable="form.calculator_field" outlined map-options emit-value v-model="form.cat_type_data_id" option-value="id" option-label="name" :options="catalogs.cat_type_data" clearable/>
          </div>
        </div>
        <div class="row" v-if="form.cat_type_data_id == 2 || form.cat_type_data_id === 3">
          <div class="col-xs-12 col-sm-12 col-md-12 q-mb-md">
            <q-select label="Opciones" outlined map-options emit-value use-input multiple use-chips new-value-mode="add-unique" hide-dropdown-icon v-model="form.options"/>
          </div>
        </div>
        <div class="row" v-if="form.cat_type_data_id == 1 || form.cat_type_data_id === 5">
          <div class="col-xs-12 col-sm-12 col-md-12 q-mb-md">
            <q-input v-model="form.length" :rules="[val => !!val || 'Este campo es requerido']" mask="##########" square outlined label="Longitud"/>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 q-mb-lg" v-if="form.calculator_field">
            <q-input v-model="form.default_value" square emit-value outlined label="Valor por defecto"/>
          </div>
        </div>
      </q-card-section>
    </q-form>
    <q-card-actions align="right">
      <q-btn flat @click="$router.back()" label="Cancelar" color="primary" v-close-popup/>
      <q-btn flat @click="store()" label="Guardar" color="primary"/>
    </q-card-actions>
  </div>
</q-card>
</template>

<script>
import { create } from 'src/mixins/customFields/create';

export default {
  mixins: [create],
}
</script>
