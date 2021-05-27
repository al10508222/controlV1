<template>
  <q-timeline-entry
    icon="work"
    color="accent"
  >
    <template v-slot:title v-if="employment.position != null">
      {{ employment.position.name }}
    </template>
    <template v-slot:subtitle>
    <span class="text-bold"> {{employment.employment_type.name}}</span>
       - {{ employment.date | readableDate }}
    </template>
    <div>
        <p v-if="employment.employment_type.id == 5">
            <span class="text-bold">Motivo de baja:</span>
            {{employment.off_work_reason ? employment.off_work_reason.name : 'N/A'}}
        </p>
        <p v-if="employment.employment_type.id == 5">
          <span class="text-bold">Observación: </span>
          {{ employment.observation }}
        </p>
        <p v-if="employment.employment_type.id != 5">
            <span class="text-bold">Unidad:</span>
            {{employment.unit ? employment.unit.name : 'N/A'}}
        </p>
        <p v-if="employment.employment_type.id != 5">
            <span class="text-bold">Sede: </span>
            {{employment.location ? employment.location.name : 'N/A'}}
        </p>
    </div>
  </q-timeline-entry>
</template>

<script>
export default {
  props: {
    employment: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {}
  },
  methods: {
  },
};
</script>
