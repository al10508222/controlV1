<template>
<div>
  <div>
    <q-card>
      <q-card-section>
        <div class="text-h6">
          <q-icon size="sm" name="fas fa-user-friends"/> Administración / Trabajadores
          <!-- <q-btn class="float-right" round size="sm" @click="$router.push('/employees-report')" outline color="primary" icon="fas fa-file-excel" style="margin-left:8px" /> -->
          <!-- <q-btn class="q-ml-sm float-right" round size="sm" @click="$router.push('/employees/create')"  outline color="primary" icon="fas fa-plus" /> -->
          <q-btn
            v-if="canCreate"
            @click="$router.push('/employees/create')"
            class="q-ml-sm float-right"
            round
            size="sm"
            outline
            color="primary"
            icon="fas fa-plus" />
            <MassiveLoad v-if="canMassiveLoad" v-on:massiveLoadSuccess="reloadTable()" class="q-ml-sm"/>
            <SavedReports class="q-ml-sm"/>
        </div>
      </q-card-section>
    </q-card>
    <Table :key="reload"/>
  </div><br>
  <div>
    <!-- <q-btn :ripple="false" class="float-right" color="primary" label="Generar Reporte" @click="$router.push('/employees-report')" no-caps icon="fas fa-file-excel" /> -->
    <!-- <q-btn round size="sm" @click="editEmployee(props.row.id)"  color="primary" icon="fas fa-edit" /> -->
  </div>
</div>
</template>

<script>
import MassiveLoad from 'components/employees/massive-load/Index';
// import * as InvoiceService from 'src/services/psp/invoices/InvoiceService';
// import SavedReports from 'components/employees/saved-reports/index';
import Table from './Table';

export default {
  components: {
    Table,
    MassiveLoad,
  },
  data() {
    return {
      editDialog: false,
      reload: 0,
    }
  },
  methods: {
    // downloadFile() {
    //   InvoiceService.downloadXML().then((response) => {
    //     const blob = new Blob([response.data], { type: response.data.type })
    //     const linkUrl = window.URL.createObjectURL(blob)
    //     const link = document.createElement('a')
    //     link.href = linkUrl
    //     const title = 'archivo';
    //     link.setAttribute('download', title.replace('Documents/', ''))
    //     document.body.appendChild(link)
    //     link.click()
    //   })
    // },
    reloadTable() {
      this.reload += 1
    },
  },
  computed: {
    canMassiveLoad: {
      get() { return this.canShow('employee-massive-load') }
    },
    canCreate: {
      get() { return this.canShow('employee-create') }
    },
    catalogs: {
      get() {
        return this.$store.state.catalogs;
      },
      set(val) {
        this.$store.commit('catalogs/setCatalogs', val)
      }
    },
    employees: {
      get() {
        return this.$tore.state.employee.employees;
      }
    }
  }
}
</script>
