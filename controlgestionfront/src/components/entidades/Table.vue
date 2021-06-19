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
     <template v-slot:top-right>
        <q-input borderless dense debounce="400" v-model="search" placeholder="Buscar">
          <template v-slot:append>
            <q-icon name="search" />
          </template>
        </q-input>
      </template>
      <template v-slot:body="props">
        <q-tr :props="props">
          <q-td key="entidadfederativaid" :props="props">
            {{ props.row.entidadfederativaid }}
          </q-td>
          <q-td key="entidadfederativanombre" :props="props">
            {{ props.row.entidadfederativanombre }}
          </q-td>
          <q-td key="entidadfederativaabreviacion" :props="props">
            {{ props.row.entidadfederativaabreviacion }}
          </q-td>
          <q-td key="actions" :props="props">
            <q-btn-group>
              <q-btn round size="sm" @click="editEntidades(props.row.entidadfederativaid)" color="primary" icon="fas fa-eye" v-if="canView && !canEdit"/>
              <q-btn round size="sm" @click="editEntidades(props.row.entidadfederativaid)" color="primary" icon="fas fa-edit" v-if="canEdit"/>
              <q-btn round size="sm" @click="confirmDelete = true; deleteOption = props.row.entidadfederativaid" color="negative" icon="fas fa-trash" v-if="canDelete"/>
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
            <q-btn flat label="Eliminar" color="red"  v-close-popup @click="deleteEntidades(deleteOption);"/>
            </q-card-actions>
      </q-card>
    </q-dialog>
  </div>
</template>

<script>
import { notifyError, notifySuccess } from 'src/utils/notify';
import * as EntidadesService from 'src/services/EntidadesServides';

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
      loading: false,
      deleteOption: '',
      confirmDelete: false,
      pagination: {
        page: 1,
        rowsPerPage: 10,
        rowsNumber: ''
      },
      search: '',
      separator: 'vertical',
      columns: [
        {
          name: 'entidadfederativaid', align: 'center', label: 'ID', field: 'entidadfederativaid'
        },
        {
          name: 'entidadfederativanombre', align: 'center', label: 'Nombre Entidad', field: 'entidadfederativanombre'
        },
        {
          name: 'entidadfederativaabreviacion', align: 'center', label: 'Nombre Corto Entidad', field: 'entidadfederativaabreviacion'
        },
        {
          name: 'actions', align: 'center', label: 'Acciones', field: 'entidadfederativaid'
        },
      ],
    };
  },
  computed: {
    canEdit: {
      get() { return this.canShow('entidades-edit') }
    },
    canView: {
      get() { return this.canShow('entidades-view') }
    },
    canDelete: {
      get() { return this.canShow('entidades-delete') }
    },
  },
  methods: {
    editEntidades(id) {
      this.$router.push(`/entidades/${id}/edit`)
    },
    deleteEntidades(id) {
      this.loading = true
      EntidadesService.destroy({ params: { id } }).then((data) => {
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
      EntidadesService.index({ params: { page, rowsPerPage, search } }).then((Entidades) => {
        this.data = Entidades.data
        this.pagination.rowsPerPage = Entidades.per_page
        this.pagination.page = Entidades.current_page
        this.pagination.rowsNumber = Entidades.total
        this.loading = false
      }).catch(() => {
        this.loading = false
      })
    },
  },
};
</script>
