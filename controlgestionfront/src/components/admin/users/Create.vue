<template>
<q-card style="width: 100%">
  <q-item>
    <q-item-section avatar>
        <q-icon size="md" name="fas fa-users"/>
    </q-item-section>
    <q-item-section>
      <q-item-label>Agregar usuario</q-item-label>
      <q-item-label caption>
        Ingrese las siguientes valores
      </q-item-label>
    </q-item-section>
  </q-item>
  <q-separator />
  <div class="q-pa-sm">
    <q-card-section>
      <q-form ref="form" @submit.prevent="() => {}">
        <div class="row q-col-gutter-sm">
          <div class="col-xs-12 col-sm-12 col-md-4">
            <q-input
              :rules="[$rules.required($i18n.t('requiredInput'))]"
              v-model="form.name"
              square
              outlined
              label="Nombre" />
          </div>
          <div class="col-xs-12 col-sm-12 col-md-4">
            <q-input v-model="form.last_name" square outlined label="Primer apellido" />
          </div>
          <div class="col-xs-12 col-sm-12 col-md-4">
            <q-input v-model="form.second_lastname" square outlined label="Segundo apellido" />
          </div>
          <div class="col-xs-12 col-sm-12 col-md-4">
            <q-input v-model="form.username" square outlined label="Usuario" />
          </div>
          <div class="col-xs-12 col-sm-12 col-md-4">
            <q-input type="password" v-model="form.password" square outlined label="Contraseña" />
          </div>
          <div class="col-xs-12 col-sm-12 col-md-4">
            <q-input v-model="form.email" square outlined label="Correo electrónico" />
          </div>
          <div class="col-xs-12 col-sm-12 col-md-6">
            <q-select
              clearable
              outlined
              v-model="form.profile"
              option-value="id"
              option-label="name"
              :rules="[$rules.required($i18n.t('requiredInput'))]"
              :options="catalogs.profiles" label="Perfil" />
          </div>
          <div class="col-xs-12 col-sm-12 col-md-6">
            <q-select clearable outlined v-model="form.projects" option-value="id" multiple use-chips emit-value  map-options option-label="name" :options="catalogs.user_projects" label="Proyectos" />
          </div>
          <div class="col-xs-12 col-sm-12 col-md-6">
            <q-toggle size="md" v-model="form.has_two_fa" val="md" label="Activar autenticación de dos factores" />
          </div>
        </div>
      </q-form>
    </q-card-section>
    <q-card-actions align="right">
      <q-btn flat @click="$router.back()" label="Cancelar" color="primary" v-close-popup />
      <q-btn flat @click="store()" label="Guardar" color="primary" />
    </q-card-actions>
  </div>
</q-card>
</template>

<script>
import { notifySuccess } from 'src/utils/notify';
import * as UserService from 'src/services/admin/UserService';

export default {
  data() {
    return {
      form: {
        username: '',
        email: '',
        name: '',
        lastname: '',
        second_lastname: '',
        has_two_fa: false,
        projects: []
      }
    };
  },
  created() {
    const catalogsConfiguration = { profiles: true, user_projects: true };
    this.$q.loading.show();
    this.$store.dispatch('catalogs/setCatalogs', { params: catalogsConfiguration }).then(() => {
      this.$q.loading.hide();
    });
  },
  methods: {
    store() {
      this.$refs.form.validate().then((valid) => {
        if (valid) {
          const form = { ...this.form };
          form.profile_id = form.profile.id
          UserService.store(form).then(() => {
            notifySuccess();
            this.$router.push('/admin/users');
          }).catch((err) => {
            console.log(err)
          })
        }
      })
    },
  },
  computed: {
    catalogs: {
      get() {
        return this.$store.state.catalogs;
      },
      set(val) {
        this.$store.commit('catalogs/setCatalogs', val)
      }
    },
  },
};
</script>

<style>

</style>
