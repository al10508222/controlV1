<template>
  <div class="q-pa-md">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-3"  v-for="document in employee.documents" v-bind:key="document.id">
          <DocumentCard :document="document" />
      </div>
    </div>
  </div>
</template>

<script>
import DocumentCard from '../documents/DocumentCard';

export default {
  components: { DocumentCard },
  data() {
    return {
    }
  },
  methods: {
  },
  created() {
    if (this.employee.documents.length <= 0) {
      this.employee.documents = this.$store.state.catalogs.documents_employee
    }
  },
  computed: {
    employee: {
      get() {
        return this.$store.state.employee;
      },
      set(val) {
        this.$store.commit('employee/updateEmployee', val);
      },
    },
    catalogs: {
      get() {
        return this.$store.state.catalogs;
      }
    },
    documents: {
      get() {
        return this.$store.state.employee.documents;
      },
    },
  }
};
</script>

<style>

</style>
