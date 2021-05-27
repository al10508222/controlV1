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
          <q-td key="username" :props="props">
            {{ props.row.username }}
          </q-td>
          <q-td key="email" :props="props">
            {{ props.row.email }}
          </q-td>
          <q-td key="name" :props="props">
            {{ props.row.name }}
          </q-td>
          <q-td key="last_name" :props="props">
            {{ props.row.last_name }}
          </q-td>
          <q-td key="second_lastname" :props="props">
            {{ props.row.second_lastname }}
          </q-td>
          <q-td key="actions" :props="props">
            <q-btn-group>
              <q-btn round size="sm" @click="editUser(props.row.id)" color="primary" icon="fas fa-eye" v-if="canView && !canEdit"/>
              <q-btn round size="sm" @click="editUser(props.row.id)" color="primary" icon="fas fa-edit" v-if="!props.row.deleted_at && canEdit"/>
              <q-btn round size="sm" @click="confirmDelete = true; deleteOption=props.row.id" color="negative" icon="fas fa-trash" v-if="!props.row.deleted_at && canDelete"/>
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
            <q-btn flat label="Eliminar" color="red"  v-close-popup @click="deleteUser(deleteOption);"/>
            </q-card-actions>
      </q-card>
    </q-dialog>
  </div>
</template>

<script>
import { notifyError, notifySuccess } from 'src/utils/notify';
import * as UserService from 'src/services/admin/UserService';

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
        rowsPerPage: 5,
        rowsNumber: ''
      },
      search: '',
      separator: 'vertical',
      columns: [
        {
          name: 'username', align: 'center', label: 'Usuario', field: 'username'
        },
        {
          name: 'email', align: 'center', label: 'Correo electrónico', field: 'email'
        },
        {
          name: 'name', align: 'center', label: 'Nombre', field: 'name'
        },
        {
          name: 'last_name', align: 'center', label: 'Primer apellido', field: 'last_name'
        },
        {
          name: 'second_lastname', align: 'center', label: 'Segundo apellido', field: 'second_lastname'
        },
        {
          name: 'actions', align: 'center', label: 'Acciones', field: 'id'
        },
      ],
    };
  },
  computed: {
    canEdit: {
      get() { return this.canShow('users-edit') }
    },
    canView: {
      get() { return this.canShow('users-view') }
    },
    canDelete: {
      get() { return this.canShow('users-delete') }
    },
  },
  methods: {
    editUser(id) {
      this.$router.push(`/admin/users/${id}/edit`)
    },
    deleteUser(id) {
      this.loading = true
      UserService.destroy({ params: { id } }).then((data) => {
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
