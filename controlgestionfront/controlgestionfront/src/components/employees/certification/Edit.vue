<template>
  <q-card>
    <q-card-section>
      <div class="text-h6">Editar certificación</div>
      <div class="q-pa-md">
        <div class="row q-col-gutter-sm">
          <div class="col-xs-12 col-sm-12 col-md-12">
            <q-input square outlined label="Emisor" v-model="certification.entity" :readonly="readonly"/>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <q-input square outlined label="Nombre de la certificación" :readonly="readonly" v-model="certification.name"/>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <q-input
              autogrow
              type="textarea"
              square
              outlined
              label="Descripción"
              :readonly="readonly"
              v-model="certification.description"
            />
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <q-input
              square
              outlined
              label="Fecha de inicio"
              :readonly="readonly"
              mask="date"
              :rules="['date']"
              v-model="certification.start_date"
              :options="(date) => date <= todayDateString"
              @click="$refs.qStartDateProxy.show()"
            >
              <template v-slot:append>
                <q-icon name="event" class="cursor-pointer">
                  <q-popup-proxy
                    ref="qStartDateProxy"
                    transition-show="scale"
                    transition-hide="scale"
                  >
                    <q-date v-model="certification.start_date" :readonly="readonly">
                      <div class="row items-center justify-end">
                        <q-btn
                          v-close-popup
                          label="Cerrar"
                          color="primary"
                          flat
                        />
                      </div>
                    </q-date>
                  </q-popup-proxy>
                </q-icon>
              </template>
            </q-input>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <q-checkbox v-model="certification.expires" :readonly="readonly" label="Sin fecha de caducidad" />
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12" v-if="!certification.expires">
            <q-input
              square
              outlined
              label="Fecha de finalización"
              :readonly="readonly"
              class="fix-padding"
              mask="date"
              :rules="['date']"
              v-model="certification.end_date"
              @click="$refs.qEndDateProxy.show()"
            >
              <template v-slot:append>
                <q-icon name="event" class="cursor-pointer">
                  <q-popup-proxy
                    ref="qEndDateProxy"
                    transition-show="scale"
                    transition-hide="scale"
                  >
                    <q-date v-model="certification.end_date" :readonly="readonly" :options="(date) => date >= certification.start_date">
                      <div class="row items-center justify-end">
                        <q-btn
                          v-close-popup
                          label="Cerrar"
                          color="primary"
                          flat
                        />
                      </div>
                    </q-date>
                  </q-popup-proxy>
                </q-icon>
              </template>
            </q-input>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <q-input square outlined label="ID de la credencial" :readonly="readonly" v-model="certification.credential_id"/>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <q-input square outlined label="URL" :readonly="readonly" v-model="certification.url"/>
          </div>
        </div>
      </div>
    </q-card-section>
    <q-card-actions align="right">
      <q-btn flat label="Cerrar" color="primary" v-close-popup />
    </q-card-actions>
  </q-card>
</template>

<script>
import { utils } from '../../../mixins/utils';

export default {
  mixins: [utils],
  props: {
    certification: {
      type: Object,
      required: true
    },
    readonly: {
      type: Boolean,
      default: true
    }
  },
};
</script>

<style>
</style>
