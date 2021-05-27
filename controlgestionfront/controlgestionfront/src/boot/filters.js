const moneyConfig = { style: 'currency', currency: 'MXN' };
const MONTHS = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

export default ({ Vue }) => {
  Vue.filter('readableDate', (value) => {
    const date = new Date(value)
    if (date !== null || date !== undefined) {
      return `${MONTHS[date.getUTCMonth()]} ${date.getUTCDate()}, ${date.getFullYear()}`
    }
    return ''
  })

  Vue.filter('moneyFilter', (number) => new Intl.NumberFormat('es-MX', moneyConfig).format(number));

  Vue.filter('monthName', (value) => MONTHS[value - 1])
}
