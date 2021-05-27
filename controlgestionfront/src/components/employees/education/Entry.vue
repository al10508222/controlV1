<template>
  <q-timeline-entry
    icon="school"
    color="accent"
    @mouseover="onHover()"
    @mouseout="onMouseUp()"
  >
    <template v-slot:title>
      {{ education.title }} en {{ education.school }}
      <q-btn-group class="float-right" rounded>
        <q-btn
        size="sm"
        color="primary"
        icon="edit"
        outline
        @click="$emit('edit', education);"
        v-show="showEdit"
      />
      <q-btn
        size="sm"
        color="negative"
        icon="delete"
        v-if="canDelete"
        outline
        @click="onDelete"
        v-show="showEdit"
      />
      </q-btn-group>
    </template>
    <template v-slot:subtitle>
      {{ education.start_date | readableDate }} - {{ education.end_date | readableDate }}
    </template>
    <div>
      {{education.description}}
    </div>

    <q-dialog v-model="confirmDelete" persistent>
      <q-card>
        <q-card-section class="row items-center">
          <q-avatar icon="warning" color="negative" text-color="white" size="md"/>
          <span class="q-ml-sm">Se eliminará el registro seleccionado de manera permanente</span>
        </q-card-section>

        <q-card-actions align="right">
          <q-btn flat label="Cancelar" color="primary" v-close-popup />
          <q-btn flat label="Eliminar" color="negative" v-close-popup @click="$emit('delete', education)"/>
        </q-card-actions>
      </q-card>
    </q-dialog>
  </q-timeline-entry>
</template>

<script>
export default {
  props: {
    education: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      confirmDelete: false,
      showEdit: false,
    };
  },
  methods: {
    onDelete() {
      this.confirmDelete = true
    },
    onHover() {
      this.showEdit = true
    },
    onMouseUp() {
      this.showEdit = false
    }
  },
  computed: {
    catalogs: {
      get() {
        return this.$store.state.catalogs;
      },
    },
    canDelete: {
      get() {
        return this.canShow('employee-delete');
      }
    }
  },
};
</script>

<style lang="sass">
</style>
