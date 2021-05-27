import Vue from 'vue';
import axios from 'axios';

const axiosInstance = axios.create({
  baseURL: `${process.env.APP_BASE_URL}`,
  headers: {
    'Content-Type': 'application/json',
  },
});

const token = sessionStorage.getItem('grp_token');

if (token) {
  axiosInstance.interceptors.request.use(((config) => {
    config.headers.Authorization = `Bearer ${token}`;
    return config;
  }));
}

axiosInstance.interceptors.response.use(
  (response) => response,
  // eslint-disable-next-line consistent-return
  (error) => {
    if (error.response.status === 401) {
      sessionStorage.removeItem('grp_token');
      sessionStorage.removeItem('grp_token_expiration');
      window.location = '/login'
    } else {
      return Promise.reject(error);
    }
  }
);
// for use inside Vue files through this.$axios
Vue.prototype.$axios = axiosInstance;
export { axiosInstance }
