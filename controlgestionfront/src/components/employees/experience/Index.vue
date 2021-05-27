<template>
  <div>
    <div class="text-right">
      <q-btn
        round
        size="sm"
        @click="dialogs.experience = true"
        outline
        color="primary"
        icon="fas fa-plus"
        v-if="canCreate"
      />
    </div>
    <q-dialog v-model="dialogs.experience">
      <CreateExperience />
    </q-dialog>
    <q-dialog v-model="dialogs.edit">
      <EditExperience :experience="currentEntry" :readonly="!canEdit"/>
    </q-dialog>
    <q-timeline layout="dense" color="primary">
        <template v-for="(job, index) in employee.jobs">
          <ExperienceEntry
            :experience="job"
            :key="job.id"
            @edit="(entry) => onEditEntry(entry, index)"
            @delete="(entry) => onDeleteEntry(entry, index)"
          />
        </template>
    </q-timeline>
  </div>
</template>

<script>
import { notifyError } from 'src/utils/notify';
import * as EmployeeService from 'src/services/EmployeeService';
import CreateExperience from './Create';
import EditExperience from './Edit';
import ExperienceEntry from '../partials/ExperienceEntry';

export default {
  components: { CreateExperience, ExperienceEntry, EditExperience },
  computed: {
    employee: {
      get() {
        return this.$store.state.employee;
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
  },
  data() {
    return {
      currentEntry: {},
      job: {
        company: '',
        position: '',
        start_date: '',
        end_date: '',
        description: '',
      },
      dialogs: {
        experience: false,
        edit: false,
      },
    };
  },
  methods: {
    onEditEntry(entry, index) {
      this.dialogs.edit = true
      this.currentEntry = entry
      this.currentEntry.index = index;
    },
    onDeleteEntry(entry, index) {
      if (entry.id !== undefined && entry.id !== '') {
        // Go delete the entry on the backend :C
        EmployeeService.destroyEntry({ params: { type: 'experience', id: entry.id } }).then((data) => {
          if (data.success) {
            this.employee.jobs.splice(index, 1)
          // On true need to update model
          } else {
            notifyError();
          }
        });
      } else {
        this.employee.jobs.splice(index, 1)
      }
    }
  },
};
</script>

<style>
</style>
