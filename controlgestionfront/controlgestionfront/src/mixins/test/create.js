import * as TestService from 'src/services/admin/catalogs/TestService';
import { notifySuccess } from 'src/utils/notify';

export const create = {
  data() {
    return {
      form: {
        name: '',
        address: '',
        email: '',
        date: '',
        is_required: false,
        is_visible_for_all: false,
        contractTypes: []
      }
    };
  },
  created() {
    const catalogsConfiguration = { dependencies: true };
    this.$q.loading.show();
    this.$store.dispatch('catalogs/setCatalogs', { params: catalogsConfiguration }).then(() => {
      this.$q.loading.hide();
    });
  },
  methods: {
    store() {
      this.$refs.form.validate().then((valid) => {
        if (valid) {
          const form = { ...this.form };
          this.$q.loading.show();
          TestService.store(form).then(() => {
            notifySuccess();
            this.$router.push('/admin/cat/units');
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
      }
    },
  },
};
