import { axiosInstance } from 'boot/axios'

/* La nomenclatura sugerida es la siguiente

  * index: /api/admin/config GET
  * get: /api/admin/config{id} GET
  * store: /api/admin/config POST
  * update: /api/admin/config PUT
  * destroy: /api/admin/config DELETE
  * */
export const index = (payload) => {
  const URL = '/api/admin/config';
  return axiosInstance.get(URL, payload).then((res) => res.data.employees);
}

export const store = (payload) => {
  const URL = '/api/admin/config';
  return axiosInstance.post(URL, payload).then((res) => res.data);
};

export const edit = () => {
  const URL = '/api/admin/config/edit'
  return axiosInstance.get(URL).then((res) => res.data.config);
}

export const getConfig = () => {
  const URL = '/api/admin/config/getConfig'
  return axiosInstance.get(URL).then((res) => res.data.config);
}

export const destroy = (id) => {
  const URL = `/api/admin/config/${id}`;
  return axiosInstance.delete(URL).then((res) => res.data);
}
