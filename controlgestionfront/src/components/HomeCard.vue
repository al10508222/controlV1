<template>
  <q-card @click="$router.push(link)" class="text-center home-card pointer" flat bordered>
    <q-card-section>
      <div class="text-h5 q-mt-sm q-mb-xs">{{ title }}</div>
      <div class="text-caption text-grey">
        {{ description }}
      </div>
    </q-card-section>
    </q-card>
</template>

<script>
export default {
  name: 'HomeCard',
  props: {
    title: {
      type: String,
      required: true,
    },
    link: {
      type: String,
      default: '',
    },
    description: {
      type: String,
      default: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temporincididunt labore et dolore magna aliqua.',
    },
  },
};
</script>
