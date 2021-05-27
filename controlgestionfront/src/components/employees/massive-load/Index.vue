<template>
  <div class="float-right">
    <q-btn class="float-right" @click="openDialog" round size="sm" icon="fas fa-upload" outline color="primary" type="info">
      <q-tooltip>
        Carga masiva
      </q-tooltip>
    </q-btn>
    <q-dialog v-model="showDialog">
      <q-card>
        <q-card-section>
          <div class="text-h6"><q-icon size="sm" name="fas fa-file-excel"/>Carga masiva</div>
        </q-card-section>
        <q-card-section class="q-pt-none">
          Descarga el documento y llena los datos segun el formato para poder realizar la carga masiva.
          <a rel="nofollow" href="/excel/carga_masiva_trabajadores.xlsx">descargar formato</a>
          <br/>
          <br/>
          <div class="row" v-if="!document.file">
            <q-btn color="white" text-color="black" @click="showDialogUpload(document)" label="Subir documento" />
          </div>
          <div v-if="document.file" class="q-mt-sm q-mb-xs text-uppercase">
            <div class="row">
              <q-chip   color="primary" text-color="white">
                <div class="col text-left">
                  {{ document.file.originalname }}
                </div>
                <div class="col text-right">
                  <q-btn v-if="document.file" flat @click="destroyDocument()"
                         round color="blue-grey" icon="fas fa-times">
                    <q-tooltip>Eliminar documento</q-tooltip>
                  </q-btn>
                </div>
              </q-chip>
            </div>
          </div>
        </q-card-section>

        <q-card-actions align="right">
          <q-btn flat label="OK" color="primary" v-close-popup />
        </q-card-actions>
      </q-card>
    </q-dialog>
    <q-dialog v-model="showDialogFile">
      <UploadXlsx v-on:uploaded="(file) => setDocument(document,file)" module="provider" fileType="xlsx"/>
    </q-dialog>
    <q-dialog v-model="showDialogErrors">
      <ErrorList :errors="errors"/>
    </q-dialog>
  </div>
</template>

<script>
import UploadXlsx from 'components/employees/massive-load/UploadXlsx';
import ErrorList from 'components/employees/massive-load/ErrorList';

export default {
  components: {
    ErrorList,
    UploadXlsx
  },
  data() {
    return {
      showingDialog: false,
      showDialogFile: false,
      showDialogErrors: false,
      document: {},
      editDialog: false,
      errors: [],
      reloadTable: false,
    }
  },
  computed: {
    showDialog: {
      get() {
        return this.showingDialog
      },
      set(v) {
        this.showingDialog = v
        if (v === false && this.reloadTable) {
          this.$emit('massiveLoadSuccess')
        }
      },
    }
  },
  methods: {
    openDialog() {
      this.showDialog = true
      this.reloadTable = false
      this.destroyDocument()
    },
    showDialogUpload() {
      this.showDialogFile = true;
    },
    destroyDocument() {
      this.document = {};
    },
    async setDocument(document, file) {
      document.file = file;
      this.showDialogFile = false;
      this.reloadTable = file.inserted
      if (file.errors) {
        this.errors = file.errors;
        this.showDialogErrors = true;
      }
    },
  },
}
</script>

<style scoped>

</style>
