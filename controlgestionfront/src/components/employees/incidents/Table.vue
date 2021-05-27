<template>
    <div>
        <q-table
            :data="data"
            :columns="columns"
            separator="vertical"
            :pagination.sync="pagination"
            :loading="loading"
            @request="onRequest"
            :filter="filter"
            >
            <!-- <template v-slot:top></template> -->
            <template v-slot:body="props">
                <q-tr :props="props">
                    <q-td key="from" :props="props">
                        {{ props.row.dates[0].date }}
                    </q-td>
                    <q-td key="to" :props="props">
                        {{ props.row.dates[props.row.dates.length -1].date }}
                    </q-td>
                    <q-td key="type">
                        {{ props.row.incident_type.name }}
                    </q-td>
                    <q-td key="observation">
                        {{ props.row.observation }}
                    </q-td>
                    <q-td key="total_days">
                        {{ props.row.dates.length }}
                    </q-td>
                    <q-td key="actions">
                        <q-btn-group>
                            <q-btn round size="sm" @click="editIncident(props.row.id)"  color="primary" icon="fas fa-edit" />
                            <q-btn round size="sm" @click="deleteIncident(props.row.id, props.rowIndex)"  color="negative" icon="fas fa-trash" />
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
import * as DataService from 'src/services/employee/IncidentService';
import { notifySuccess } from 'src/utils/notify'

export default {
  data() {
    return {
      data: [],
      loading: false,
      pagination: {
        page: 1,
        rowsPerPage: 10,
        rowsNumber: ''
      },
      filter: {
        search: '',
      },
      columns: [
        {
          name: 'from', align: 'center', label: 'Desde', field: 'from'
        },
        {
          name: 'to', align: 'center', label: 'Hasta', field: 'to'
        },
        {
          name: 'type', align: 'center', label: 'Tipo de incidencia', field: 'type'
        },
        {
          name: 'observation', align: 'center', label: 'Observación', field: 'observation'
        },
        {
          name: 'total_days', align: 'center', label: 'Días', field: 'total_days'
        },
        {
          name: 'actions', align: 'center', label: 'Acciones', field: 'id'
        },
      ],
    }
  },
  mounted() {
    this.onRequest({
      pagination: this.pagination,
      filter: undefined
    })
  },
  created() {
  },
  methods: {
    editIncident(incidentId) {
      const { id } = this.$route.params;
      this.$router.push(`/employees/${id}/incidents/${incidentId}/edit`)
    },
    deleteIncident(incidentId) {
      const { id } = this.$route.params;
      this.$q.loading.show();
      DataService.destroy(id, incidentId).then(() => {
        this.confirm = false;
        this.onRequest({
          pagination: this.pagination,
          filter: undefined
        });
        notifySuccess();
      }).catch(() => {
        this.confirm = false;
      }).finally(() => {
        this.$q.loading.hide();
      })
    },
    onRequest(props) {
      const { page, rowsPerPage } = props.pagination
      const { filter } = this
      const { id } = this.$route.params;
      this.loading = true
      DataService.index({ params: { page, rowsPerPage, filter } }, id).then((res) => {
        this.data = res.data
        this.pagination.rowsPerPage = res.per_page
        this.pagination.page = res.current_page
        this.pagination.rowsNumber = res.total
      }).catch((err) => {
        console.log(err)
        this.loading = false
      }).finally(() => {
        this.loading = false
      })
    },
  }
}
</script>
