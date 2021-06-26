<template>
  <q-layout view="lHh Lpr lFf" class="shadow-2 rounded-borders">
    <q-header>
      <q-toolbar>
        <q-btn
          flat
          dense
          round
          icon="menu"
          aria-label="Menu"
          @click="leftDrawerOpen = !leftDrawerOpen"
        />
        <q-toolbar-title class="pointer" @click="$router.push('/')">
         {{ config.title }}
        </q-toolbar-title>
        <div class="q-pl-md q-gutter-sm row no-wrap items-center">
          <q-btn round dense flat size="14px" icon="fas fa-cogs">
            <q-tooltip>Administración</q-tooltip>
            <AdminMenu />
          </q-btn>
          <!-- <q-btn round dense flat icon="notifications">
            <q-badge color="red" text-color="white" floating>
              2
            </q-badge>
            <q-tooltip>Notificationes</q-tooltip>
          </q-btn> -->
          <q-btn round flat>
            <q-avatar size="26px">
              <img src="~assets/img/avatar.jpg">
            </q-avatar>
            <q-tooltip>{{user.name}} {{user.last_name}}</q-tooltip>
            <q-menu>
              <div class="row no-wrap q-pa-md">
                <div class="column">
                  <q-avatar size="100px">
                    <img src="~assets/img/avatar.jpg">
                  </q-avatar>
                  <br/>
                  <q-btn color="primary" label="Logout" push size="sm" v-close-popup @click="IsCloseSession = true;" />
                </div>
                <q-separator vertical inset class="q-mx-lg" />
                <div class="column">
                  <div class="text-subtitle1 q-mt-md q-mb-xs">{{user.name}} {{user.last_name}}</div>
                  <div class="text-subtitle1 q-mt-md q-mb-xs">{{user.profile}}</div>
                  <div class="text-subtitle1 q-mt-md q-mb-xs">{{user.email}}</div>
                </div>
              </div>
            </q-menu>
          </q-btn>
        </div>
      </q-toolbar>
      <q-separator size="4px" color="secondary"></q-separator>
    </q-header>
    <hr/>
    <q-drawer v-model="leftDrawerOpen"
      show-if-above
      side="left"
      color="black"
      :width="280"
      :breakpoint="1100"
      elevated
      content-class="bg-white-9 text-black"
      bordered>
      <q-scroll-area style="cursor: pointer;" class="fit">
        <q-list padding class="menu-list">
          <q-expansion-item
            expand-separator
            icon="perm_identity"
            label="Menú principal"
            caption="Menú"
          >
            <q-item clickable v-ripple  @click.native="$router.push('/').catch(err => {})">
              <q-item-section avatar>
                <q-avatar>
                  <q-icon right name="fas fa-home" />
                </q-avatar>
              </q-item-section>
              <q-item-section id="irInicio">Inicio</q-item-section>
            </q-item>
            <q-item v-if="canShow('users-view')" clickable v-ripple  @click.native="$router.push('/admin/users').catch(err => {})">
              <q-item-section avatar>
                <q-avatar>
                  <q-icon right name="fas fa-users q-icon notranslate" />
                </q-avatar>
                </q-item-section>
                <q-item-section id="irUsuarios">Usuarios</q-item-section>
            </q-item>
            <q-item  v-if="canShow('employees-view')" clickable v-ripple  @click.native="$router.push('/employees').catch(err => {})">
              <q-item-section avatar>
                <q-avatar>
                  <q-icon right name="fas fa-user-friends" />
                </q-avatar>
              </q-item-section>
              <q-item-section id="irPuestos">Personas</q-item-section>
            </q-item>
            <q-item v-if="canShow('positions-view')" clickable v-ripple  @click.native="$router.push('/positions').catch(err => {})">
              <q-item-section avatar>
                <q-avatar>
                  <q-icon right name="fas fa-briefcase q-icon notranslate" />
                </q-avatar>
              </q-item-section>
              <q-item-section id="irPuestos">Puestos</q-item-section>
            </q-item>
            <q-item v-if="canShow('roles-view')" clickable v-ripple  @click.native="$router.push('/admin/profiles').catch(err => {})">
              <q-item-section avatar>
                <q-avatar>
                  <q-icon right name="fas fa-passport q-icon notranslate" />
                </q-avatar>
              </q-item-section>
              <q-item-section id="irPermisos">Perfiles/Permisos</q-item-section>
            </q-item>
            <q-item  v-if="canShow('calendar-view')" clickable v-ripple  @click.native="$router.push('/calendar').catch(err => {})">
              <q-item-section avatar>
                <q-avatar>
                  <q-icon right name="far fa-calendar-alt" />
                </q-avatar>
              </q-item-section>
              <q-item-section id="irCalendario">Calendario de pagos</q-item-section>
            </q-item>
            <q-list padding class="menu-list">
              <q-expansion-item
                expand-separator
                icon="perm_identity"
                label="Catálogos 1"
                caption="Otros"
              >
                <q-item v-if="canShow('cucop-view')" clickable v-ripple  @click.native="$router.push('/cucop').catch(err => {})">
                  <q-item-section avatar>
                    <q-avatar>
                      <q-icon right name="fas fa-passport q-icon notranslate" />
                    </q-avatar>
                  </q-item-section>
                  <q-item-section id="irCucop">Catálogo CuCop</q-item-section>
                </q-item>
                <q-item v-if="canShow('vialidades-view')" clickable v-ripple  @click.native="$router.push('/vialidades').catch(err => {})">
                  <q-item-section avatar>
                    <q-avatar>
                      <q-icon right name="fas fa-passport q-icon notranslate" />
                    </q-avatar>
                  </q-item-section>
                  <q-item-section id="irVialidades">Tipo Vialidad</q-item-section>
                </q-item>
                <q-item v-if="canShow('entidades-view')" clickable v-ripple  @click.native="$router.push('/entidades').catch(err => {})">
                  <q-item-section avatar>
                    <q-avatar>
                      <q-icon right name="fas fa-passport q-icon notranslate" />
                    </q-avatar>
                  </q-item-section>
                  <q-item-section id="irEntidades">Entidades Federativas</q-item-section>
                </q-item>
                <q-item v-if="canShow('municipios-view')" clickable v-ripple  @click.native="$router.push('/municipios').catch(err => {})">
                  <q-item-section avatar>
                    <q-avatar>
                      <q-icon right name="fas fa-passport q-icon notranslate" />
                    </q-avatar>
                  </q-item-section>
                  <q-item-section id="irMunicipios">Catálogo de Municipios</q-item-section>
                </q-item>
                <q-item v-if="canShow('localidades-view')" clickable v-ripple  @click.native="$router.push('/localidades').catch(err => {})">
                  <q-item-section avatar>
                    <q-avatar>
                      <q-icon right name="fas fa-passport q-icon notranslate" />
                    </q-avatar>
                  </q-item-section>
                  <q-item-section id="irLocalidades">Catálogo de Localidades</q-item-section>
                </q-item>
                <q-item v-if="canShow('acreditacion-view')" clickable v-ripple  @click.native="$router.push('/acreditacion').catch(err => {})">
                  <q-item-section avatar>
                    <q-avatar>
                      <q-icon right name="fas fa-passport q-icon notranslate" />
                    </q-avatar>
                  </q-item-section>
                  <q-item-section id="irAcreditacion">Estatus de Acreditación</q-item-section>
                </q-item>
                <q-item v-if="canShow('estrato-view')" clickable v-ripple  @click.native="$router.push('/estrato').catch(err => {})">
                  <q-item-section avatar>
                    <q-avatar>
                      <q-icon right name="fas fa-passport q-icon notranslate" />
                    </q-avatar>
                  </q-item-section>
                  <q-item-section id="irEstrato">Estrato Unidad</q-item-section>
                </q-item>
                <q-item v-if="canShow('asentamientos-view')" clickable v-ripple  @click.native="$router.push('/asentamientos').catch(err => {})">
                  <q-item-section avatar>
                    <q-avatar>
                      <q-icon right name="fas fa-passport q-icon notranslate" />
                    </q-avatar>
                  </q-item-section>
                  <q-item-section id="asentamientos">Tipos Asentamientos</q-item-section>
                </q-item>
              </q-expansion-item>
            </q-list>
            <q-list padding class="menu-list">
              <q-expansion-item
                expand-separator
                icon="perm_identity"
                label="Catálogos 2"
                caption="Otros"
              >
                <q-item v-if="canShow('cucop-view')" clickable v-ripple  @click.native="$router.push('/cucop').catch(err => {})">
                  <q-item-section avatar>
                    <q-avatar>
                      <q-icon right name="fas fa-passport q-icon notranslate" />
                    </q-avatar>
                  </q-item-section>
                  <q-item-section id="irCucop">Catálogo CuCop</q-item-section>
                </q-item>
              </q-expansion-item>
            </q-list>
          </q-expansion-item>
        </q-list>
      </q-scroll-area>
    </q-drawer>
    <q-page-container class="q-pa-lg">
      <router-view />
    </q-page-container>
    <q-dialog v-model="IsCloseSession">
      <q-card style="min-width: 400px">
        <q-card-section>
          <div class="text-h6">¿Seguro desea cerrar sesión?</div>
        </q-card-section>
        <q-card-section>
        </q-card-section>
        <q-card-actions align="right" class="text-primary">
          <q-btn flat label="Cancelar" v-close-popup />
          <q-btn flat label="Cerrar Sesión" @click="logout()" v-close-popup />
        </q-card-actions>
      </q-card>
    </q-dialog>
  </q-layout>
