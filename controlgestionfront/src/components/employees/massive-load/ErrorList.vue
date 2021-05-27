<template>
  <q-card style="width: 700px; max-width: 80vw;">
    <q-card-section>
      <div class="text-h6">
        <q-icon size="sm" name="cloud_upload"/>
        Resumen de errores
      </div>
    </q-card-section>
    <q-card-section>
      <div>
        <br/>
        <q-table
          style="height: 300px"
          class="no-shadow"
          :data="errors"
          :columns="columns"
          separator="vertical"
          :pagination.sync="pagination"
          :loading="loading"
          virtual-scroll
          :rows-per-page-options="[0]"
        >
          <template v-slot:body="props">
            <q-tr :props="props">
              <q-td  key="row" :props="props">
                {{ props.row.row }}
              </q-td>
              <q-td key="errors" :props="props">
                <!-- {{ props.row.errors }} -->
                <q-item-section v-for="(item ) in props.row.errors " :key="item">
                  {{ item }}
                </q-item-section>
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
    </q-card-section>
    <q-card-actions align="right">
      <q-btn flat icon="close" label="Cerrar" color="primary" v-close-popup />
    </q-card-actions>
  </q-card>
</template>

<script>

export default {
  props: {
    errors: {}
  },
  data() {
    return {
      loading: false,
      pagination: {
        rowsPerPage: 0,
      },
      separator: 'vertical',
      columns: [
        {
          name: 'row', align: 'center', label: 'Registro', field: 'row'
        },
        {
          name: 'errors', align: 'center', label: 'Errores', field: 'errors'
        },
      ],
    };
  },
  created() {
  },
  methods: {
  }
}
</script>
