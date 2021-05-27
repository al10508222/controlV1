<template>
<div class="window-height window-width row justify-center items-center">
  <div class="justify-center items-center">
    <div class="row q-col-gutter-sm text-center">
      <q-form ref="loginForm" class="q-gutter-lg login-form" v-show="!showTOTP">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div style="width:300px"></div>
          <q-img v-if="config.file_id" :src="`${this.$axios.defaults.baseURL}/api/files/image/${config.file_id}`" spinner-color="white" width="150"/>
          <q-img v-if="!config.file_id" src="~assets/logos/infotec.png" width="150"/>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <q-input square filled outlined label="Usuario" :rules="[val => !!val || 'Este campo es requerido']" v-model="credentials.username"/>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <q-input  square filled :type="isPwd ? 'password' : 'text'"  outlined label="Contraseña"
          :rules="[val => !!val || 'Este campo es requerido']"  v-model="credentials.password">
             <template v-slot:append>
              <q-icon
                :name="isPwd ? 'visibility_off' : 'visibility'"
                class="cursor-pointer"
                @click="isPwd = !isPwd"/>
            </template>
          </q-input>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <q-btn outline rounded color="primary" @click="submit()" label="Acceder" />
        </div>
      </q-form>
      <q-form ref="totpForm" class="q-gutter-lg login-form" v-show="showTOTP">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div style="width:300px"></div>
          <q-img v-if="config.file_id" :src="`${this.$axios.defaults.baseURL}/api/files/image/${config.file_id}`" spinner-color="white" width="150"/>
          <q-img v-if="!config.file_id" src="~assets/logos/infotec.png" width="150"/>
        </div>
        <p class="text-h6">
          Autenticación de doble factor
        </p>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <q-input outline rounded square filled outlined mask="######" label="Código de verificación"
          :rules="[val => !!val || 'Este campo es requerido']" v-model="credentials.totp"/>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <q-btn outline rounded color="primary" @click="submit()" label="Verificar" />
        </div>
      </q-form>
    </div>
  </div>
</div>
</template>

<script>
import { colors } from 'quasar'
import * as DataService from '../services/admin/config/ConfigService';

export default {
  name: 'Login',
  data() {
    return {
      isPwd: true,
      two_fa: false,
      showTOTP: false,
      credentials: {
        username: '',
        password: '',
        totp: '',
      }
    };
  },
  computed: {
    config: {
      get() {
        return this.$store.state.config
      },
      set(val) {
        this.$store.commit('config/updateConfig', val);
      }
    }
  },
  created() {
    DataService.getConfig().then((response) => {
      this.config = response;
      colors.setBrand('primary', response.primary);
      colors.setBrand('secondary', response.secondary);
      colors.setBrand('accent', response.accent);
    })
  },
  methods: {
    submit() {
      this.$refs.loginForm.validate().then((valid) => {
        if (valid) {
          this.$q.loading.show();
          const credentials = { ...this.credentials }
          this.$store.dispatch('user/login', credentials).then((res) => {
            this.$q.loading.hide();
            if (res.authenticated) {
              this.$router.push('/');
            } else if (res.setTwoFA) {
              this.$q.notify({
                icon: 'fas fa-shield-alt',
                color: 'info',
                position: 'top-rigt',
                textColor: 'white',
                message: 'Por favor active su token',
              });
            } else if (res.showTOTP) {
              this.showTOTP = true;
              if (res.errorCode) {
                this.$q.notify({
                  icon: 'fas fa-shield-alt',
                  color: 'negative',
                  position: 'top-right',
                  textColor: 'white',
                  message: 'El token ingresado no es valido',
                });
              }
            } else {
              this.$q.notify({
                icon: 'fas fa-exclamation-circle',
                color: 'negative',
                position: 'top-right',
                textColor: 'white',
                message: 'Su código no es correcto',
              });
            }
          });
        }
      });
    },
  },
};
</script>
