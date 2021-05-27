<template>
    <div id="FormComponent">
        <q-dialog v-model="showDialog" persistent>
            <q-card style="min-width: 350px">
                <q-card-section>
                <div class="row">
                    <div class="col-xs-11 col-sm-11 col-md-11">
                        <q-item-label class="text-h6">Descripción del pago</q-item-label>
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1">
                        <q-btn round color="red" size="sm" @click="showDialog = false;" icon="fas fa-times"><q-tooltip content-class="bg-accent">cerrar</q-tooltip></q-btn>
                    </div>
                </div>
                </q-card-section>
                <q-card-section class="q-pt-none">
                  <q-form ref="form" @submit.prevent="() => {}" class="q-gutter-lg">
                    <div class="row q-col-gutter-sm">
                      <div class="col-xs-12 col-sm-12 col-md-12">
                          <q-input v-model="form.title"  :rules="[val => !!val || 'Este campo es requerido']" square outlined label="Título" />
                      </div>
                    </div>
                    <div class="row q-col-gutter-sm">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <q-select label="Tipo de contratación"  :rules="[val => !!val || 'Este campo es requerido']" outlined map-options emit-value v-model="form.cat_contract_type_id" option-value="id" option-label="name" :options="catalogs.contracts" clearable/>
                        </div>
                    </div>
                    <div class="row q-col-gutter-sm">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                          <div>
                            <q-input square outlined  :rules="[val => !!val || 'Este campo es requerido']" v-model="form.startDate" label="Fecha inicio del periódo" mask="date">
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
                            <q-input square outlined  :rules="[val => !!val || 'Este campo es requerido']" v-model="form.endDate" label="Fecha fin del periódo" mask="date">
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
                            <q-input square outlined  :rules="[val => !!val || 'Este campo es requerido']" v-model="form.start" label="Fecha de pago" mask="date">
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
                            <q-input type="textarea"  v-model="form.description" :rules="[val => !!val || 'Este campo es requerido']" square outlined label="Descripción" />
                        </div>
                    </div>
                  </q-form>
                </q-card-section>
                <q-card-actions align="right" class="text-primary">
                  <q-btn flat label="eliminar" color="red" @click="showDialog=false; isClose = true;"/>
                  <q-btn flat label="guardar" v-close-popup @click="update()" />
                </q-card-actions>
            </q-card>
        </q-dialog>
        <q-dialog v-model="isClose">
          <q-card style="min-width: 400px">
            <q-card-section>
              <div class="text-h6">¿Seguro desea eliminar la fecha de pago?</div>
            </q-card-section>
            <q-card-section>
            </q-card-section>
            <q-card-actions align="right" class="text-primary">
              <q-btn flat label="Cancelar" @click="showDialog = true; isClose = false;"  />
              <q-btn flat label="Eliminar" @click="destroy(form.id)" v-close-popup />
            </q-card-actions>
          </q-card>
        </q-dialog>
    </div>
</template>
<script>
import { mix } from 'src/mixins/calendar';

export default {
  mixins: [mix],
}
</script>
