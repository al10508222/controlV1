<template>
  <div>
    <br/>
    <q-table
      :data="data"
      :columns="columns"
      separator="vertical"
      :pagination.sync="pagination"
      :loading="loading"
      @request="onRequest"
      :filter="search"
    >
     <template v-slot:top-right>
        <q-input borderless dense debounce="400" v-model="search" placeholder="Buscar">
          <template v-slot:append>
            <q-icon name="search" />
          </template>
        </q-input>
      </template>
      {{pagination.data}}
      <template v-slot:body="props">
        <q-tr :props="props">
          <q-td key="name" :props="props">
            {{ props.row.name }}
          </q-td>
          <q-td key="description" :props="props">
            {{ props.row.description }}
          </q-td>
          <q-td key="cat_modules_id" :props="props">
            {{ props.row.module.name }}
          </q-td>
          <q-td key="cat_type_data_id" :props="props">
            {{ props.row.cat_type_data.name }}
          </q-td>
          <q-td key="length" :props="props">
            {{ props.row.length }}
          </q-td>
          <q-td key="actions" :props="props">
            <q-btn-group>
              <q-btn round size="sm" @click="edit(props.row.id)"  color="primary" icon="fas fa-eye" v-if="canView && !canEdit"/>
              <q-btn round size="sm" @click="edit(props.row.id)"  color="primary" icon="fas fa-edit" v-if="canEdit"/>
              <q-btn round size="sm" @click="confirm = true; deleteOption=props.row.id;"  color="negative" icon="fas fa-trash" v-if="canDelete"/>
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
      <q-dialog v-model="confirm" persistent>
        <q-card>
            <q-card-section class="row items-center">
            <span class="q-ml-sm">¿Seguro que desea eliminar este registro?</span>
            </q-card-section>
            <q-card-actions align="right">
            <q-btn flat label="Cancelar" color="primary" v-close-popup/>
            <q-btn flat label="Eliminar" color="red"  @click="destroy(deleteOption);"/>
            </q-card-actions>
        </q-card>
    </q-dialog>
  </div>
</template>

<script>
import { table } from 'src/mixins/customFields/table';

export default {
  mixins: [table],
  props: ['canView', 'canEdit', 'canDelete']
}
</script>
