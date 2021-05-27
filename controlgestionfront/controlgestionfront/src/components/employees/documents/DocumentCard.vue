<template>
  <q-card class="document-card">
    <q-card-section class="q-pt-xs">
      <div class="row">
        <div class="col text-left">
          <q-chip size="sm" outline v-if="document.expiry_date" icon="event">{{document.expiry_date}}</q-chip>
        </div>
        <div class="col text-right">
          <q-badge v-if="!document.file" outline color="red" label="*Archivo obligatorio" />
          <q-badge v-if="document.file" outline color="positive" label="OK" />
        </div>
      </div>
      <div class="q-mt-sm q-mb-xs text-uppercase">
        {{ document.name }}
      </div>
      <div class="text-caption text-grey" v-if="document.observations">
        {{document.observations}}
      </div>
    </q-card-section>
    <q-card-actions align="right">
      <q-btn v-if="document.file" flat @click="showDialogFile(document.file)"
      round color="blue-grey" icon="remove_red_eye">
        <q-tooltip>Ver documento</q-tooltip>
      </q-btn>
      <q-btn flat round color="grey" @click="showDialog(document)" v-if="canCreate && canEdit" icon="attach_file">
        <q-tooltip>Adjuntar documento</q-tooltip>
      </q-btn>
      <q-btn v-if="document.file" icon="event" flat round>
        <q-popup-proxy transition-show="scale" transition-hide="scale">
          <q-date v-model="document.file.expiry_date">
            <div class="row items-center justify-end q-gutter-sm">
              <q-btn label="Cancel" color="primary" flat v-close-popup />
              <q-btn label="OK" @click="showDateMsg()" color="primary" flat v-close-popup />
            </div>
          </q-date>
        </q-popup-proxy>
        <q-tooltip>Asignar vencimiento</q-tooltip>
      </q-btn>
    </q-card-actions>
    <q-dialog v-model="isShowDialogFile">
      <UploadFile v-on:uploaded="(file) => setDocument(document,file)" module="employee" fileType="pdf"/>
    </q-dialog>
    <q-dialog full-height full-width v-model="isFileShow">
      <q-card>
        <q-card-section class="full-height">
            <q-pdfviewer
            v-model="isFileShow"
            :src="src"
            type="pdfjs"
            content-class="fit container"
            inner-content-class="fit container"
            />
        </q-card-section>
      </q-card>
  </q-dialog>
</q-card>
</template>

<script>
import UploadFile from 'components/global/UploadFile';

export default {
  props: ['document'],
  components: { UploadFile },
  data() {
    return {
      isShowDialogFile: false,
      file: null,
      isFileShow: false,
      src: null,
    };
  },
  created() {
    if (this.document.files && this.document.files.length) {
      this.setDocument(this.document, this.document.files[0])
    }
  },
  methods: {
    setDocument(document, file) {
      document.file = file;
      this.isShowDialogFile = false;
    },
    showDialog() {
      this.isShowDialogFile = true;
    },
    showDialogFile(file) {
      this.src = `${this.$axios.defaults.baseURL}/api/files/show/pdf/${file.id}`;
      this.isFileShow = true;
    },
    showDateMsg() {
      this.$q.notify({
        icon: 'event',
        color: 'positive',
        position: 'top-left',
        textColor: 'white',
        message: 'Se ha asignado la fecha de expiración del documento correctamente',
      });
    },
  },
  computed: {
    canCreate: {
      get() {
        return this.canShow('employee-create');
      }
    },
    canEdit: {
      get() {
        return this.canShow('employee-edit');
      }
    }
  }
}
</script>

<style>
</style>
