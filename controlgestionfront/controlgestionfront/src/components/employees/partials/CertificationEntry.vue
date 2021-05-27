<template>
  <q-timeline-entry
    icon="fas fa-certificate"
    color="accent"
    @mouseover="onHover()"
    @mouseout="onMouseUp()"
  >
    <template v-slot:title>
      {{ certification.name }} por {{ certification.entity }}
      <q-btn-group class="float-right" rounded>
        <q-btn
        class="float-right"
        size="sm"
        color="primary"
        icon="edit"
        outline
        @click="$emit('edit', certification);"
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
      {{ certification.start_date | readableDate }} - {{ certification.end_date | readableDate }}
    </template>
    <div>
      {{certification.description}} <br>
      <q-chip outline color="primary" text-color="white" icon="web">{{certification.url}}</q-chip>
    </div>
    <q-dialog v-model="confirmDelete" persistent>
      <q-card>
        <q-card-section class="row items-center">
          <q-avatar icon="warning" color="negative" text-color="white" size="md"/>
          <span class="q-ml-sm">Se eliminará el registro seleccionado de manera permanente</span>
        </q-card-section>

        <q-card-actions align="right">
          <q-btn flat label="Cancelar" color="primary" v-close-popup />
          <q-btn flat label="Eliminar" color="negative" v-close-popup @click="$emit('delete', certification)"/>
        </q-card-actions>
      </q-card>
    </q-dialog>
  </q-timeline-entry>
</template>

<script>
export default {
  props: {
    certification: {
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
    canDelete: {
      get() {
        return this.canShow('employee-delete');
      }
    }
  }
};
</script>

<style lang="sass">
</style>
