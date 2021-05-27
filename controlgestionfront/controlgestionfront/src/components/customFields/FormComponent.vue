<template>
  <div>
    <div v-for="value in employee.customValues" :key="value.id">
      <CustomField :field="value" :readonly="!canEdit" />
    </div>
  </div>
</template>

<script>
import CustomField from './partials/customField';

export default {
  components: { CustomField },
  computed: {
    employee: {
      get() {
        return this.$store.state.employee;
      },
      set(val) {
        this.$store.commit('employee/updateEmployee', val);
      },
    },
    canEdit: {
      get() {
        return this.canShow('employee-edit');
      }
    }
  },
}
</script>

<style>

</style>
