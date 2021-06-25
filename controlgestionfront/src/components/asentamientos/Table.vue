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
          <q-td key="TIPOASENTAMIENTOID" :props="props">
            {{ props.row.TIPOASENTAMIENTOID }}
          </q-td>
          <q-td key="TIPOASENTAMIENTONOMBRE" :props="props">
            {{ props.row.TIPOASENTAMIENTONOMBRE }}
          </q-td>
          <q-td key="actions" :props="props">
            <q-btn-group>
              <q-btn round size="sm" @click="verasentamientos(props.row.TIPOASENTAMIENTOID)" color="primary" icon="fas fa-eye" v-if="!props.row.deleted_at && canView"/>
              <q-btn round size="sm" @click="editasentamientos(props.row.TIPOASENTAMIENTOID)" color="primary" icon="fas fa-edit" v-if="canEdit"/>
              <q-btn round size="sm" @click="confirmDelete = true; deleteOption = props.row.TIPOASENTAMIENTOID" color="negative" icon="fas fa-trash" v-if="canDelete"/>
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
            <q-btn flat label="Eliminar" color="red"  v-close-popup @click="deleteasentamientos(deleteOption);"/>
            </q-card-actions>
      </q-card>
    </q-dialog>
  </div>
</template>

<script>
import { notifyError, notifySuccess } from 'src/utils/notify';
import * as AsentamientosServices from 'src/services/AsentamientosServices';

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
          name: 'TIPOASENTAMIENTOID', align: 'center', label: 'ID', field: 'TIPOASENTAMIENTOID'
        },
        {
          name: 'TIPOASENTAMIENTONOMBRE', align: 'center', label: 'Nombre asentamiento', field: 'TIPOASENTAMIENTONOMBRE'
        },
        {
          name: 'actions', align: 'center', label: 'Acciones', field: 'TIPOASENTAMIENTOID'
        },
      ],
    };
  },
  computed: {
    canEdit: {
      get() { return this.canShow('asentamientos-edit') }
    },
    canView: {
      get() { return this.canShow('asentamientos-view') }
    },
    canDelete: {
      get() { return this.canShow('asentamientos-delete') }
    },
  },
  methods: {
    editasentamientos(id) {
      this.$router.push(`/asentamientos/${id}/edit`)
    },
    verasentamientos(id) {
      this.$router.push(`/asentamientos/${id}/show`)
    },
    deleteasentamientos(id) {
      this.loading = true
      AsentamientosServices.destroy({ params: { id } }).then((data) => {
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
      AsentamientosServices.index({ params: { page, rowsPerPage, search } }).then((asentamientos) => {
        console.log(asentamientos.data)
        this.data = asentamientos.data
        this.pagination.rowsPerPage = asentamientos.per_page
        this.pagination.page = asentamientos.current_page
        this.pagination.rowsNumber = asentamientos.total
        this.loading = false
      }).catch(() => {
        this.loading = false
      })
    },
  },
};
</script>
