<template>
   <div class="float-right">
    <q-btn class="q-ml-sm float-right" @click="showDialog = true;" round size="sm" icon="fas fa-file-excel" outline color="primary" type="info">
    </q-btn>

    <q-dialog v-model="showDialog">
       <q-card style="width: 560px; max-width: 80vw; height: 120px;" v-if="modules.length == 0">
       <q-card-section style="text-align:center; margin-top: 30px;">
          <div>
              <q-icon size="2em" name="sentiment_dissatisfied" />
                <span>
                  Aún no hay reportes guardados
                </span>
            </div>
          </q-card-section>
          </q-card>
      <div v-for="(item, key) in modules.filter(item => item.id === 1)" :key="key">
      <q-card style="width: 560px; max-width: 80vw;">
       <q-card-section>
          <div class="text-h6">{{item.name}}</div>
        </q-card-section>
       <q-separator />
        <q-card-section class="q-pt-none">
              <q-list bordered separator style="margin-top: 2rem;">
                        <q-item clickable v-ripple v-for="(item2, key2) in item.report_manager" :key="key2">
                          <q-item-section> {{item2.name}} </q-item-section>
                            <q-btn-group>
                            <q-btn round size="sm" @click="downloadReport('excel', item2.payload)"  color="primary"  icon="fas fa-file-excel" />
                            <q-btn round size="sm" @click="downloadReport('pdf', item2.payload)"  color="negative" icon="fas fa-file-pdf" />
                            <q-btn round size="sm" @click="downloadReport('csv', item2.payload)"  color="primary" icon="fas fa-file-csv" />
                            </q-btn-group>
                        </q-item>
                      </q-list>
          </q-card-section>
        <q-card-actions align="right" class="bg-white text-teal">
          <q-btn flat label="OK" color="primary" v-close-popup />
        </q-card-actions>
            <!-- <Table :key="reload"/> -->
      </q-card>
        </div>
    </q-dialog>
  </div>
</template>

<script>
import * as ReportService from 'src/services/reports/ReportService';
import { employeeReportMix } from 'src/mixins/employeeReport/employeeReportMix';
// import Table from './Table';

export default {
  mixins: [employeeReportMix],
  components: {
    // Table,
  },
  data() {
    return {
      showDialog: false,
      reload: 0,
      modules: []
    }
  },
  created() {
    this.initServices();
  },

  mounted() {

  },
  methods: {
    initServices() {
      this.loading = true
      ReportService.index().then((response) => {
        this.modules = response.modules;
        this.loading = false
      }).catch(() => {
        this.loading = false
      })
    }
  },
}
</script>
