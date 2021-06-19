import { axiosInstance } from 'boot/axios'

import * as UserService from 'src/services/admin/UserService';

export function getUsers(context, payload) {
  UserService.index(payload).then((users) => {
    context.commit('setUsers', users)
  })
}
export function getCode(context, payload) {
  return UserService.getCode(payload).then();
}
export function login(context, credentials) {
  const endPoint = '/api/login';
  return axiosInstance.post(endPoint, credentials)
    .then((res) => {
      const isAutenticated = res.data.authenticated;
      if (isAutenticated) {
        const userData = res.data.user;
        context.commit('setUserInformation', userData)
        window.sessionStorage.setItem('grp_token', res.data.grp_token);
        window.sessionStorage.setItem('grp_token_expiration', res.data.grp_token_expiration);
        axiosInstance.defaults.headers.common.Authorization = `Bearer ${res.data.grp_token}`;
      }
      const { setTwoFA } = res.data;
      if (setTwoFA) {
        context.commit('setQRCode', res.data.qrCode);
        context.commit('setUsr', res.data.usr);
        this.$router.push('2fa')
      }
      return res.data;
    }).catch(() => false);
}

export function verify(context, credentials) {
  const endPoint = '/api/verify'
  return axiosInstance.post(endPoint, credentials)
    .then((res) => {
      const isAuthenticated = res.data.authenticated;
      if (isAuthenticated) {
        const userData = res.data.user;
        context.commit('setUserInformation', userData)
        window.sessionStorage.setItem('grp_token', res.data.grp_token);
        window.sessionStorage.setItem('grp_token_expiration', res.data.grp_token_expiration);
        axiosInstance.defaults.headers.common.Authorization = `Bearer ${res.data.grp_token}`;
      }
      return res.data;
    });
}

export function refreshInformation(context) {
  const endPoint = '/api/getUserInfo';
  axiosInstance.get(endPoint)
    .then((res) => {
      const userData = res.data.user;
      context.commit('setUserInformation', userData)
    })
    .catch(() => {
      this.loadingState = false;
    });
}

export function clearInformation(context) {
  const endPoint = '/api/logout';
  axiosInstance.get(endPoint)
    .then(() => {
      context.commit('setUserInformation', {});
      sessionStorage.removeItem('grp_token');
      sessionStorage.clear();
    })
    .catch(() => {
      this.loadingState = false;
    });
}
