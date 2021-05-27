<template>
    <div>
        <q-card>
            <q-card-section>
                <div class="text-h6">
                    <q-icon size="sm" name="far fa-calendar-alt"/> Catálogo CuCop
                    <q-btn class="float-right" round size="sm" @click="$router.push('/cucop/create')"  outline color="primary" icon="fas fa-plus" v-if="canCreate"/>
                </div>
            </q-card-section>
        </q-card>
        <br>
        <q-card style="width: 100%; max-width: 1400px;">
            <q-card-section>
                <q-separator />
                <div>
                    <div id="calendarFull"></div>
                </div>
            </q-card-section>
        </q-card>
        <FormComponent />
    </div>
</template>
<script>
export default {
  components: {
  },
  data() {
    return {
    };
  },
  methods: {
  }
};
</script>
