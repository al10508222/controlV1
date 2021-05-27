<template>
    <div>
     <q-card>
         <q-card-section>
            <div class="text-h6">
                <q-icon size="sm" name="fas fa-cogs"/> Administración / Configuración
            </div>
         </q-card-section>
     </q-card>
     <div class="q-mt-md">
         <q-form ref="settingsForm" @submit.prevent="() => {}">
          <q-card style="width: 100%">
            <q-item>
                <q-item-section avatar>
                    <q-icon size="md" name="fas fa-palette"/>
                </q-item-section>
                <q-item-section>
                    <q-item-label>Colores del sistema</q-item-label>
                    <q-item-label caption>
                        Modifique los colores del sistema
                    </q-item-label>
                </q-item-section>
             </q-item>
             <q-separator />
             <div class="q-pa-md">
                <div class="row q-col-gutter-md">
                <!--<div class="q-gutter-md row items-start"> -->
                  <div class="col-lg-4 col-md-6 col-xs-12">
                    <q-input
                      square
                      outlined
                      v-model="config.primary"
                      label="Primario"
                      :readonly="!canEdit"
                      :rules="[color1 => !!color1 || 'Este campo es requerido']"
                      hint=""
                    >
                      <template v-slot:append>
                        <q-icon name="colorize" class="cursor-pointer">
                          <q-popup-proxy transition-show="scale" transition-hide="scale">
                            <q-color v-model="config.primary" />
                          </q-popup-proxy>
                        </q-icon>
                      </template>
                    </q-input>
                  </div>
                  <div class="col-lg-4 col-md-6 col-xs-12">
                    <q-input
                      square
                      outlined
                      v-model="config.secondary"
                      label="Secundario"
                      :readonly="!canEdit"
                      :rules="[color2 => !!color2 || 'Este campo es requerido']"
                      hint=""
                    >
                      <template v-slot:append>
                        <q-icon name="colorize" class="cursor-pointer">
                          <q-popup-proxy transition-show="scale" transition-hide="scale">
                            <q-color v-model="config.secondary" />
                          </q-popup-proxy>
                        </q-icon>
                      </template>
                    </q-input>
                  </div>
                  <div class="col-lg-4 col-md-6 col-xs-12">
                    <q-input
                      square
                      outlined
                      v-model="config.accent"
                      label="Acento"
                      :readonly="!canEdit"
                      :rules="[color3 => !!color3 || 'Este campo es requerido']"
                      hint=""
                    >
                      <template v-slot:append>
                        <q-icon name="colorize" class="cursor-pointer">
                          <q-popup-proxy transition-show="scale" transition-hide="scale">
                            <q-color v-model="config.accent" />
                          </q-popup-proxy>
                        </q-icon>
                      </template>
                    </q-input>
                  </div>
                </div>
              </div>
              <q-item>
                <q-item-section avatar>
                  <q-icon size="md" name="fas fa-pencil-alt"/>
                </q-item-section>
                <q-item-section>
                    <q-item-label>T&iacute;tulo del sistema</q-item-label>
                    <q-item-label caption>
                        Modifique el t&iacute;tulo del sistema
                    </q-item-label>
                </q-item-section>
              </q-item>
              <q-separator />
              <div class="q-pa-md">
                <div class="row q-col-gutter-md">
                  <div class="col-lg-12 col-md-12 col-xs-12">
                    <q-input
                      ref="input"
                      square
                      outlined
                      v-model="config.title"
                      label="Escribe el nuevo titulo"
                      :readonly="!canEdit"
                      :rules="[val => !!val || 'Este campo es requerido']"
                    />
                  </div>
                </div>
             </div>
             <q-item>
              <q-item-section avatar>
                <q-icon size="md" name="far fa-images"/>
                    </q-item-section>
                    <q-item-section>
                      <q-item-label>Logotipo del sistema</q-item-label>
                      <q-item-label caption>Modifique el logotipo del sistema</q-item-label>
                    </q-item-section>
            </q-item>
            <q-separator />
            <div class="q-pa-md">
              <div class="row">
                <div class="col-lg-12">
                        <q-avatar id="avatar" size="100px">
                              <q-btn @click="showUploadImageDialog = true" round size="sm" color="secondary" class="avatar-btn absolute all-pointer-events cursor-pointer"  icon="fas fa-pen"  style="top: -10px; left: 0px;z-index:9" v-if="canEdit"/>
                              <q-img v-if="config.file_id" :src="`${this.$axios.defaults.baseURL}/api/files/image/${config.file_id}?w=150&h=150`" spinner-color="white"/>
                              <q-img v-if="!config.file_id" src="~assets/img/user.png" style="width:80px;height:80px;"/>
                          </q-avatar>
                    </div>
              </div>
            </div>
            <q-card-actions align="right">
              <q-btn flat @click="$router.push('/')" label="Cancelar" color="primary" />
              <q-btn flat @click="store()" label="Guardar" color="primary" v-if="canEdit"/>
            </q-card-actions>
          </q-card>
         </q-form>
     </div>
      <q-dialog v-model="showUploadImageDialog">
        <UploadImage v-on:uploaded="(file) => setImage(file)" module="employee_img" fileType="img" />
      </q-dialog>
    </div>
</template>

<script>
import { colors } from 'quasar'
import UploadImage from 'src/components/global/UploadImage'
import * as DataService from 'src/services/admin/config/ConfigService'
import { notifyError, notifySuccess } from 'src/utils/notify'

export default {
  components: { UploadImage },
  data() {
    return {
      showUploadImageDialog: false,
    }
  },
  computed: {
    config: {
      get() {
        return this.$store.state.config;
      },
      set(val) {
        this.$store.commit('config/updateConfig', val);
      }
    },
    canEdit: {
      get() {
        return this.canShow('settings-edit');
      }
    }
  },
  mounted() {
    this.loadConfiguration()
  },
  methods: {
    store() {
      this.$refs.settingsForm.validate().then((valid) => {
        if (valid) {
          const formData = { ...this.config }
          this.$q.loading.show();

          DataService.store(formData).then((res) => {
            if (res.success) {
              colors.setBrand('primary', this.config.primary);
              colors.setBrand('secondary', this.config.secondary);
              colors.setBrand('accent', this.config.accent);

              notifySuccess()
              this.$router.push('/')
            } else {
              notifyError();
            }
          }).catch((err) => {
            console.log(err)
            notifyError();
          }).finally(() => {
            // Este ocurre siempre
            this.$q.loading.hide()
          })
        } else {
          notifyError()
        }
      });
    },
    setImage(file) {
      this.isShowDialogFile = false;
      this.config.file_id = file.id
    },
    loadConfiguration() {
      DataService.edit().then((response) => {
        this.config = response
      })
    }
  },
}
</script>
