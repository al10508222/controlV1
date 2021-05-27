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
          <q-td key="lastname" :props="props">
            {{ props.row.lastname }}
          </q-td>
          <q-td key="second_lastname" :props="props">
            {{ props.row.second_lastname }}
          </q-td>
          <q-td key="email" :props="props">
            {{ props.row.email }}
          </q-td>
          <q-td key="rfc" :props="props">
            {{ props.row.rfc }}
          </q-td>
          <q-td key="nss" :props="props">
            {{ props.row.nss }}
          </q-td>
          <q-td key="cellphone" :props="props">
            {{ props.row.cellphone }}
          </q-td>
          <q-td key="actions" :props="props">
            <q-btn-group>
              <q-btn round size="sm" @click="showVacations(props.row.id)" color="amber-7"  icon="fas fa-plane" />
              <q-btn round size="sm" @click="showIncidents(props.row.id)" color="indigo"  icon="fas fa-clipboard-list" />
              <q-btn
                v-if="canEdit"
                @click="editEmployee(props.row.id)"
                round
                size="sm"
                color="primary" icon="fas fa-edit" />
              <q-btn
                v-if="canView && !canEdit"
                @click="editEmployee(props.row.id)"
                round
                size="sm"
                color="teal"
                icon="fas fa-eye" />
              <q-btn v-if="canDelete"
                round size="sm" @click="confirmDelete = true; deleteOption = props.row.id"  color="negative" icon="fas fa-trash" />
              <q-btn round size="sm" color="indigo"  icon="fas fa-list-alt" />
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
          <q-btn flat label="Cancel" color="primary" v-close-popup @click="confirmDelete = false"/>
          <q-btn flat label="Eliminar" color="red"  v-close-popup @click="deleteEmployee(deleteOption);"/>
        </q-card-actions>
      </q-card>
    </q-dialog>
  </div>
</template>

<script>
import { notifyError, notifySuccess } from 'src/utils/notify';
import * as EmployeeService from 'src/services/EmployeeService';

export default {
  components: {},
  data() {
    return {
      data: [],
      confirmDelete: false,
      deleteOption: null,
      auditOption: null,
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
          name: 'lastname', align: 'center', label: 'Primer apellido', field: 'lastname'
        },
        {
          name: 'second_lastname', align: 'center', label: 'Segundo apellido', field: 'second_lastname'
        },
        {
          name: 'email', align: 'center', label: 'Correo electrónico', field: 'email'
        },
        {
          name: 'rfc', align: 'center', label: 'Registro Federal de Contibuyentes', field: 'rfc'
        },
        {
          name: 'nss', align: 'center', label: 'Número de Seguridad Social', field: 'nss'
        },
        {
          name: 'actions', align: 'center', label: 'Acciones', field: 'id'
        },
      ],
    };
  },
  computed: {
    canDelete: {
      get() { return this.canShow('employee-delete') }
    },
    canView: {
      get() { return this.canShow('employee-view') }
    },
    canEdit: {
      get() { return this.canShow('employee-edit') }
    }
  },
  mounted() {
    // get initial data from server (1st page)
    this.onRequest({
      pagination: this.pagination,
      filter: undefined
    })
  },
  methods: {
    payEmployee(id) {
      this.$router.push(`/core/payroll/employee/${id}`);
    },
    showIncidents(id) {
      this.$router.push(`/employees/${id}/incidents`);
    },
    showVacations(id) {
      this.$router.push(`/employees/${id}/vacations`);
    },
    editEmployee(id) {
      this.$router.push(`/employees/${id}/edit`)
    },
    deleteEmployee() {
      this.loading = true;
      EmployeeService.destroy(this.deleteOption).then(() => {
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
      EmployeeService.index({ params: { page, rowsPerPage, search } }).then((employees) => {
        this.data = employees.data
        this.pagination.rowsPerPage = employees.per_page
        this.pagination.page = employees.current_page
        this.pagination.rowsNumber = employees.total
        this.loading = false
      }).catch(() => {
        this.loading = false
      })
    },
    mapAuditEmployees(data) {
      return data.full_name
    },
  },
};
</script>
