<template>
  <div>
    <div class="row q-pa-sm q-col-gutter-sm">
      <div class="col-12">
        <q-card class="q-pa-sm" v-if="canShow('dashboard-view')">
          <q-item class="q-pb-none q-pt-xs">
            <q-item-section>
              <q-item-label class="text-black-7" style="letter-spacing: 5px; font-weight: 1200; font-size: 30px">Bienvenido {{ user.name }} {{ user.last_name }}</q-item-label>
              <q-item-label class="text-black-7" style="letter-spacing: 3px; font-weight: 400; font-size: 20px">Perfil: {{ user.profile }} </q-item-label>
              <q-item-label class="text-black-7" style="letter-spacing: 3px; font-weight: 400; font-size: 20px">Correo: {{ user.email }} </q-item-label>
              <q-item-label class="text-black-7 btn" style="letter-spacing: 3px; font-weight: 400; font-size: 14px; text-decoration: underline;"><a v-on:click='editUser(user.profile_id)'>Editar Perfil</a></q-item-label>
            </q-item-section>

            <q-item-section side>
              <q-icon name="fas fa-user-tie" class="" size="200px"></q-icon>
            </q-item-section>
          </q-item>
          <q-item class="q-py-xs" style="min-height: unset">
            <q-item-section>
              <q-linear-progress :value="1" class="q-mt-sm" />
            </q-item-section>
          </q-item>
        </q-card>
      </div>
      <div class="col-6">
        <q-card class="q-pa-sm" v-if="canShow('dashboard-view')">
          <q-item class="q-pb-none q-pt-xs">
            <q-item-section>
              <q-item-label class="text-h4" style="font-weight: 500;letter-spacing: 3px;">{{ statistics.total_employees }}</q-item-label>
              <q-item-label class="text-grey-7" style="letter-spacing: 1px;">Total de empleados</q-item-label>
            </q-item-section>

            <q-item-section side>
              <q-icon name="fas fa-user-tie" class="" size="60px"></q-icon>
            </q-item-section>
          </q-item>
          <q-item class="q-py-xs" style="min-height: unset">
            <q-item-section>
              <q-linear-progress :value="1" class="q-mt-sm" />
            </q-item-section>
          </q-item>
        </q-card>
      </div>
      <div class="col-6" style="border-left: 1px solid #efefef;">
        <q-card class="q-pa-sm">
          <q-item class="q-pb-none q-pt-xs">
            <q-item-section>
              <q-item-label class="text-h4" style="font-weight: 500;letter-spacing: 3px;">{{ statistics.total_available_positions }}</q-item-label>
              <q-item-label class="text-grey-7" style="letter-spacing: 1px;">Plazas disponibles</q-item-label>
            </q-item-section>

            <q-item-section side>
              <q-icon name="fas fa-briefcase" class="" size="60px"></q-icon>
            </q-item-section>
          </q-item>
          <q-item class="q-py-xs" style="min-height: unset">
            <q-item-section>
              <q-linear-progress :value="1" class="q-mt-sm" />
            </q-item-section>
          </q-item>
        </q-card>
      </div>
    </div>
  </div>
</template>

<script>
import * as StatisticsService from 'src/services/global/StatisticsService';
import * as UserService from 'src/services/admin/UserService';

export default {
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
  components: {
  },
  data() {
    return {
      statistics: {
        total_employees: 0,
        total_available_positions: 0,
      }
    };
  },
  created() {
    this.getStatistics()
  },
  methods: {
    getStatistics() {
      StatisticsService.getStatistics().then((response) => {
        this.statistics = response
      });
    },
    editUser(id) {
      this.$router.push(`/admin/users/${id}/edit`)
    },
    onRequest(props) {
      const { page, rowsPerPage } = props.pagination
      const { search } = this
      this.loading = true
      UserService.index({ params: { page, rowsPerPage, search } }).then((users) => {
        this.data = users.data
        this.pagination.rowsPerPage = users.per_page
        this.pagination.page = users.current_page
        this.pagination.rowsNumber = users.total
        this.loading = false
      }).catch(() => {
        this.loading = false
      })
    },
  },
};
</script>

<style>
  .shadow {
    -webkit-box-shadow: 0 0 10px #bfbfbf !important;
    box-shadow: 0 0 10px #bfbfbf !important;
  }
</style>
