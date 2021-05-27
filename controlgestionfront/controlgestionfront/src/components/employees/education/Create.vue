<template>
  <q-card style="width: 100%">
    <q-form ref="educationForm">
      <q-card-section>
        <div class="text-h6">Agregar educación</div>
        <div class="q-pa-md">
          <div class="row q-col-gutter-sm">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <q-input square outlined label="Escuela" v-model="form.school"/>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <q-input square outlined label="Titulación" placeholder="Grado" v-model="form.title"/>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <q-select
            clearable
            outlined
            use-input
            v-model="form.status"
            option-value="id"
            option-label="name"
            :options="catalogs.education_statuses"
            label="Situación actual"/>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
              <q-input
                square
                outlined
                label="Fecha de inicio"
                mask="date"
                :rules="['date']"
                v-model="form.start_date"
                @click="$refs.qStatDateProxy.show()"
              >
                <template v-slot:append>
                  <q-icon name="event" class="cursor-pointer">
                    <q-popup-proxy
                      ref="qStatDateProxy"
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
          <q-input autogrow type="textarea" square outlined label="Descripción" v-model="form.description"/>
        </div>
      </div>
        </div>
      </q-card-section>
      <q-card-actions align="right">
          <q-btn flat label="Cancelar" color="primary" v-close-popup />
          <q-btn flat label="Agregar" color="primary" v-close-popup @click="addEducation"/>
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
        school: '',
        title: '',
        start_date: '',
        end_date: '',
        description: '',
        updating: false,
      }
    };
  },
  watch: {
    'form.start_date': function () {
      this.form.end_date = '';
    },
  },
  computed: {
    catalogs: {
      get() {
        return this.$store.state.catalogs;
      }
    },
  },
  methods: {
    addEducation() {
      this.$store.commit('employee/addEducation', this.form);
    },
  },
};
</script>

<style>

</style>
