import * as DataService from 'src/services/admin/catalogs/CustomFieldsService';

export const edit = {
  data() {
    return {
      data: [],
      form: {
        name: null,
        description: null,
        cat_modules_id: null,
        cat_type_data_id: null,
        length: null,
        is_required: false,
        calculator_field: false,
        default_value: null,
      }
    };
  },
  created() {
    const catalogsConfiguration = { cat_modules: true, cat_type_data: true };
    this.$q.loading.show();
    const { id } = this.$route.params
    this.$store.dispatch('catalogs/setCatalogs', { params: catalogsConfiguration }).then(() => {
      DataService.edit(id).then((data) => {
        this.calculator = data.calculator_field;
        this.form = data;
        this.$q.loading.hide();
      }).catch((err) => {
        console.log(err)
        this.$q.loading.hide();
      })
      this.$q.loading.hide();
    });
  },
  methods: {
    update() {
      this.$refs.form.validate().then((valid) => {
        if (valid) {
          const form = { ...this.form };
          const { id } = this.$route.params
          DataService.update(form, id).then(() => {
            this.$q.notify({
              icon: 'fas fa-smile-beam',
              color: 'positive',
              position: 'top-right',
              textColor: 'white',
              message: 'Se ha actualizado  correctamente',
            });
            this.$router.push('/admin/cat/customFields');
          }).catch((err) => {
            alert(err)
          })
        } else {
          this.submitting = false;
        }
      });
    },
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
};
