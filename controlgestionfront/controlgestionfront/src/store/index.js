import Vue from 'vue';
import Vuex from 'vuex';

import employee from './employee';
import catalogs from './catalogs';
import user from './user';
import config from './config';
import 'leaflet/dist/leaflet.css';

Vue.use(Vuex);

/*
 * If not building with SSR mode, you can
 * directly export the Store instantiation;
 *
 * The function below can be async too; either use
 * async/await or return a Promise which resolves
 * with the Store instance.
 */
// initial state
const initialState = {
  employee: employee.state,
  catalogs: catalogs.state,
  user: user.state,
  config: config.state,
}

const Store = new Vuex.Store({
  modules: {
    employee,
    catalogs,
    user,
    config,
  },
  mutations: {
    reset(state) {
      Object.keys(state).forEach((key) => {
        Object.assign(state[key], initialState[key])
      })
    }
  },
  // enable strict mode (adds overhead!)
  // for dev mode only
  strict: false,
});

export default function (/* { ssrContext } */) {
  return Store
}

export { Store }
