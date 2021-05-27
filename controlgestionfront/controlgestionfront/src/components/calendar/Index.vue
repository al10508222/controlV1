<template>
    <div>
        <q-card>
            <q-card-section>
                <div class="text-h6">
                    <q-icon size="sm" name="far fa-calendar-alt"/> Calendario de pagos
                    <q-btn class="float-right" round size="sm" @click="$router.push('/calendar/create')"  outline color="primary" icon="fas fa-plus" v-if="canCreate"/>
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

import FormComponent from './FormComponent';

export default {

  components: {
    FormComponent
  },
  computed: {
    canCreate: {
      get() {
        return this.canShow('calendar-create');
      }
    }
  }
}
</script>
<style>
.fc-event-title{
    cursor: pointer;
}
</style>
