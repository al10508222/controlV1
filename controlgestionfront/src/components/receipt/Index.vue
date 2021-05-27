<template>
    <div>
        <q-card>
            <q-card-section>
                <div class="text-h6">
                    <q-icon size="sm" name="fas fa-receipt"/> Generador de recibos
                    <q-btn class="float-right" round size="sm" @click="$router.push('/admin/receipt/create')"  outline color="primary" icon="fas fa-plus" />
                </div>
            </q-card-section>
            <q-card style="width: 100%; max-width: 1400px;">
                <q-card-section>
                    <q-btn color="red" label="Generar pdf" @click="generatePdf()"/>
                </q-card-section>
            </q-card>
        </q-card>
        <br>
    </div>
</template>
<script>
import * as DataService from 'src/services/receipt/ReceiptService';

export default {
  methods: {
    generatePdf() {
      DataService.get().then(() => {
        this.loading = false
      }).catch((err) => {
        console.log(err)
        this.loading = false
      })
    }

  }
}
</script>
