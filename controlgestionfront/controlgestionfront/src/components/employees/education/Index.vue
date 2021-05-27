<template>
  <div>
    <div class="text-right">
      <q-btn round size="sm" @click="dialogs.experience = true"  outline color="primary" icon="fas fa-plus" v-if="canCreate"/>
    </div>
    <q-dialog v-model="dialogs.experience">
      <CreateEducation/>
    </q-dialog>
     <q-dialog v-model="dialogs.editEducation">
      <EditEducation :education="currentEducation" :readonly="!canEdit"/>
    </q-dialog>

    <q-timeline layout="dense" color="primary">
        <template v-for="(entry, index) in employee.education">
          <EducationEntry
            :education="entry"
            :key="entry.id"
            @edit="(education) => onEditEntry(education, index)"
            @delete="(education) => onDeleteEntry(education, index)"
          />
        </template>
    </q-timeline>
  </div>
</template>

<script>
import { notifyError } from 'src/utils/notify';
import * as EmployeeService from 'src/services/EmployeeService';
import CreateEducation from './Create';
import EditEducation from './Edit';
import EducationEntry from './Entry';

export default {
  components: { CreateEducation, EducationEntry, EditEducation },
  computed: {
    employee: {
      get() {
        return this.$store.state.employee;
      },
    },
    canEdit() {
      return this.canShow('employee-edit');
    },
    canCreate: {
      get() {
        return this.canShow('employee-create');
      }
    }
  },
  data() {
    return {
      currentEducation: {
      },
      dialogs: {
        experience: false,
        editEducation: false
      }
    };
  },
  methods: {
    onEditEntry(education, index) {
      this.dialogs.editEducation = true
      this.currentEducation = education
      this.currentEducation.index = index;
    },
    onDeleteEntry(education, index) {
      if (education.id !== undefined && education.id !== '') {
        EmployeeService.destroyEntry({ params: { type: 'education', id: education.id } }).then((data) => {
          if (data.success) {
            this.employee.education.splice(index, 1)
          } else {
            notifyError();
          }
        });
      } else {
        // Only delete from array state
        this.employee.education.splice(index, 1);
      }
    }
  }
}
</script>

<style>

</style>
