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
          <q-td key="ESTRATOUNIDADID" :props="props">
            {{ props.row.ESTRATOUNIDADID }}
          </q-td>
          <q-td key="ESTRATOUNIDADNOMBRE" :props="props">
            {{ props.row.ESTRATOUNIDADNOMBRE }}
          </q-td>
          <q-td key="actions" :props="props">
            <q-btn-group>
              <q-btn round size="sm" @click="verestrato(props.row.ESTRATOUNIDADID)" color="primary" icon="fas fa-eye" v-if="!props.row.deleted_at && canView"/>
              <q-btn round size="sm" @click="editestrato(props.row.ESTRATOUNIDADID)" color="primary" icon="fas fa-edit" v-if="canEdit"/>
              <q-btn round size="sm" @click="confirmDelete = true; deleteOption = props.row.ESTRATOUNIDADID" color="negative" icon="fas fa-trash" v-if="canDelete"/>
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
            <q-btn flat label="Eliminar" color="red"  v-close-popup @click="deleteestrato(deleteOption);"/>
            </q-card-actions>
      </q-card>
    </q-dialog>
  </div>
</template>

<script>
import { notifyError, notifySuccess } from 'src/utils/notify';
import * as EstratosServices from 'src/services/EstratosServices';

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
          name: 'ESTRATOUNIDADID', align: 'center', label: 'ID', field: 'ESTRATOUNIDADID'
        },
        {
          name: 'ESTRATOUNIDADNOMBRE', align: 'center', label: 'Nombre Estrato', field: 'ESTRATOUNIDADNOMBRE'
        },
        {
          name: 'actions', align: 'center', label: 'Acciones', field: 'ESTRATOUNIDADID'
        },
      ],
    };
  },
  computed: {
    canEdit: {
      get() { return this.canShow('estrato-edit') }
    },
    canView: {
      get() { return this.canShow('estrato-view') }
    },
    canDelete: {
      get() { return this.canShow('estrato-delete') }
    },
  },
  methods: {
    editestrato(id) {
      this.$router.push(`/estrato/${id}/edit`)
    },
    verestrato(id) {
      this.$router.push(`/estrato/${id}/show`)
    },
    deleteestrato(id) {
      this.loading = true
      EstratosServices.destroy({ params: { id } }).then((data) => {
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
      EstratosServices.index({ params: { page, rowsPerPage, search } }).then((estrato) => {
        console.log(estrato)
        this.data = estrato.data
        this.pagination.rowsPerPage = estrato.per_page
        this.pagination.page = estrato.current_page
        this.pagination.rowsNumber = estrato.total
        this.loading = false
      }).catch(() => {
        this.loading = false
      })
    },
  },
};
</script>
