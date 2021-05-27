<template>
<q-card style="width: 100%">
  <q-item>
    <q-item-section avatar>
        <q-icon size="md" name="fas fa-users"/>
    </q-item-section>
    <q-item-section>
      <q-item-label>Agregar usuario</q-item-label>
      <q-item-label caption>
        Ingrese las siguientos valores
      </q-item-label>
    </q-item-section>
  </q-item>
  <q-separator />
  <div class="q-pa-sm">
    <q-card-section>
      <div class="row q-col-gutter-sm">
        <div class="col-xs-12 col-sm-12 col-md-6">
          <q-input v-model="form.name" square outlined label="Nombre" :disable="disabled"/>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
          <q-input v-model="form.last_name" square outlined label="Primer apellido" :disable="disabled"/>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
          <q-input v-model="form.second_lastname" square outlined label="Segundo apellido" :disable="disabled"/>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
          <q-input v-model="form.username" square outlined label="Usuario" :disable="disabled"/>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
          <q-input v-model="form.email" square outlined label="Correo electrónico" :disable="disabled"/>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
          <q-select clearable outlined v-model="form.profile" option-value="id" option-label="name" :options="catalogs.profiles" label="Perfil" :disable="disabled"/>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
          <q-select clearable outlined v-model="form.projects" option-value="id" multiple use-chips map-options emit-value option-label="name" :options="catalogs.user_projects" label="Proyectos" :disable="disabled"/>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
          <q-toggle size="md" v-model="form.has_two_fa" val="md" label="Activar autenticación de dos factores" :disable="disabled"/>
        </div>
        <!-- <div class="col-xs-12 col-sm-12 col-md-6">
          <img :src="qrUrl" alt="">
        </div> -->
      </div>
    </q-card-section>
    <q-card-actions align="right">
      <q-btn flat @click="$router.back()" label="Cancelar" color="primary" v-close-popup />
      <q-btn flat @click="update()" label="Guardar" color="primary" v-if="!disabled"/>
    </q-card-actions>
  </div>
</q-card>
</template>

<script>
import * as UserService from 'src/services/admin/UserService';
import { notifySuccess, notifyError } from 'src/utils/notify';

export default {
  data() {
    return {
      qrUrl: '',
      disabled: true,
      form: {
        username: '',
        email: '',
        name: '',
        lastname: '',
        second_lastname: '',
        has_two_fa: false
      }
    };
  },
  created() {
    const catalogsConfiguration = { profiles: true, user_projects: true };
    const { id } = this.$route.params
    this.$q.loading.show();
    this.$store.dispatch('catalogs/setCatalogs', { params: catalogsConfiguration }).then(() => {
      this.disabled = !this.canShow('users-edit')
      UserService.edit(id).then((user) => {
        this.form = user
        this.form.projects = this.form.projects.map((obj) => obj.id, []);
        this.$q.loading.hide();
      }).catch((err) => {
        console.log(err)
        this.$q.loading.hide();
      })
    });
  },
  methods: {
    update() {
      const form = { ...this.form };
      const { id } = this.$route.params
      form.profile_id = form.profile.id
      UserService.update(form, id).then(() => {
        notifySuccess();
        this.$router.push('/admin/users');
      }).catch((err) => {
        notifyError(err)
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
