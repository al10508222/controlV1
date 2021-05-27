<template>
    <div>
        <q-card>
             <q-card-section>
               {{catalogs.cat_custom_fields}}
               <div v-for="custom in catalogs.cat_custom_fields" v-bind:key="custom.id">
                  {{catalogs.cat_custom_fields.model}}
                  <div>
                      <q-input v-model="custom.model" v-if="custom.cat_type_data_id ===1"  outlined map-options emit-value   :v-model="custom.cat_type_data" :label="custom.name" :maxlength="custom.length" />
                  </div>
                  <br/>
                  <div>
                      <div>
                          <q-select v-model="custom.model" outlined map-options emit-value v-if="custom.cat_type_data_id ===2" option-value="id" option-label="name" :options="custom.pivot" :label="custom.name" />
                      </div>
                  </div>
                  <br/>
                  <div >
                    <span v-if="custom.cat_type_data_id ===3">{{custom.name}}</span>
                      <div v-for="pivote in custom.pivot" v-bind:key="pivote.id">
                          <q-radio  :val="pivote.id" v-model="custom.model" :label="pivote.name" v-if="custom.cat_type_data_id ===3"/>
                      </div>
                  </div>
                  <br/>
                  <div>
                      <div>
                          <q-checkbox v-if="custom.cat_type_data_id ===4" v-model="custom.model" :label="custom.name"></q-checkbox>
                      </div>
                  </div>
                  <br/>
                  <div>
                      <q-input v-model="custom.model" v-if="custom.cat_type_data_id ===5" type="textarea" outlined map-options emit-value   :v-model="custom.cat_type_data" :label="custom.name" :maxlength="custom.length" />
                  </div>
                  <div>
                      <div>
                          <q-input square outlined v-if="custom.cat_type_data_id ===6" v-model="custom.model"  :label="custom.name" mask="date">
                              <template v-slot:prepend>
                                  <q-icon name="event" class="cursor-pointer">
                                   <q-popup-proxy ref="qDateProxy" transition-show="scale" transition-hide="scale">
                                    <q-date
                                      v-model="custom.model"
                                     />
                                  </q-popup-proxy>
                                  </q-icon>
                              </template>
                          </q-input>
                      </div>
                  </div>
                  <div>
                      <q-input v-if="custom.cat_type_data_id ===7" type="number" outlined map-options emit-value   v-model="custom.model" :label="custom.name" :maxlength="custom.length" />
                  </div>
                </div>
        </q-card-section>
    </q-card>
    </div>
</template>
<script>
// import * as DataService from 'src/services/admin/RenderService';

export default {
  data() {
    return {
      customFields: {},
      calendar: null,
      options: [],
      modelo: null,
      cat_custom_fields: [],
      customField: {
      },
      custom: {
        cat_type_data: null,
      }
    }
  },

  computed: {
    documents: {
      get() {
        return this.customField;
      },
      set(val) {
        this.$store.commit('employee/updateDocuments', val);
      },
    },
    catalogs: {
      get() {
        return this.$store.state.catalogs;
      },
      set(val) {
        this.$store.commit('catalogs/setCatalogs', val)
      },
    },
  },
  created() {
    const catalogsConfiguration = { cat_custom_fields: true, cat_modules: true, };
    this.$store.dispatch('catalogs/setCatalogs', { params: catalogsConfiguration }).then(() => {
    });
  },
  methods: {

  }

}
</script>
