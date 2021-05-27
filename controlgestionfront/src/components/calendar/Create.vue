<template>
  <q-card style="width: 100%">
    <q-item>
        <q-item-section avatar>
            <q-icon size="md" name="fas fa-calendar-day"/>
        </q-item-section>
        <q-item-section>
            <q-item-label>Agregar fecha de pago</q-item-label>
            <q-item-label caption>Ingrese los siguientes valores</q-item-label>
      </q-item-section>
    </q-item>
    <q-separator />
    <div class="q-pa-sm">
      <q-card-section>
        <q-form ref="form" @submit.prevent="() => {}" class="q-gutter-lg">
            <div class="row q-col-gutter-sm">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <q-input v-model="form.title" :rules="[val => !!val || 'Este campo es requerido']" square outlined label="Título" />
                </div>
            </div>
            <div class="row q-col-gutter-sm">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <q-select label="Tipo de contratación" :rules="[val => !!val || 'Este campo es requerido']" outlined map-options emit-value v-model="form.cat_contract_type_id" option-value="id" option-label="name" :options="catalogs.contracts" clearable/>
                </div>
            </div>
            <q-item-label class="q-pa-sm">Periodo de pago</q-item-label>
            <div class="row q-col-gutter-sm">
                <div class="col-xs-12 col-sm-12 col-md-6">
                  <div>
                    <q-input square outlined :rules="[val => !!val || 'Este campo es requerido']" v-model="form.startDate" label="Fecha inicio periodo de pago" mask="date">
                      <template v-slot:prepend>
                        <q-icon name="event" class="cursor-pointer">
                          <q-popup-proxy ref="qDate1" transition-show="scale" transition-hide="scale">
                            <q-date
                              v-model="form.startDate"
                              @input="() => $refs.qDate1.hide()"/>
                          </q-popup-proxy>
                        </q-icon>
                      </template>
                    </q-input>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                  <div>
                    <q-input square outlined :rules="[val => !!val || 'Este campo es requerido']" v-model="form.endDate" label="Fecha fin periodo de pago" mask="date">
                      <template v-slot:prepend>
                        <q-icon name="event" class="cursor-pointer">
                          <q-popup-proxy ref="qDate2" transition-show="scale" transition-hide="scale">
                            <q-date
                              v-model="form.endDate"
                              @input="() => $refs.qDate2.hide()"/>
                          </q-popup-proxy>
                        </q-icon>
                      </template>
                    </q-input>
                  </div>
                </div>
            </div>
            <div class="row q-col-gutter-sm">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div>
                    <q-input square outlined :rules="[val => !!val || 'Este campo es requerido']" v-model="form.start" label="Fecha de pago" mask="date">
                      <template v-slot:prepend>
                        <q-icon name="event" class="cursor-pointer">
                          <q-popup-proxy ref="qDateProxy" transition-show="scale" transition-hide="scale">
                            <q-date
                              v-model="form.start"
                              @input="() => $refs.qDateProxy.hide()"/>
                          </q-popup-proxy>
                        </q-icon>
                      </template>
                    </q-input>
                  </div>
                </div>
            </div>
            <div class="row q-col-gutter-sm">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <q-input type="textarea" v-model="form.description" :rules="[val => !!val || 'Este campo es requerido']" square outlined label="Descripción" />
                </div>
            </div>
        </q-form>
      </q-card-section>
      <q-card-actions align="right">
        <q-btn flat @click="$router.back()" label="Cancelar" color="primary" v-close-popup />
        <q-btn flat @click="store()"  label="Guardar" color="primary" />
      </q-card-actions>
    </div>
  </q-card>
</template>
<script>

import { create } from 'src/mixins/calendar/create';

export default {
  mixins: [create],
}
</script>
