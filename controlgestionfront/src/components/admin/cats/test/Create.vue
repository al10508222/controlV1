<template>
  <q-card style="width: 100%">
    <q-item>
      <q-item-section avatar>
          <q-icon size="md" name="fas fa-project-diagram"/>
      </q-item-section>
      <q-item-section>
        <q-item-label>Agregar test</q-item-label>
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
              <q-input v-model="form.address" :rules="[$rules.required($i18n.t('requiredInput'))]" debounce="1000" square outlined type="text"  label="Dirección" />
            </div>
            </div>

            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                 <q-input v-model="form.email" square outlined label="Correo electrónico" />
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                 <q-input
                    square
                    outlined
                    v-model="form.date"
                    label="Fecha de nacimiento"
                    mask="date"
                    :rules="['date']"
                  >
                <template v-slot:append>
                  <q-icon name="event" class="cursor-pointer">
                    <q-popup-proxy
                      ref="qDateProxy"
                      transition-show="scale"
                      transition-hide="scale"
                    >
                      <q-date
                        v-model="form.date"
                      >
                        <div class="row items-center justify-end">
                          <q-btn v-close-popup label="Cerrar" color="primary" flat />
                        </div>
                      </q-date>
                    </q-popup-proxy>
                  </q-icon>
                </template>
              </q-input>
             </div>
            </div>

        </q-form>
      </q-card-section>
      <q-card-actions align="right">
        <q-btn flat @click="$router.back()" label="Cancelar" color="primary" v-close-popup />
        <q-btn flat @click="store()" label="Guardar" color="primary" />
      </q-card-actions>
    </div>
  </q-card>
</template>

<script>
import { create } from 'src/mixins/test/create';

export default {
  mixins: [create],
}
</script>

<style>

</style>
