<template>
  <div>
    <br/>
    <q-table
      :data="filteredMunicipios"
      :columns="columns"
      separator="vertical"
      :pagination.sync="pagination"
      :loading="loading"
      @request="onRequest"
      :filter="search"
    >
      <template v-slot:top>
        <q-input borderless dense debounce="400" v-model="search" placeholder="Buscar">
          <template v-slot:append>
            <q-icon name="search" />
          </template>
        </q-input>
        <q-select v-model="form.ENTIDADFEDERATIVAID" option-value="ENTIDADFEDERATIVAID" option-label="ENTIDADFEDERATIVANOMBRE" map-options emit-value :options="catalogs.entidades" @input="change" :rules="[$rules.required($t('requiredInput'))]">
          <span>Entidad Federativa</span>
        </q-select>
      </template>
      <template v-slot:body="props">
        <q-tr :props="props">
          <q-td key="MUNICIPIOID" :props="props">
            {{ props.row.MUNICIPIOID }}
          </q-td>
          <q-td key="MUNICIPIONOMBRE" :props="props">
            {{ props.row.MUNICIPIONOMBRE }}
          </q-td>
          <q-td key="actions" :props="props">
            <q-btn-group>
              <q-btn round size="sm" @click="editMunicipios(props.row.MUNICIPIOID)" color="primary" icon="fas fa-eye" v-if="canView && !canEdit"/>
              <q-btn round size="sm" @click="editMunicipios(props.row.MUNICIPIOID)" color="primary" icon="fas fa-edit" v-if="canEdit"/>
              <q-btn round size="sm" @click="confirmDelete = true; deleteOption = props.row.MUNICIPIOID" color="negative" icon="fas fa-trash" v-if="canDelete"/>
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
            <q-btn flat label="Eliminar" color="red"  v-close-popup @click="deleteMunicipios(deleteOption);"/>
            </q-card-actions>
      </q-card>
    </q-dialog>
  </div>
</template>

<script>
import { notifyError, notifySuccess } from 'src/utils/notify';
import * as MunicipiosService from 'src/services/MunicipiosServices';

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
      filteredMunicipios: [],
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
          name: 'MUNICIPIOID', align: 'center', label: 'ID', field: 'MUNICIPIOID'
        },
        {
          name: 'MUNICIPIONOMBRE', align: 'center', label: 'Nombre Municipio', field: 'MUNICIPIONOMBRE'
        },
        {
          name: 'actions', align: 'center', label: 'Acciones', field: 'MUNICIPIOID'
        },
      ],
      form: {
        ENTIDADFEDERATIVAID: '',
        ENTIDADFEDERATIVANOMBRE: ''
      },
      MUNICIPIOID: '',
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
      get() { return this.canShow('municipios-edit') }
    },
    canView: {
      get() { return this.canShow('municipios-view') }
    },
    canDelete: {
      get() { return this.canShow('municipios-delete') }
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
    editMunicipios(MUNICIPIOID) {
      this.$router.push(`/municipios/${MUNICIPIOID}/edit`)
    },
    deleteMunicipios(id) {
      this.loading = true
      MunicipiosService.destroy({ params: { id } }).then((data) => {
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
      MunicipiosService.index({ params: { page, rowsPerPage, search } }).then((municipios) => {
        this.filteredMunicipios = municipios.data
        this.pagination.rowsPerPage = municipios.per_page
        this.pagination.page = municipios.current_page
        this.pagination.rowsNumber = municipios.total
        this.loading = false
      }).catch(() => {
        this.loading = false
      })
    },
    change(val) {
      this.filteredMunicipios = this.catalogs.municipios.filter((e) => val === e.ENTIDADFEDERATIVAID)
    },
  },
};
</script>
