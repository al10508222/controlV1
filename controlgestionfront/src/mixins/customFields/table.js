import * as DataService from 'src/services/admin/catalogs/CustomFieldsService';
import { notifySuccess, notifyError } from 'src/utils/notify';
/* eslint-disable no-nested-ternary */
/* eslint-disable object-curly-newline */
export const table = {
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
      confirm: false,
      deleteOption: '',
      data: [],
      loading: false,
      pagination: {
        page: 1,
        rowsPerPage: 5,
        rowsNumber: ''
      },
      search: '',
      separator: 'vertical',
      columns: [
        {
          name: 'name', align: 'center', label: 'Nombre', field: 'name'
        },
        {
          name: 'description', align: 'center', label: 'Descripción', field: 'name'
        },
        {
          name: 'length', align: 'center', label: 'Módulo', field: 'length'
        },
        {
          name: 'cat_modules_id', align: 'center', label: 'Tipo de dato', field: 'cat_modules_id'
        },
        {
          name: 'cat_type_data_id', align: 'center', label: 'Longitud', field: 'cat_type_data_id'
        },
        {
          name: 'actions', align: 'center', label: 'Acciones', field: 'id'
        },
      ],
    };
  },
  methods: {
    edit(id) {
      this.$router.push(`/admin/cat/customFields/${id}/edit`)
    },
    destroy(id) {
      console.log(id);
      DataService.destroy(id).then(() => {
        this.confirm = false;
        this.onRequest({
          pagination: this.pagination,
          filter: undefined
        });
        notifySuccess();
        this.$router.push('/admin/cat/customFields');
      }).catch((err) => {
        this.confirm = false;
        notifyError(err)
      }).finally(() => {
        this.$q.loading.hide();
      })
    },
    onRequest(props) {
      const { page, rowsPerPage } = props.pagination
      const { search } = this
      this.loading = true
      DataService.index({ params: { page, rowsPerPage, search } }).then((pagination) => {
        this.data = pagination.data
        this.pagination.rowsPerPage = pagination.per_page
        this.pagination.page = pagination.current_page
        this.pagination.rowsNumber = pagination.total
        this.loading = false
      }).catch((err) => {
        console.log(err)
        this.loading = false
      })
    },
  },
};
