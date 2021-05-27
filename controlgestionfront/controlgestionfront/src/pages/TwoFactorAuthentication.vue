<template>
  <div class="window-height window-width row justify-center items-center">
      <q-dialog v-model="otp" persistent>
            <q-carousel
            transition-prev="slide-right"
            transition-next="slide-left"
            swipeable
            animated
            v-model="slide"
            control-color="primary"
            navigation-icon="radio_button_unchecked"
            navigation
            padding
            width="300px"
            height="600px"
            class="bg-white shadow-1 rounded-borders"
          >
            <q-carousel-slide :name="1" class="column no-wrap flex-center">
              <div class="text-h6">Autenticación de Doble Factor</div>
              <q-icon class="q-mt-md" name="admin_panel_settings" color="primary" size="56px" />
              <div class="q-mt-md text-center">
                Tu cuenta se encuentra configurada para usar una Autenticación de Doble Factor para mayor seguridad.
              </div>
            </q-carousel-slide>
            <q-carousel-slide :name="2" class="column no-wrap flex-center">
              <div class="text-h6">Descarga la aplicación</div>
              <q-icon class="q-mt-md" name="get_app" color="primary" size="56px" />
              <div class="q-mt-md text-center">
                Para activar la Autenticación de Doble Factor solo necesitas descargar la aplicación INFOTEC Forte.
                <div class="q-pa-md q-gutter-sm">
                  <q-btn color="primary" icon="android" label="Descargar para Android" />
                  <q-btn color="primary" icon="fab fa-apple" label="Descargar para iOS" />
                </div>
              </div>
            </q-carousel-slide>
            <q-carousel-slide :name="3" class="column no-wrap flex-center">
              <div class="q-mt-md">
                <img :src="'data:image/jpeg;base64,' + qrUrl" alt="">
              </div>
              <div class="text-h6">Escanear código QR</div>
              <div class="q-mt-md text-center">
                Escanea el código QR de arriba desde la aplicación para activar el Factor de Doble Autenticación
              </div>
                <img src="~assets/logos/playstore.png" width="150"/>
            </q-carousel-slide>
            <q-carousel-slide :name="4" class="column no-wrap flex-center">
              <div class="text-h6">Ingresar código de seguridad</div>
              <q-input class="q-mt-md" square autofocus outlined @keyup.enter="()=>{}" label="Código de seguridad" mask="###-###" fill-mask unmasked-value/>
              <div class="q-mt-md text-center">
                Ingresa el código generado en tu aplicación para continuar
              </div>
              <div class="q-pa-md q-gutter-sm">
                  <q-btn color="primary" label="Continuar" @click="fakeSubmit"/>
              </div>
            </q-carousel-slide>
          </q-carousel>
        </q-dialog>
  </div>
</template>

<script>
export default {
  name: 'TwoFactorAuthentication',
  data() {
    return {
      slide: 1,
      qrUrl: '',
      otp: true,
    };
  },
  mounted() {
    this.$q.loading.show();
    this.$store.dispatch('user/getCode').then((code) => {
      this.qrUrl = code
      this.$q.loading.hide();
    })
  },
  methods: {
    fakeSubmit() {
      this.$q.loading.show();
      this.$store.dispatch('user/clearInformation').then(() => {
        this.$router.push('/login');
      }).finally(() => {
        this.$q.loading.hide();
      });
    }
  },
};
</script>
