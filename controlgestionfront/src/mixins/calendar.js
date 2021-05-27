import * as DataService from 'src/services/calendar/CalendarService';
// eslint-disable-next-line no-unused-vars
import { Calendar, formatDate } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import esLocale from '@fullcalendar/core/locales/es';
import { notifySuccess, notifyError } from 'src/utils/notify';

export const mix = {
  data() {
    return {
      disabled: true,
      isClose: false,
      showDialog: false,
      events: [],
      data: [],
      pagination: {
        page: 1,
        rowsPerPage: 5,
        rowsNumber: ''
      },
      title: '',
      form: {
        title: null,
        cat_contract_type_id: null,
        start: null,
        startDate: null,
        endDate: null,
        color: null,

      }
    }
  },

  computed: {
    catalogs: {
      get() {
        return this.$store.state.catalogs;
      },
      set(val) {
        this.$store.commit('catalogs/setCatalogs', val)
      },
    },
  },
  created() {
    const catalogsConfiguration = { contracts: true, };
    this.$store.dispatch('catalogs/setCatalogs', { params: catalogsConfiguration }).then(() => {
    });
  },
  mounted() {
    this.$q.loading.show({
      delay: 1 // ms
    })
    // get initial data from server (1st page)
    this.onRequest({
      pagination: this.pagination,
      filter: undefined
    })
  },
  methods: {
    handleClick() {
      setTimeout(() => {
        document.getElementById('calendarFull').innerHTML = '';
        const calendarEl = document.getElementById('calendarFull');
        const calendar = new Calendar(calendarEl, {
          plugins: [dayGridPlugin],
          locales: [esLocale],
          timeZone: 'local',
          height: 'auto',
          themeSystem: 'bootstrap',
          events: this.events,
          displayEventTime: true,
          eventMouseLeave: true,
          // eventBackgroundColor: "black",
          eventColor: 'green',
          eventBorderColor: 'black',
          eventTextColor: 'black',
          eventClick: this.handleEventClick,
        });
        calendar.render();
        this.$q.loading.hide()
      }, 0);
      return false;
    },
    // eslint-disable-next-line no-shadow
    // eslint-disable-next-line no-unused-vars
    handleEventClick(info) {
      this.$q.loading.show({
        delay: 1 // ms
      })
      DataService.edit(info.event.id).then((data) => {
        this.form = data;
      }).catch((err) => {
        console.log(err)
      })
      this.$q.loading.hide()
      this.showDialog = true;
      this.keyEvent = info.event.id;
    },
    onRequest(props) {
      const { page, rowsPerPage } = props.pagination
      const { search } = this
      DataService.index({ params: { page, rowsPerPage, search } }).then((pagination) => {
        this.data = pagination.data
        this.events = Object.values(this.data);
        this.pagination.rowsPerPage = pagination.per_page
        this.pagination.page = pagination.current_page
        this.pagination.rowsNumber = pagination.total
        this.handleClick();
      }).catch((err) => {
        notifyError(err)
      })
    },
    update() {
      this.submitting = true;
      this.$refs.form.validate().then((valid) => {
        if (valid) {
          if (this.form.cat_contract_type_id === 1) {
            this.form.color = '#FF9AA2';
          } if (this.form.cat_contract_type_id === 2) {
            this.form.color = '#E2F0CB';
          } if (this.form.cat_contract_type_id === 3) {
            this.form.color = '#FFDAC1';
          } if (this.form.cat_contract_type_id === 4) {
            this.form.color = '#C7CEEA';
          }
          const form = { ...this.form };
          DataService.update(form, form.id).then(() => {
            notifySuccess();
            this.onRequest({
              pagination: this.pagination,
              filter: undefined
            })
          }).catch((err) => {
            notifyError(err)
          })
        } else {
          this.submitting = false;
        }
      });
    },
    destroy(id) {
      DataService.destroy(id).then(() => {
        this.showDialog = false;
        this.onRequest({
          pagination: this.pagination,
          filter: undefined
        });
        notifySuccess();
        this.onRequest({
          pagination: this.pagination,
          filter: undefined
        })
      }).catch((err) => {
        this.confirm = false;
        notifyError(err)
      }).finally(() => {
        this.$q.loading.hide();
      })
    },
  }
}
