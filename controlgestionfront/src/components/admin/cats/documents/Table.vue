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
          <q-td key="name" :props="props">
            {{ props.row.name }}
          </q-td>
          <q-td key="observations" :props="props">
            {{ props.row.observations }}
          </q-td>
          <q-td key="actions" :props="props">
            <q-btn-group>
              <q-btn round size="sm" @click="editDocument(props.row.id)"  color="primary" icon="fas fa-eye" v-if="canView && !canEdit"/>
              <q-btn round size="sm" @click="editDocument(props.row.id)"  color="primary" icon="fas fa-edit" v-if="canEdit"/>
              <q-btn round size="sm" @click="deleteDocument(props.row.id)"  color="negative" icon="fas fa-trash" v-if="canDelete"/>
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
  </div>
</template>

<script>
import * as DataService from 'src/services/admin/catalogs/DocumentService';
import { notifyError, notifySuccess } from 'src/utils/notify';

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
          name: 'observations', align: 'center', label: 'Observaciones', field: 'observations'
        },
        {
          name: 'actions', align: 'center', label: 'Acciones', field: 'id'
        },
      ],
    };
  },
  computed: {
    canEdit: {
      get() { return this.canShow('catalogs-edit') }
    },
    canView: {
      get() { return this.canShow('catalogs-view') }
    },
    canDelete: {
      get() { return this.canShow('catalogs-delete') }
    },
  },
  methods: {
    editDocument(id) {
      this.$router.push(`/admin/cat/documents/${id}/edit`)
    },
    deleteDocument(id) {
      DataService.destroy(id).then(() => {
        this.confirm = false
        this.onRequest({
          pagination: this.pagination,
          filter: undefined
        })
        notifySuccess()
        this.$router.push('/admin/cat/documents')
      }).catch((err) => {
        this.confirm = false
        notifyError(err)
      }).finally(() => {
        this.$q.loading.hide()
      })
    },
    onRequest(props) {
      const { page, rowsPerPage } = props.pagination
      const { search } = this
      this.loading = true
      DataService.index({ params: { page, rowsPerPage, search } }).then((pagination) => {
        this.data = pagination.data
        this.pagination.rowsPerPage = pagination.per_page
        this.pagination.page = pagination.current_page
        this.pagination.rowsNumber = pagination.total
        this.loading = false
      }).catch((err) => {
        console.log(err)
        this.loading = false
      })
    },
  },
};
</script>
