<template>
  <q-card style="width: 100%">
    <q-item>
      <q-item-section avatar>
        <q-icon size="md" name="fas fa-clipboard-list"/>
      </q-item-section>
      <q-item-section>
        <q-item-label>Agregar vacaciones</q-item-label>
        <q-item-label caption>Asigne días de vacaciones para el empleado</q-item-label>
      </q-item-section>
    </q-item>
    <q-separator />
    <div class="q-pa-sm">
      <q-card-section>
        <q-form ref="form"  @submit.prevent="() => {}">
          <div class="row q-col-gutter-md">
            <div class="col-md-7 col-sm-5 col-xs-12">
              <div class="row q-col-gutter-md">
                <div class="col-12">
                  <q-input
                    v-model="vacations.employee.name"
                    :disable="true"
                    label="Empleado"
                  />
                </div>
                <div class="col-12">
                  <q-table
                    :data="vacations.periods"
                    :columns="columns"
                  >
                    <template v-slot:top>
                      Antigüedad: {{ vacations.service_time }}
                      <q-space />
                      Días de vacaciones: {{ vacations.max_vacation_days }}
                      <q-space />
                      Días restantes: {{ leftDays }}
                      <q-space />
                      Días por periodo: {{ vacations.days_per_period }}
                    </template>
                  </q-table>
                </div>
              </div>
            </div>
            <div class="col-md-5 col-sm-7 col-xs-12">
              <q-date
                landscape
                :navigation-max-year-month="`${new Date().getFullYear()+1}/12`"
                v-model="vacations.days"
                mask="YYYY-MM-DD"
                @input="compdays"
                @navigation="navigation"
                :disable="!vacations.periods.length"
                :options="optionsFn"
                multiple />
            </div>
          </div>
          <q-card-actions align="right">
            <q-btn flat @click="$router.back()" label="Cancelar" color="primary" v-close-popup />
            <q-btn flat @click="store()" label="Guardar" color="primary" />
          </q-card-actions>
        </q-form>
      </q-card-section>
    </div>
  </q-card>
</template>
<script>
import * as DataService from 'src/services/employee/VacationsService';
import { notifyError, notifySuccess } from 'src/utils/notify';
import { date } from 'quasar'

export default {
  data() {
    return {
      year: 2021,
      // leftDays: 0,
      vacations: {
        employee: { id: 0, name: '' },
        days_per_period: 0,
        max_vacation_days: 0,
        service_time: 0,
        periods: [],
        days: [],
      },
      columns: [
        {
          name: 'from', align: 'center', label: 'Desde', field: 'from'
        },
        {
          name: 'to', align: 'center', label: 'Hasta', field: 'to'
        },
        {
          name: 'days', align: 'center', label: 'Días', field: 'days'
        },
      ],
    }
  },
  computed: {
    leftDays() {
      let daysThisYear = 0
      this.vacations.days.forEach((day) => {
        daysThisYear += this.dateFromString(day).getFullYear() === this.year ? 1 : 0
      })
      return this.vacations.max_vacation_days - daysThisYear
    },
  },
  mounted() {
    this.$q.loading.show();
    const { id } = this.$route.params;
    DataService.index(id).then((data) => {
      this.vacations = data
      this.compdays()
    }).finally(() => {
      this.$q.loading.hide();
    })
  },
  methods: {
    compdays() {
      if (this.vacations.days == null) {
        this.vacations.days = []
      }
      this.vacations.periods.forEach((period, i) => {
        if (this.leftDays < 0) this.vacations.days.pop()
        const from = new Date(period.from)
        const to = new Date(period.to)
        let days = this.vacations.days_per_period
        this.vacations.days.forEach((day) => {
          if (date.isBetweenDates(day, from, to, { inclusiveFrom: true, inclusiveTo: true })) days -= 1
          if (days < 0) {
            this.vacations.days.pop()
            days = 0
          }
        })
        period.days = days
        this.$set(this.vacations.periods, i, period)
      })
    },
    optionsFn(d) {
      const today = new Date()
      today.setHours(0, 0, 0, 0)
      return new Date(d) >= today
    },
    navigation(view) {
      this.vacations.periods.forEach((period, i) => {
        const from = this.dateFromString(period.from)
        from.setFullYear(view.year)
        period.from = `${from.getFullYear()}-${from.getMonth() + 1}-${from.getDate()}`

        const to = this.dateFromString(period.to)
        to.setFullYear(view.year)
        period.to = `${to.getFullYear()}-${to.getMonth() + 1}-${to.getDate()}`

        this.$set(this.vacations.periods, i, period)
        this.year = view.year
      })
      this.compdays()
    },
    dateFromString(stringDate) {
      const d = new Date(stringDate)
      d.setMinutes(d.getMinutes() + d.getTimezoneOffset())
      return d
    },
    store() {
      this.$q.loading.show();
      const formData = { ...this.vacations }
      formData.employee_id = this.vacations.employee.id
      const { id } = this.$route.params;
      DataService.store(formData, id).then(() => {
        notifySuccess();
        this.$router.back();
      }).catch(() => {
        notifyError();
      }).finally(() => {
        this.$q.loading.hide();
      })
    },
  },
}
</script>
