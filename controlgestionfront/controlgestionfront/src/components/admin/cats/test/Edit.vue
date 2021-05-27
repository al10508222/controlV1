<template>
  <q-card style="width: 100%">
    <q-item>
      <q-item-section avatar>
          <q-icon size="md" name="fas fa-project-diagram"/>
      </q-item-section>
      <q-item-section>
        <q-item-label>Agregar unidad</q-item-label>
        <q-item-label caption>Ingrese los siguientes valores</q-item-label>
      </q-item-section>
    </q-item>
    <q-separator />
    <div class="q-pa-sm">
      <q-card-section>
        <q-form ref="form" @submit.prevent="() => {}" class="q-gutter-lg">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <q-input :rules="[$rules.required($i18n.t('requiredInput'))]" v-model="form.name" square outlined label="Nombre" />
                </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <q-input :rules="[$rules.required($i18n.t('requiredInput'))]" v-model="form.code" square outlined label="Código" />
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <q-input :rules="[$rules.required($i18n.t('requiredInput'))]" type="number" v-model="form.number" square outlined label="Número" />
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <q-select :rules="[$rules.required($i18n.t('requiredInput'))]" label="Dependencia" outlined map-options emit-value v-model="form.cat_dependency_id" option-value="id" option-label="name" :options="catalogs.dependencies" hide-dropdown-icon input-debounce="0" />
              </div>
            </div>
        </q-form>
      </q-card-section>
    <q-card-actions align="right">
      <q-btn flat @click="$router.back()" label="Cancelar" color="primary" v-close-popup />
      <q-btn flat @click="update()" label="Guardar" color="primary" />
    </q-card-actions>
  </div>
</q-card>
</template>

<script>

export default {}
</script>

<style>

</style>
