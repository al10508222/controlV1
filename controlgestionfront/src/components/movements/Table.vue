<template>
    <div>
        <q-table
            :data="data"
            :columns="columns"
            separator="vertical"
            :pagination.sync="pagination"
            :loading="loading"
            @request="onRequest"
            :filter="search"
            class="q-mt-md"
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
                    <q-td key="employment_type" :props="props">
                        {{ props.row.employment_type.name }}
                    </q-td>
                    <q-td key="date" :props="props">
                        {{ props.row.date }}
                    </q-td>
                    <q-td key="position" :props="props">
                        {{ props.row.position ? props.row.position.name : 'N/A' }}
                    </q-td>
                    <q-td key="employee" :props="props">
                        {{ props.row.employee ? props.row.employee.full_name : 'N/A' }}
                    </q-td>
                    <q-td key="contract" :props="props">
                        {{ props.row.contract_type ?  props.row.contract_type.name : 'N/A' }}
                    </q-td>
                    <q-td key="unit" :props="props">
                        {{ props.row.unit ? props.row.unit.name : 'N/A' }}
                    </q-td>
                    <q-td key="location" :props="props">
                        {{ props.row.location ? props.row.location.name : 'N/A' }}
                    </q-td>
                    <q-td key="actions" :props="props">
                        <q-btn-group>
                        <q-btn round size="sm" @click="edit(props.row.id)"  color="primary" icon="fas fa-eye" v-if="canView && !canEdit" />
                        <q-btn
                          v-if="canDelete"
                          round
                          size="sm"
                          @click="confirmDelete = true; deleteOption = props.row.id"
                          color="negative"
                          icon="fas fa-trash"/>
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
            <q-btn flat label="Eliminar" color="red"  v-close-popup @click="deleteMovement(deleteOption);"/>
            </q-card-actions>
          </q-card>
        </q-dialog>
    </div>
</template>
<script>

import * as DataService from 'src/services/MovementService';
import { notifyError, notifySuccess } from 'src/utils/notify';

export default {
  components: {

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
        rowsNumber: '',
      },
      search: '',
      separator: 'vertical',
      columns: [
        {
          name: 'employment_type', align: 'center', label: 'Tipo de movimiento', field: 'employment_type'
        },
        {
          name: 'date', align: 'center', label: 'Fecha', field: 'date'
        },
        {
          name: 'position', align: 'center', label: 'Puesto', field: 'position'
        },
        {
          name: 'employee', align: 'center', label: 'Empleado', field: 'employee'
        },
        {
          name: 'contract', align: 'center', label: 'Contratación', field: 'contract'
        },
        {
          name: 'unit', align: 'center', label: 'Unidad', field: 'unit'
        },
        {
          name: 'location', align: 'center', label: 'Ubicación', field: 'location'
        },
        {
          name: 'actions', align: 'center', label: 'Acciones', field: 'id'
        },
      ]
    }
  },
  mounted() {
    this.onRequest({
      pagination: this.pagination,
      filter: undefined
    })
  },
  methods: {
    deleteMovement() {
      this.loading = true
      DataService.destroy(this.deleteOption).then(() => {
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
    edit(id) {
      this.$router.push(`/movements/${id}/edit`)
    },
    onRequest(props) {
      const { page, rowsPerPage } = props.pagination
      const { search } = this
      this.loading = true
      DataService.index({ params: { page, rowsPerPage, search } }).then((response) => {
        this.data = response.data
        this.pagination.rowsPerPage = response.per_page
        this.pagination.page = response.current_page
        this.pagination.rowsNumber = response.total
        this.loading = false
      }).catch(() => {
        this.loading = false
      })
    }
  },
  computed: {
    canView: {
      get() {
        return this.canShow('movements-view');
      }
    },
    canDelete: {
      get() {
        return this.canShow('movements-delete')
      }
    },
    canEdit: {
      get() {
        return this.canShow('movements-edit');
      }
    }
  }
}
</script>
