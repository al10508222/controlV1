<template>
  <q-card style="width: 700px max-width: 80vw">
    <q-card-section>
      <div class="text-h6">
        <q-icon size="sm" name="cloud_upload"/>
        Subir documento
      </div>
    </q-card-section>
    <q-card-section>
      <p> Seleccione el archivo en formato xlsx no mayor a 4MB </p>
      <q-file
        v-model="file"
        label="Seleccionar archivo"
        outlined
        accept="xlsx"
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
import * as UploadFileService from 'src/services/EmployeeService'
import { notifyError, notifySuccess } from 'src/utils/notify'

export default {
  props: ['module', 'fileType'],
  data() {
    return {
      file: null,
    }
  },
  methods: {
    upload() {
      const formData = new FormData()
      formData.append('document', this.file)
      formData.append('module', this.module)
      formData.append('fileType', this.fileType)
      this.$q.loading.show()
      UploadFileService.massiveLoad(formData).then((file) => {
        this.$emit('uploaded', file)
        notifySuccess('Carga masiva completada correctamente')

        this.$q.loading.hide()
      }).catch((err) => {
        err = err.response.data
        notifyError(err.message)
        console.log(err.error)
        this.$q.loading.hide()
      })
    },
  }
}
</script>
