<template>
  <div class="row q-col-gutter-lg q-mb-md">
    <q-tooltip anchor="center left" self="bottom left">
      {{field.description}}
    </q-tooltip>
    <!-- 1,Texto -->
    <q-input
      :label="field.name"
      :maxlength="field.length"
      :readonly="readonly"
      v-model="field.value"
      v-if="field.cat_type_data_id === 1"
      :rules="field.is_required ? [$rules.required($i18n.t('requiredInput'))] : []"
      type="text"
      square outlined
      class="col-xs-12 col-sm-12 col-md-12 q-mb-md"/>

    <!-- 2,Lista -->
    <q-select
      :label="field.name"
      v-model="field.value"
      :readonly="readonly"
      v-if="field.cat_type_data_id === 2"
      :rules="field.is_required ? [$rules.required($i18n.t('requiredInput'))] : []"
      option-value="id" option-label="name"
      :options="field.pivot"
      outlined map-options emit-value
      class="col-xs-12 col-sm-12 col-md-12 q-mb-md"/>

    <!-- 3,Radio -->
    <div class="bg-grey-2 rounded-borders col q-mb-md" v-if="field.cat_type_data_id === 3">
      {{field.name}}
      <q-field
        hide-bottom-space
        borderless
        hide-details
        v-model="field.value"
        :rules="field.is_required ? [$rules.required($i18n.t('requiredInput'))] : []"
        :readonly="readonly"
        v-if="field.cat_type_data_id === 3"
      >
        <q-option-group
          hide-bottom-space
          :label="field.name"
          v-model="field.value"
          v-if="field.cat_type_data_id === 3"
          :options="normalizedOptions"
          :readonly="readonly"
          inline />
      </q-field>
    </div>

    <!-- 4,Checkbox -->
    <q-checkbox
      :label="field.name"
      :maxlength="field.length"
      :readonly="readonly"
      v-model="field.value"
      v-if="field.cat_type_data_id === 4"
      :rules="field.is_required ? [$rules.required($i18n.t('requiredInput'))] : []"
      type="text"
      square outlined
      class="col-xs-12 col-sm-12 col-md-12 q-mb-md"/>

    <!-- 5,Área de texto -->
    <q-input
      :label="field.name"
      :maxlength="field.length"
      :readonly="readonly"
      v-model="field.value"
      v-if="field.cat_type_data_id === 5"
      :rules="field.is_required ? [$rules.required($i18n.t('requiredInput'))] : []"
      type="text"
      square outlined
      class="col-xs-12 col-sm-12 col-md-12 q-mb-md"/>

    <!-- 6,Fecha -->
    <q-input
      :label="field.name"
      :maxlength="field.length"
      :readonly="readonly"
      v-model="field.value"
      v-if="field.cat_type_data_id === 6"
      :rules="field.is_required ? [$rules.required($i18n.t('requiredInput'))] : []"
      type="text"
      square outlined
      mask="date"
      @click="$refs.qStartDateProxy.show()"
      class="col-xs-12 col-sm-12 col-md-12 q-mb-md"
    >
      <template v-slot:append>
        <q-icon name="event" class="cursor-pointer">
          <q-popup-proxy
            ref="qStartDateProxy"
            transition-show="scale"
            transition-hide="scale"
          >
            <q-date
              v-model="field.value"

            >
              <div class="row items-center justify-end">
                <q-btn v-close-popup label="Cerrar" color="primary" flat />
              </div>
            </q-date>
          </q-popup-proxy>
        </q-icon>
      </template>
    </q-input>

    <!-- 7,Número -->
    <q-input
      :label="field.name"
      :readonly="readonly"
      v-model="field.value"
      v-if="field.cat_type_data_id === 7"
      :rules="field.is_required ? [$rules.required($i18n.t('requiredInput'))] : []"
      type="number"
      square outlined
      class="col-xs-12 col-sm-12 col-md-12 q-mb-md"/>

    <!--  {{field}}-->
  </div>
</template>

<script>

export default {
  props: {
    field: {
      type: Object,
      required: true,
      value: '',
    },
    readonly: {
      type: Boolean,
      default: false
    }
  },
  created() {
    if (this.field.values && !this.field.values.length) this.field.value = this.field.default_value
  },
  computed: {
    normalizedOptions() {
      return this.field.pivot.map((opt) => ({
        value: opt.id,
        label: opt.name,
      }))
    },
  },
};
</script>

<style>

</style>
