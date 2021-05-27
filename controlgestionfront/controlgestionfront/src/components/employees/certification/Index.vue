<template>
  <div>
    <div class="text-right">
      <q-btn round size="sm" @click="dialogs.experience = true"  outline color="primary" icon="fas fa-plus" v-if="canCreate"/>
    </div>
    <q-dialog v-model="dialogs.experience">
      <CreateCertification />
    </q-dialog>
    <q-dialog v-model="dialogs.edit">
      <EditCertification :certification="currentEntry" :readonly="!canEdit"/>
    </q-dialog>
    <q-timeline layout="dense" color="primary">
        <template v-for="(certification, index) in employee.certifications">
          <CertificationEntry
            :certification="certification"
            :key="certification.id"
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
import CreateCertification from './Create';
import EditCertification from './Edit';
import CertificationEntry from '../partials/CertificationEntry';

export default {
  components: { CreateCertification, CertificationEntry, EditCertification },
  computed: {
    employee: {
      get() {
        return this.$store.state.employee;
      },
    },
    canCreate: {
      get() {
        return this.canShow('employee-create');
      }
    },
    canEdit: {
      get() {
        return this.canShow('employee-edit');
      }
    }
  },
  data() {
    return {
      currentEntry: {},
      dialogs: {
        edit: false,
        experience: false
      }
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
        EmployeeService.destroyEntry({ params: { type: 'certification', id: entry.id } }).then((data) => {
          if (data.success) {
            this.employee.certifications.splice(index, 1)
          } else {
            notifyError();
          }
        });
      } else {
        // Only delete from array state
        this.employee.certifications.splice(index, 1);
      }
    }
  },
}
</script>

<style>

</style>
