import * as DataService from 'src/services/calendar/CalendarService';

export const create = {
  data() {
    return {
      form: {
        title: null,
        cat_contract_type_id: null,
        start: null,
        startDate: null,
        endDate: null,
        color: null,

      }
    };
  },
  created() {
    const catalogsConfiguration = { contracts: true, };
    this.$store.dispatch('catalogs/setCatalogs', { params: catalogsConfiguration }).then(() => {
    });
  },
  methods: {
    store() {
      this.$q.loading.show({
        delay: 10000 // ms
      })
      this.submitting = true;
      this.$refs.form.validate().then((valid) => {
        if (valid) {
          if (this.form.cat_contract_type_id === 1) {
            this.form.color = '#FF9AA2';
          } if (this.form.cat_contract_type_id === 2) {
            this.form.color = '#E2F0CB';
          } if (this.form.cat_contract_type_id === 3) {
            this.form.color = '#FFDAC1';
          } if (this.form.cat_contract_type_id === 4) {
            this.form.color = '#C7CEEA';
          }
          const form = { ...this.form };
          this.$q.loading.show();
          DataService.store(form).then(() => {
            this.$q.loading.hide()
            this.$q.notify({
              icon: 'fas fa-smile-beam',
              color: 'positive',
              position: 'top-right',
              textColor: 'white',
              message: 'Se ha creado la fecha de pago correctamente',
            });
            this.$router.push('/calendar');
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
  },
};
