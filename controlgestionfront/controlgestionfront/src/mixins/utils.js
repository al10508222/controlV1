import { date } from 'quasar';

export const utils = {
  data() {
    return {
    }
  },
  mounted() {

  },
  computed: {
    todayDateString() {
      const timeStamp = Date.now();
      const formattedString = date.formatDate(timeStamp, 'YYYY/MM/DD')
      return formattedString;
    }
  },
  methods: {
  }
}
