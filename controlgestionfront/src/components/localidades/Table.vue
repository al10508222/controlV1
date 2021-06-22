<template>
  <div>
    <br/>
    <q-table
      :data="data"
      :columns="columns"
      separator="vertical"
      :pagination.sync="pagination"
      :loading="loading"
      @request="onRequest"
      :filter="search"
    >
      <template v-slot:top>
          <q-card style="width: 100%">
            <q-separator />
            <div class="q-pa-sm">
              <q-card-section>
                <div class="row q-col-gutter-sm">
                  <div class="col-xs-4 col-sm-4 col-md-4 q-mb-md">
                    <q-select v-model="form.ENTIDADFEDERATIVAID" option-value="ENTIDADFEDERATIVAID" option-label="ENTIDADFEDERATIVANOMBRE" label="Entidad Federativa" map-options emit-value :options="catalogs.entidades" @input="change" :rules="[$rules.required($t('requiredInput'))]" />
                  </div>
                  <div class="col-xs-4 col-sm-4 col-md-4 q-mb-md">
                    <q-select v-model="form.MUNICIPIOID" option-value="MUNICIPIOID" option-label="MUNICIPIONOMBRE" :options="filteredMunicipios" label="Municipio" map-options emit-value @input="change_all_localidades" :rules="[$rules.required($t('requiredInput'))]" />
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-3 q-mb-md">
                    <q-select v-model="form.ID" option-value="ID" option-label="LOCALIDADNOMBRE" :options="filteredAllLocalidades" label="Localidad" map-options emit-value :rules="[$rules.required($t('requiredInput'))]" />
                  </div>
                </div>
              </q-card-section>
            </div>
          </q-card>
      </template>
      <template v-slot:body="props">
        <q-tr :props="props">
          <q-td key="LOCALIDADID" :props="props">
            {{ props.row.LOCALIDADID }}
          </q-td>
          <q-td key="MUNICIPIONOMBRE" :props="props">
            {{ props.row.MUNICIPIONOMBRE }}
          </q-td>
          <q-td key="actions" :props="props">
            <q-btn-group>
              <q-btn round size="sm" @click="editLocalidad(props.row.LOCALIDADID)" color="primary" icon="fas fa-eye" v-if="canView && !canEdit"/>
              <q-btn round size="sm" @click="editLocalidad(props.row.LOCALIDADID)" color="primary" icon="fas fa-edit" v-if="canEdit"/>
              <q-btn round size="sm" @click="confirmDelete = true; deleteOption = props.row.LOCALIDADID" color="negative" icon="fas fa-trash" v-if="canDelete"/>
            </q-btn-group>
          </q-td>
        </q-tr>
      </template>
      <template v-slot:no-data="{ }">
        <div class="full-width row flex-center q-gutter-sm">
          <q-icon size="2em" name="sentiment_dissatisfied" />
          <span>
            No se encontraron resultados
          </span>
        </div>
      </template>
    </q-table>
    <q-dialog v-model="confirmDelete" persistent>
      <q-card>
        <q-card-section class="row items-center">
            <span class="q-ml-sm">¿Seguro que desea eliminar este registro?</span>
            </q-card-section>
            <q-card-actions align="right">
            <q-btn flat label="Cancel" color="primary" v-close-popup/>
            <q-btn flat label="Eliminar" color="red"  v-close-popup @click="deleteLocalidad(deleteOption);"/>
            </q-card-actions>
      </q-card>
    </q-dialog>
  </div>
</template>

<script>
import { notifyError, notifySuccess } from 'src/utils/notify';
import * as LocalidadesService from 'src/services/MunicipiosServices';

export default {
  components: {
  },
  mounted() {
    // get initial data from server (1st page)
    this.onRequest({
      pagination: this.pagination,
      filter: undefined
    })
  },
  data() {
    return {
      data: [],
      filteredMunicipios: [],
      filteredAllLocalidades: [],
      filteredOneLocalidad: [],
      loading: false,
      deleteOption: '',
      confirmDelete: false,
      pagination: {
        page: 1,
        rowsPerPage: 200,
        rowsNumber: ''
      },
      search: '',
      separator: 'vertical',
      columns: [
        {
          name: 'ID', align: 'center', label: 'ID', field: 'ID'
        },
        {
          name: 'MUNICIPIONOMBRE', align: 'center', label: 'Nombre Municipio', field: 'MUNICIPIONOMBRE'
        },
        {
          name: 'actions', align: 'center', label: 'Acciones', field: 'ID'
        },
      ],
      form: {
        ENTIDADFEDERATIVAID: '',
        ENTIDADFEDERATIVANOMBRE: ''
      },
      LOCALIDADID: '',
    };
  },
  created() {
    const catalogsConfiguration = { entidades: true, municipios: true };
    this.$q.loading.show();
    this.$store.dispatch('catalogs/setCatalogs', { params: catalogsConfiguration }).then(() => {
      this.$q.loading.hide();
    });
  },
  computed: {
    canEdit: {
      get() { return this.canShow('localidades-edit') }
    },
    canView: {
      get() { return this.canShow('localidades-view') }
    },
    canDelete: {
      get() { return this.canShow('localidades-delete') }
    },
    catalogs: {
      get() {
        return this.$store.state.catalogs;
      },
      set(val) {
        this.$store.commit('catalogs/setCatalogs', val)
      }
    },
  },
  methods: {
    editLocalidad(id) {
      this.$router.push(`/localidades/${id}/edit`)
    },
    deleteLocalidad(id) {
      this.loading = true
      LocalidadesService.destroy({ params: { id } }).then((data) => {
        if (data.success) {
          notifySuccess()
          this.onRequest({
            pagination: this.pagination,
            filter: undefined
          })
          // On true need to update model
        } else {
          notifyError();
        }
      }).catch(() => {
        this.loading = false
      })
    },
    onRequest(props) {
      const { page, rowsPerPage } = props.pagination
      const { search } = this
      this.loading = true
      LocalidadesService.index({ params: { page, rowsPerPage, search } }).then((localidades) => {
        this.pagination.rowsPerPage = localidades.per_page
        this.pagination.page = localidades.current_page
        this.pagination.rowsNumber = localidades.total
        this.loading = false
      }).catch(() => {
        this.loading = false
      })
    },
    change(entidad) {
      this.filteredMunicipios = this.catalogs.municipios.filter((e) => entidad === e.ENTIDADFEDERATIVAID)
    },
    change_all_localidades(municipio) {
      this.filteredAllLocalidades = this.catalogs.localidades.filter((e) => municipio === e.MUNICIPIOID)
    }
  },
};
</script>
