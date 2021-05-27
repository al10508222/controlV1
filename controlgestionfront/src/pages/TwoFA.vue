<template>
<div class="window-height window-width row justify-center items-center">
  <div class="justify-center items-center">
    <div class="row q-col-gutter-sm">
      <q-card style="width: 1000px; max-width: 80vw;">
          <q-card-section>
            <div class="row q-col-gutter-sm">
              <div class="col-12">
                <div class="text-h5">
                  ¡Protege tu cuenta! configura tu autenticación de dos factores (A2F)
                </div>
                <q-item-label caption>La A2F aumenta la seguridad de tu cuenta, incluso si alguien adivina tu contraseña, no podrá acceder a tu cuenta.</q-item-label>
              </div>
              <div class="col-8 col-sm-12 col-xs-12 col-md-8">
                <br/>
                <p>
                  1. Descarga la aplicación INFOTEC Forty
                </p>
                <p>
                  <img class="pointer" src="~assets/logos/appplay.png" width="250"/>
                </p>
                <p>
                  2. Activa el lector de QR, apunta tu teléfono hacia esta pantalla y escanea el código
                </p>
                <p>
                  <img class="pointer" src="~assets/icons/codigo-qr.svg" width="150"/>
                </p>
              </div>
              <div class="col-12 col-sm-12 col-md-4 row justify-center items-center text-center">
                <img :src="'data:image/jpeg;base64,' + qrCode" width="100%">
                <q-btn flat @click="activate()" label="Activar" color="primary" />
              </div>
            </div>
          </q-card-section>
        </q-card>
    </div>
  </div>
</div>
</template>

<script>
export default {
  components: { },
  name: 'TwoFA',
  mounted() {
    if (!this.qrCode || this.qrCode === '') {
      this.$router.push('/login');
    }
    this.watchOTP();
  },
  methods: {
    activate() {
      this.$axios.get(`/api/activateOTP/${this.usr}`);
    },
    async watchOTP() {
      let hasOTPVerify = false;
      const res = await this.$axios.get(`/api/checkTOTP/${this.usr}`);
      if (res.data.hasTOTPActivated) {
        hasOTPVerify = true;
        this.$q.notify({
          icon: 'fas fa-shield-alt',
          color: 'positive',
          position: 'top-right',
          textColor: 'white',
          message: '¡Se ha activado tu cuenta!',
        });
        this.$router.push('/login');
      }
      if (!hasOTPVerify) {
        setTimeout(() => {
          this.watchOTP();
        }, 5000)
      }
    }
  },
  computed: {
    qrCode: {
      get() {
        return this.$store.state.user.qrCode;
      },
    },
    usr: {
      get() {
        return this.$store.state.user.usr;
      },
    },
  },
};
</script>
