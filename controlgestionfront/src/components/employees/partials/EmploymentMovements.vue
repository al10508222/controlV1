<template>
  <div>
    <div class="text-h6">
        Movimientos laborales
        <q-btn class="float-right" round size="sm" @click="$router.push(`/movements/create/${employee.curp}`)" outline color="primary" icon="fas fa-plus" v-if="canCreate && employee.id" />
    </div>

    <!-- <div class="employment-list q-mt-lg" v-for="(employment, index) in employee.employments.slice().reverse()" :key="employment.id">
      <p class="text-blue-10"><i class="fas fa-move"></i>  Movimiento {{employee.employments.length - index}}</p>
      <Employment :employment="employment" :readonly="!canEdit" />

    </div> -->

    <q-timeline layout="dense" color="primary">
      <template v-for="(employment) in employee.employments.slice().reverse()">
          <EmploymentEntry
            :employment="employment"
            :key="employment.id"
          />
        </template>
    </q-timeline>
  </div>
</template>

<script>
import EmploymentEntry from '../partials/EmploymentEntry';

export default {
  components: { EmploymentEntry },
  data() {
    return {
      loading: false,
      search: '',
      separator: 'vertical',
    }
  },
  methods: {
    // newEmployment() {
    //   const lastEmployment = this.employee.employments[this.employee.employments.length - 1];
    //   if (lastEmployment != null) {
    //     let isValid = false;
    //     if (lastEmployment.position == null || lastEmployment.position === '') {
    //       isValid = false
    //     } else {
    //       isValid = true;
    //     }
    //     if (isValid) {
    //       this.$store.commit('employee/addEmployment', {});
    //     } else {
    //       notifyError('Completa el último puesto de trabajo para agregar otro')
    //     }
    //   } else {
    //     this.$store.commit('employee/addEmployment', {});
    //   }
    // }
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
    canEdit: {
      get() {
        return this.canShow('employee-edit');
      }
    },
    canCreate: {
      get() {
        return this.canShow('employee-create');
      }
    }
  }
}
</script>

<style>

</style>