</template>

<script>
import { colors } from 'quasar'

import { version } from '../../package.json';
import AdminMenu from './AdminMenu';
import * as DataService from '../services/admin/config/ConfigService';

export default {
  name: 'MainLayout',
  components: { AdminMenu },
  mounted() {
    if (!this.user.name) {
      this.$q.loading.show();
      this.$store.dispatch('user/refreshInformation').then((res) => {
        if (res) {
          this.$router.push('/');
        }
      }).finally(() => {
        this.$q.loading.hide();
      });
    }
    this.loadConfiguration();
  },
  data() {
    return {
      IsCloseSession: false,
      version,
      leftDrawerOpen: false,
    };
  },
  methods: {
    logout() {
      this.$q.loading.show();
      sessionStorage.removeItem('grp_token');
      sessionStorage.removeItem('grp_token_expiration');
      this.$store.dispatch('user/clearInformation').then(() => {
        this.$router.push('/login');
      }).finally(() => {
        this.$q.loading.hide();
      });
    },
    loadConfiguration() {
      DataService.edit().then((response) => {
        this.config = response;
        colors.setBrand('primary', this.config.primary);
        colors.setBrand('secondary', this.config.secondary);
        colors.setBrand('accent', this.config.accent);
      })
    }
  },
  computed: {
    config: {
      get() {
        return this.$store.state.config
      },
      set(val) {
        this.$store.commit('config/updateConfig', val);
      }
    },
    user: {
      get() {
        return this.$store.state.user.information;
      }
    },
  },
};
</script>
