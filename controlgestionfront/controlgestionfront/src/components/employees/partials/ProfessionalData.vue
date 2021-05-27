<template>
  <div class="row q-col-gutter-sm">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <q-list >
        <q-expansion-item
          group="somegroup"
          icon="fas fa-briefcase"
          label="Experiencia"
          default-opened
          header-class="text-primary"
        >
          <q-card>
            <q-card-section>
              <Experience />
            </q-card-section>
          </q-card>
        </q-expansion-item>
        <q-separator />
        <q-expansion-item
          group="somegroup"
          icon="fas fa-graduation-cap"
          label="Educación"
          header-class="text-primary"
        >
          <q-card>
            <q-card-section>
              <Education />
            </q-card-section>
          </q-card>
        </q-expansion-item>
        <q-separator />
        <q-expansion-item
          group="somegroup"
          icon="fas fa-certificate"
          label="Certificaciones"
          header-class="text-primary"
        >
          <q-card>
            <q-card-section>
              <Certification/>
            </q-card-section>
          </q-card>
        </q-expansion-item>
        <q-separator />
        <q-expansion-item
          group="somegroup"
          icon="far fa-lightbulb"
          label="Habilidades"
          header-class="text-primary"
        >
          <q-card>
            <q-card-section>
              <q-select
                label="Ingrese sus habilidades"
                :readonly="readonly"
                outlined
                v-model="employee.skills"
                use-input
                use-chips
                multiple
                hide-dropdown-icon
                input-debounce="0"
                new-value-mode="add-unique"
              />
            </q-card-section>
          </q-card>
        </q-expansion-item>
      </q-list>
    </div>
  </div>
</template>

<script>
import Experience from '../experience/Index';
import Education from '../education/Index';
import Certification from '../certification/Index';

export default {
  props: {
    readonly: {
      type: Boolean,
      default: false
    }
  },
  components: { Experience, Education, Certification },
  data() {
    return {
    };
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
    account: {
      get() {
        return this.$store.state.employee.account;
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
    canEdit: {
      get() {
        return this.canShow('employee-edit');
      }
    }
  }
};
</script>

<style>

</style>
