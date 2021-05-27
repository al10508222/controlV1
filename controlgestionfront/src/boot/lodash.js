import lodash from 'lodash'

export default ({ Vue }) => {
  window._ = lodash;
  Vue.prototype._ = lodash // then use as this.$_
}
