<template>
  <q-card style="width: 100%">
    <q-form ref="educationForm">
      <q-card-section>
        <div class="text-h6">Editar educación</div>
        <div class="q-pa-md">
          <div class="row q-col-gutter-sm">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <q-input square outlined label="Escuela" :readonly="readonly" v-model="education.school"/>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <q-input square outlined label="Titulación" :readonly="readonly" placeholder="Grado" v-model="education.title"/>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <q-select clearable outlined use-input v-model="education.status" :readonly="readonly" option-value="id" option-label="name" :options="catalogs.education_statuses" label="Situación actual"/>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
              <q-input
                square
                outlined
                label="Fecha de inicio"
                :readonly="readonly"
                mask="date"
                :rules="['date']"
                v-model="education.start_date"
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
                      <q-date v-model="education.start_date" :readonly="readonly">
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
              <q-input
                square
                outlined
                label="Fecha de finalización"
                :readonly="readonly"
                class="fix-padding"
                mask="date"
                :rules="['date']"
                v-model="education.end_date"
                @click="$refs.qEndDateProxy.show()"
              >
                <template v-slot:append>
                  <q-icon name="event" class="cursor-pointer">
                    <q-popup-proxy
                      ref="qEndDateProxy"
                      transition-show="scale"
                      transition-hide="scale"
                    >
                      <q-date v-model="education.end_date" :readonly="readonly">
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
          <q-input autogrow type="textarea" square outlined label="Descripción" :readonly="readonly" v-model="education.description"/>
        </div>
      </div>
        </div>
      </q-card-section>
      <q-card-actions align="right">
          <q-btn flat label="Cerrar" color="primary" v-close-popup />
          <!-- <q-btn flat label="Actualizar" color="primary" v-close-popup @click="updateEducation"/> -->
        </q-card-actions>
    </q-form>
  </q-card>
</template>

<script>
import { utils } from '../../../mixins/utils';

export default {
  mixins: [utils],
  props: {
    education: {
      type: Object,
      required: true
    },
    readonly: {
      type: Boolean,
      default: false
    }
  },
  computed: {
    catalogs: {
      get() {
        return this.$store.state.catalogs;
      }
    },
  }
};
</script>

<style>

</style>
