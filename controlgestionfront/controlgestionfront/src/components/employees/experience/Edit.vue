<template>
  <q-card style="width: 100%">
    <q-form ref="experienceForm">
      <q-card-section>
        <div class="text-h6">Editar experiencia</div>
        <div class="q-pa-md">
          <div class="row q-col-gutter-sm">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <q-input square outlined label="Empresa" :readonly="readonly" v-model="experience.company" />
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <q-input square outlined label="Cargo" :readonly="readonly" v-model="experience.position" />
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <q-input
                square
                outlined
                label="Fecha de inicio"
                :readonly="readonly"
                mask="date"
                :rules="['date']"
                v-model="experience.start_date"
                @click="$refs.qStartDateProxy.show()"
              >
                <template v-slot:append>
                  <q-icon name="event" class="cursor-pointer">
                    <q-popup-proxy
                      ref="qStartDateProxy"
                      transition-show="scale"
                      transition-hide="scale"
                    >
                      <q-date v-model="experience.start_date" :readonly="readonly" :options="(date) => date <= todayDateString">
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
                v-model="experience.end_date"
                @click="$refs.qEndDateProxy.show()"
              >
                <template v-slot:append>
                  <q-icon name="event" class="cursor-pointer">
                    <q-popup-proxy
                      ref="qEndDateProxy"
                      transition-show="scale"
                      transition-hide="scale"
                    >
                      <q-date v-model="experience.end_date" :readonly="readonly" :options="(date) => date >= experience.start_date">
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
                autogrow
                type="textarea"
                square
                outlined
                label="Descripción"
                :readonly="readonly"
                v-model="experience.description"
              />
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <q-select
                label="Ingrese sus logros"
                :readonly="readonly"
                outlined
                v-model="experience.achievements"
                use-input
                use-chips
                multiple
                hide-dropdown-icon
                input-debounce="0"
                new-value-mode="add-unique"
              />
            </div>
          </div>
        </div>
      </q-card-section>
      <q-card-actions align="right">
        <q-btn flat label="Cerrar" color="primary" v-close-popup />
      </q-card-actions>
    </q-form>
  </q-card>
</template>

<script>
import { utils } from '../../../mixins/utils';

export default {
  mixins: [utils],
  props: {
    experience: {
      type: Object,
      required: true
    },
    readonly: {
      type: Boolean,
      default: false
    }
  },
  watch: {
    'experience.start_date': function () {
      this.experience.end_date = '';
    },
  },
};
</script>

<style>
</style>
