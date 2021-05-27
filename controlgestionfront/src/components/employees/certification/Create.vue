<template>
  <q-card>
    <q-card-section>
      <div class="text-h6">Agregar certificación</div>
      <div class="q-pa-md">
        <div class="row q-col-gutter-sm">
          <div class="col-xs-12 col-sm-12 col-md-12">
            <q-input square outlined label="Emisor" v-model="form.entity"/>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <q-input square outlined label="Nombre de la certificación" v-model="form.name"/>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <q-input
              autogrow
              type="textarea"
              square
              outlined
              label="Descripción"
              v-model="form.description"
            />
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <q-input
              square
              outlined
              label="Fecha de inicio"
              mask="date"
              :rules="['date']"
              v-model="form.start_date"
              @click="$refs.qStartDateProxy.show()"
            >
              <template v-slot:append>
                <q-icon name="event" class="cursor-pointer">
                  <q-popup-proxy
                    ref="qStartDateProxy"
                    transition-show="scale"
                    transition-hide="scale"
                  >
                    <q-date v-model="form.start_date" :options="(date) => date <= todayDateString">
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
            <q-checkbox v-model="form.expires" label="Sin fecha de caducidad" />
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12" v-if="!form.expires">
            <q-input
              square
              outlined
              label="Fecha de finalización"
              class="fix-padding"
              mask="date"
              :rules="['date']"
              v-model="form.end_date"
              @click="$refs.qEndDateProxy.show()"
            >
              <template v-slot:append>
                <q-icon name="event" class="cursor-pointer">
                  <q-popup-proxy
                    ref="qEndDateProxy"
                    transition-show="scale"
                    transition-hide="scale"
                  >
                    <q-date v-model="form.end_date" :options="(date) => date >= form.start_date">
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
            <q-input square outlined label="ID de la credencial" v-model="form.credential_id"/>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <q-input square outlined label="URL" v-model="form.url"/>
          </div>
        </div>
      </div>
    </q-card-section>
    <q-card-actions align="right">
      <q-btn flat label="Cancelar" color="primary" v-close-popup />
      <q-btn
        flat
        label="Agregar"
        color="primary"
        v-close-popup
        @click="addCertification"
      />
    </q-card-actions>
  </q-card>
</template>

<script>
import { utils } from '../../../mixins/utils';

export default {
  mixins: [utils],
  data() {
    return {
      form: {
        entity: '',
        name: '',
        description: '',
        expires: false,
        start_date: '',
        end_date: '',
        credential_id: '',
        url: ''
      },
    };
  },
  computed: {
    catalogs: {
      get() {
        return this.$store.state.catalogs;
      },
    },
  },
  methods: {
    addCertification() {
      this.$store.commit('employee/addCertification', this.form);
    },
  },
};
</script>

<style>
</style>
