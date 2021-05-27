<template>
  <q-card style="width: 100%">
    <q-form ref="experienceForm">
      <q-card-section>
        <div class="text-h6">Agregar experiencia</div>
        <div class="q-pa-md">
          <div class="row q-col-gutter-sm">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <q-input square outlined label="Empresa" v-model="form.company" />
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <q-input square outlined label="Cargo" v-model="form.position" />
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
              <q-select
                label="Ingrese sus logros"
                outlined
                v-model="form.achievements"
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
        <q-btn flat label="Cancelar" color="primary" v-close-popup />
        <q-btn
          flat
          label="Agregar"
          color="primary"
          v-close-popup
          @click="addExperience"
        />
      </q-card-actions>
    </q-form>
  </q-card>
</template>

<script>
import { utils } from '../../../mixins/utils';

export default {
  mixins: [utils],
  data() {
    return {
      form: {
        company: '',
        position: '',
        start_date: '',
        end_date: '',
        description: '',
        achievements: []
      }
    };
  },
  watch: {
    'form.start_date': function () {
      this.form.end_date = '';
    },
  },
  methods: {
    addExperience() {
      this.$store.commit('employee/addExperience', this.form);
    },
  },
};
</script>

<style>
</style>
