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
            <q-icon name="search"/>
          </template>
        </q-input>
      </template>
      <template v-slot:body="props">
        <q-tr :props="props">
          <q-td key="name" :props="props">
            {{ props.row.name }}
          </q-td>
          <q-td key="unit" :props="props">
            {{ props.row.unit.name }}
          </q-td>
          <q-td key="tabulator" :props="props">
            {{ props.row.tabulator.name }}
          </q-td>
          <q-td key="actions" :props="props">
            <q-btn-group>
              <q-btn round size="sm" @click="edit(props.row.id)" color="primary" icon="fas fa-eye" v-if="canView && !canEdit"/>
              <q-btn round size="sm" @click="edit(props.row.id)" color="primary" icon="fas fa-edit" v-if="canEdit"/>
              <q-btn round size="sm" @click="confirmDelete = true; deleteOption = props.row.id" color="negative" icon="fas fa-trash" v-if="canDelete"/>
            </q-btn-group>
          </q-td>
        </q-tr>
      </template>
      <template v-slot:no-data="{ }">
        <div class="full-width row flex-center q-gutter-sm">
          <q-icon size="2em" name="sentiment_dissatisfied"/>
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
          <q-btn flat label="Cancel" color="primary" v-close-popup @click="confirmDelete = false"/>
          <q-btn flat label="Eliminar" color="red"  v-close-popup @click="destroy(deleteOption);"/>
        </q-card-actions>
      </q-card>
    </q-dialog>
  </div>
</template>

<script>
import * as DataService from 'src/services/PositionService';
import { notifyError, notifySuccess } from 'src/utils/notify';

export default {
  components: {},
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
      confirmDelete: false,
      deleteOption: null,
      loading: false,
      pagination: {
        page: 1,
        rowsPerPage: 5,
        rowsNumber: ''
      },
      search: '',
      separator: 'vertical',
      columns: [
        {
          name: 'name', align: 'center', label: 'Nombre', field: 'name'
        },
        {
          name: 'unit', align: 'center', label: 'Unidad', field: 'unit'
        },
        {
          name: 'tabulator', align: 'center', label: 'Tabulador', field: 'tabulator'
        },
        {
          name: 'actions', align: 'center', label: 'Acciones', field: 'id'
        },
      ],
    };
  },
  computed: {
    canEdit: {
      get() { return this.canShow('positions-edit') }
    },
    canView: {
      get() { return this.canShow('positions-view') }
    },
    canDelete: {
      get() { return this.canShow('positions-delete') }
    },
  },
  methods: {
    edit(id) {
      this.$router.push(`/positions/${id}/edit`)
    },
    destroy(id) {
      this.loading = true
      DataService.destroy(id).then(() => {
        notifySuccess()
        this.onRequest({
          pagination: this.pagination,
          filter: undefined
        })
      }).catch(() => {
        notifyError()
      }).finally(() => {
        this.loading = false
        this.confirmDelete = false
        this.deleteOption = null
      })
    },
    onRequest(props) {
      const { page, rowsPerPage } = props.pagination
      const { search } = this
      this.loading = true
      DataService.index({ params: { page, rowsPerPage, search } }).then((results) => {
        this.data = results.data
        this.pagination.rowsPerPage = results.per_page
        this.pagination.page = results.current_page
        this.pagination.rowsNumber = results.total
        this.loading = false
      }).catch(() => {
        this.loading = false
      })
    },
  },
};
</script>
