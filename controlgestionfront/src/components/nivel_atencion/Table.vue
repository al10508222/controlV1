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
          <q-td key="NIVELATENCIONID" :props="props">
            {{ props.row.NIVELATENCIONID }}
          </q-td>
          <q-td key="NIVELATENCIONNOMBRE" :props="props">
            {{ props.row.NIVELATENCIONNOMBRE }}
          </q-td>
          <q-td key="actions" :props="props">
            <q-btn-group>
              <q-btn round size="sm" @click="verNivelAtencion(props.row.NIVELATENCIONID)" color="primary" icon="fas fa-eye" v-if="!props.row.deleted_at && canView"/>
              <q-btn round size="sm" @click="editNivelAtencion(props.row.NIVELATENCIONID)" color="primary" icon="fas fa-edit" v-if="canEdit"/>
              <q-btn round size="sm" @click="confirmDelete = true; deleteOption = props.row.NIVELATENCIONID" color="negative" icon="fas fa-trash" v-if="canDelete"/>
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
            <q-btn flat label="Eliminar" color="red"  v-close-popup @click="deleteNivelAtencion(deleteOption);"/>
            </q-card-actions>
      </q-card>
    </q-dialog>
  </div>
</template>

<script>
import { notifyError, notifySuccess } from 'src/utils/notify';
import * as NivelAtencionServices from 'src/services/NivelAtencionServices';

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
          name: 'NIVELATENCIONID', align: 'center', label: 'ID', field: 'NIVELATENCIONID'
        },
        {
          name: 'NIVELATENCIONNOMBRE', align: 'center', label: 'Nombre Nivel', field: 'NIVELATENCIONNOMBRE'
        },
        {
          name: 'actions', align: 'center', label: 'Acciones', field: 'NIVELATENCIONID'
        },
      ],
    };
  },
  computed: {
    canEdit: {
      get() { return this.canShow('nivel_atencion-edit') }
    },
    canView: {
      get() { return this.canShow('nivel_atencion-view') }
    },
    canDelete: {
      get() { return this.canShow('nivel_atencion-delete') }
    },
  },
  methods: {
    editNivelAtencion(id) {
      this.$router.push(`/nivel_atencion/${id}/edit`)
    },
    verNivelAtencion(id) {
      this.$router.push(`/nivel_atencion/${id}/show`)
    },
    deleteNivelAtencion(id) {
      this.loading = true
      NivelAtencionServices.destroy({ params: { id } }).then((data) => {
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
      NivelAtencionServices.index({ params: { page, rowsPerPage, search } }).then((NivelAtencion) => {
        this.data = NivelAtencion.data
        this.pagination.rowsPerPage = NivelAtencion.per_page
        this.pagination.page = NivelAtencion.current_page
        this.pagination.rowsNumber = NivelAtencion.total
        this.loading = false
      }).catch(() => {
        this.loading = false
      })
    },
  },
};
</script>
