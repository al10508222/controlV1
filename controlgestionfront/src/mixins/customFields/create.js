import * as DataService from 'src/services/admin/catalogs/CustomFieldsService';

export const create = {
  data() {
    return {
      form: {
        name: null,
        description: null,
        cat_modules_id: null,
        cat_type_data_id: null,
        length: null,
        is_required: false,
        calculator_field: false,
        default_value: null,
        options: null
      }
    }
  },

  computed: {
    catalogs: {
      get() {
        return this.$store.state.catalogs;
      },
      set(val) {
        this.$store.commit('catalogs/setCatalogs', val)
      },
    },
    calculator: {
      get() {
        return this.form.calculator_field
      },
      set(val) {
        if (val) {
          this.form.cat_type_data_id = 7
          this.form.default_value = 0.0
        } else {
          this.form.cat_type_data_id = ''
          this.form.default_value = ''
        }
        this.form.calculator_field = val
      },
    },
  },
  created() {
    const catalogsConfiguration = { cat_modules: true, cat_type_data: true };
    this.$store.dispatch('catalogs/setCatalogs', { params: catalogsConfiguration }).then(() => {
    });
  },
  mounted() {

  },
  methods: {
    store() {
      this.$refs.form.validate().then((valid) => {
        if (valid) {
          const form = { ...this.form };
          this.$q.loading.show();
          DataService.store(form).then(() => {
            this.$q.notify({
              icon: 'fas fa-smile-beam',
              color: 'positive',
              position: 'top-right',
              textColor: 'white',
              message: 'Se ha creado el documento correctamente',
            });
            this.$router.push('/admin/cat/customFields');
          }).catch((err) => {
            alert(err)
          }).finally(() => {
            this.$q.loading.hide();
          })
        } else {
          this.submitting = false;
        }
      });
    },

  }

}
