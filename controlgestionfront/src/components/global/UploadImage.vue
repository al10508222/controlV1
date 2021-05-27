<template>
  <q-card style="width: 700px; max-width: 80vw;">
    <q-card-section>
      <div class="text-h6">
        <q-icon size="sm" name="cloud_upload"/>
        Subir imagen
      </div>
    </q-card-section>
    <q-card-section>
      <p> Seleccione una imagen no mayor a 4MB </p>
      <q-file
        v-model="file"
        label="Seleccionar archivo"
        outlined
        :filter="checkFileType"
        @rejected="onRejected"
      >
        <template v-slot:prepend>
          <q-icon name="attach_file" />
        </template>
      </q-file>
    </q-card-section>
    <q-card-actions align="right">
      <q-btn flat icon="close" label="Cerrar" color="primary" v-close-popup />
      <q-btn flat icon="cloud_upload" @click="upload()" label="Subir" color="positive" />
    </q-card-actions>
  </q-card>
</template>

<script>
import * as UploadFileService from 'src/services/global/UploadFileService';

export default {
  props: ['module', 'fileType'],
  data() {
    return {
      file: null,
    }
  },
  methods: {
    onRejected() {
      this.$q.notify({
        type: 'negative',
        message: this.$i18n.t('invalidFile')
      })
    },
    checkFileType(files) {
      return files.filter((file) => file.type === 'image/png' || file.type === 'image/jpeg')
    },
    upload() {
      if (this.file) {
        const formData = new FormData();
        formData.append('document', this.file);
        formData.append('module', this.module);
        formData.append('fileType', this.fileType);
        this.$q.loading.show();
        UploadFileService.upload(formData).then((file) => {
          this.$emit('uploaded', file);
          this.$q.notify({
            icon: 'cloud_upload',
            color: 'positive',
            position: 'top-right',
            textColor: 'white',
            message: 'Se ha subido el documento correctamente',
          });
          this.$q.loading.hide();
        }).catch((err) => {
          console.log(err)
          this.$q.loading.hide();
        })
      }
    },
  }
}
</script>
