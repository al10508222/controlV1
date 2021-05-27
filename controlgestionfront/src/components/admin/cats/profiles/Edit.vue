<template>
<q-card style="width: 100%">
  <q-item>
    <q-item-section avatar>
        <q-icon size="md" name="fas fa-id-badge"/>
    </q-item-section>
    <q-item-section>
      <q-item-label>Editar Perfil </q-item-label>
      <q-item-label caption>
        Ingrese las siguientos valores
      </q-item-label>
    </q-item-section>
  </q-item>
  <q-separator />
  <div class="q-pa-sm">
    <q-card-section>
      <div class="row q-col-gutter-sm">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <q-input
            v-model="form.name"
            square
            outlined
            :readonly="!canEdit"
            label="Nombre"
            :rules="[$rules.required($t('requiredInput'))]"
          />
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <q-input
            v-model="form.key"
            square
            outlined
            :readonly="!canEdit"
            label="Codigo del permiso"
            :rules="[$rules.required($t('requiredInput'))]"
          />
        </div>
        <template>
            <span style="margin: 30px 0 10px 0">Selecciona los permisos para el perfil</span>
            <q-card class="my-card col-xs-12 col-sm-12 col-md-12">
                <q-card-section>
                    <div class="col-xs-12 col-sm-12 col-md-12" v-for="item in modules" :key="item.id">
                       <q-banner rounded class="bg-grey-3">
                        <q-item-label>Modulo de la aplicación: {{item.name}} </q-item-label>
                       </q-banner>

                        <div class="row ">
                            <div
                            v-for="permission in item.permissions"
                            :key="permission.id"
                            class="col-lg-4 q-pa-sm"
                            >
                            <q-checkbox
                                :val="permission.id"
                                :disable="!canEdit"
                                v-model="form.permissions"
                                :label="permission.name"
                            />
                            </div>
                        </div>
                    <div class="q-px-sm"></div>
                    <div class="q-pa-md q-gutter-md">
                      <q-linear-progress
                        :key="size"
                        :size="size"
                        :value="progress"
                        color="primary"
                      />
                    </div>
                    </div>
                </q-card-section>
            </q-card>
        </template>

      </div>
    </q-card-section>
    <q-card-actions align="right">
      <q-btn flat @click="$router.back()" label="Cancelar" color="primary" v-close-popup />
      <q-btn flat @click="update()" label="Guardar" color="primary" v-if="canEdit"/>
    </q-card-actions>
  </div>
</q-card>
</template>

<script>
import * as ProfileService from 'src/services/admin/catalogs/ProfileService';
import * as ModulesService from 'src/services/admin/catalogs/ModulesService';
import { notifySuccess, notifyError } from 'src/utils/notify'

export default {
  async created() {
    // get initial data -> modules permissions
    this.$q.loading.show();
    await this.getModules()
    await this.setProfileData()
    this.$q.loading.hide();
  },
  data() {
    return {
      size: 'xs',
      progress: 1.0,
      modules: [],
      form: {
        name: '',
        key: '',
        permissions: [],
      }
    };
  },

  methods: {
    update() {
      const form = { ...this.form };
      const { id } = this.$route.params
      ProfileService.update(form, id).then(() => {
        notifySuccess()
        this.$router.push('/admin/profiles');
      }).catch(() => {
        notifyError()
      })
    },
    async getModules() {
      await ModulesService.index().then((modules) => {
        this.modules = modules
      }).catch(() => {
        notifyError()
      })
    },
    async setProfileData() {
      const { id } = this.$route.params
      ProfileService.edit(id).then(async ({ profile }) => {
        this.form = await profile
        this.form.permissions = profile.permissions.map((permission) => permission.id) // set only id
      }).catch(() => {
        notifyError()
      })
    },
  },
  computed: {
    canEdit: {
      get() {
        return this.canShow('roles-edit');
      }
    }
  },
};
</script>

<style>

</style>
