<template>
  <div>
    <br/>
    <q-table
      :data="filteredJurisdicciones"
      :columns="columns"
      separator="vertical"
      :pagination.sync="pagination"
      :loading="loading"
      @request="onRequest"
      :filter="search"
    >
      <template v-slot:top>
        <q-card style="width: 100%">
              <q-separator />
              <div class="q-pa-sm">
                <q-card-section>
                  <div class="row q-col-gutter-sm">
                    <div class="col-xs-4 col-sm-4 col-md-4 q-mb-md">
                      <q-select v-model="form.ENTIDADFEDERATIVAID" option-value="ENTIDADFEDERATIVAID" option-label="ENTIDADFEDERATIVANOMBRE" label="Entidad Federativa" map-options emit-value :options="catalogs.entidades" @input="change" id="entidad_federativa" />
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 q-mb-md" hidden>
                      <q-input borderless dense debounce="400" v-model="search" placeholder="Buscar">
                        <template v-slot:append>
                          <q-icon name="search" />
                        </template>
                      </q-input>
                    </div>
                  </div>
                </q-card-section>
              </div>
            </q-card>
      </template>
      <template v-slot:body="props">
        <q-tr :props="props">
          <q-td key="JURISDICCIONID" :props="props">
            {{ props.row.JURISDICCIONID }}
          </q-td>
          <q-td key="JURISDICCIONNOMBRE" :props="props">
            {{ props.row.JURISDICCIONNOMBRE }}
          </q-td>
          <q-td key="actions" :props="props">
            <q-btn-group>
              <q-btn round size="sm" @click="verJurisdicciones(props.row.id)" color="primary" icon="fas fa-eye" v-if="!props.row.deleted_at && canView"/>
              <q-btn round size="sm" @click="editJurisdicciones(props.row.id)" color="primary" icon="fas fa-edit" v-if="canEdit"/>
              <q-btn round size="sm" @click="confirmDelete = true; deleteOption = props.row.id" color="negative" icon="fas fa-trash" v-if="canDelete"/>
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
    <q-dialog v-model="confirmDelete" persistent>
      <q-card>
        <q-card-section class="row items-center">
            <span class="q-ml-sm">¿Seguro que desea eliminar este registro?</span>
            </q-card-section>
            <q-card-actions align="right">
            <q-btn flat label="Cancel" color="primary" v-close-popup/>
            <q-btn flat label="Eliminar" color="red"  v-close-popup @click="deleteJurisdicciones(deleteOption);"/>
            </q-card-actions>
      </q-card>
    </q-dialog>
  </div>
</template>

<script>
import { notifyError, notifySuccess } from 'src/utils/notify';
import * as JurisdiccionesService from 'src/services/JurisdiccionesServices';

export default {
  components: {
  },
  mounted() {
    // get initial data from server (1st page)
    this.onRequest({
      pagination: this.pagination,
      filter: undefined
    })
  },
  data() {
    return {
      filteredJurisdicciones: [],
      loading: false,
      deleteOption: '',
      confirmDelete: false,
      pagination: {
        page: 1,
        rowsPerPage: 200,
        rowsNumber: ''
      },
      search: '',
      separator: 'vertical',
      columns: [
        {
          name: 'JURISDICCIONID', align: 'center', label: 'ID', field: 'JURISDICCIONID'
        },
        {
          name: 'JURISDICCIONNOMBRE', align: 'center', label: 'Nombre Jurisdicción', field: 'JURISDICCIONNOMBRE'
        },
        {
          name: 'actions', align: 'center', label: 'Acciones', field: 'id'
        },
      ],
      form: {
        JURISDICCIONID: '',
        JURISDICCIONNOMBRE: ''
      },
      MUNICIPIOID: '',
    };
  },
  created() {
    const catalogsConfiguration = { entidades: true };
    this.$q.loading.show();
    this.$store.dispatch('catalogs/setCatalogs', { params: catalogsConfiguration }).then(() => {
      this.$q.loading.hide();
    });
  },
  computed: {
    canEdit: {
      get() { return this.canShow('jurisdicciones-edit') }
    },
    canView: {
      get() { return this.canShow('jurisdicciones-view') }
    },
    canDelete: {
      get() { return this.canShow('jurisdicciones-delete') }
    },
    catalogs: {
      get() {
        return this.$store.state.catalogs;
      },
      set(val) {
        this.$store.commit('catalogs/setCatalogs', val)
      }
    },
  },
  methods: {
    editJurisdicciones(id) {
      this.$router.push(`/jurisdicciones/${id}/edit`)
    },
    verJurisdicciones(id) {
      this.$router.push(`/jurisdicciones/${id}/show`)
      console.log(this.$router.push)
    },
    deleteJurisdicciones(id) {
      this.loading = true
      JurisdiccionesService.destroy({ params: { id } }).then((data) => {
        if (data.success) {
          notifySuccess()
          this.onRequest({
            pagination: this.pagination,
            filter: undefined
          })
          // On true need to update model
        } else {
          notifyError();
        }
      }).catch(() => {
        this.loading = false
      })
    },
    onRequest(props) {
      const { page, rowsPerPage } = props.pagination
      const { search } = this
      this.loading = true
      JurisdiccionesService.index({ params: { page, rowsPerPage, search } }).then((jurisdicciones) => {
        this.pagination.rowsPerPage = jurisdicciones.per_page
        this.loading = false
      }).catch(() => {
        this.loading = false
      })
    },
    change(val) {
      const catalogsConfiguration = { jurisdicciones: true };
      this.$q.loading.show();
      this.$store.dispatch('catalogs/setCatalogs', { params: catalogsConfiguration }).then(() => {
        this.$q.loading.hide();
      });
      this.filteredJurisdicciones = this.catalogs.jurisdicciones.filter((e) => val === e.ENTIDADFEDERATIVAID)
    },
  },
};
</script>
