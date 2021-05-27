import { axiosInstance } from 'boot/axios'

/* La nomenclatura sugerida es la siguiente
  * index: /api/admin/profile GET
  * get: /api/admin/profile/{id} GET
  * store: /api/admin/profile POST
  * update: /api/admin/profile PUT
  * destroy: /api/admin/profile DELETE
  * */
const basePath = '/api/admin/profile';

export const index = (payload) => {
  const URL = basePath;
  return axiosInstance.get(URL, payload).then((res) => res.data);
};

export const store = (payload) => {
  const URL = basePath;
  return axiosInstance.post(URL, payload).then((res) => res.data);
};

export const edit = (id) => {
  const URL = `${basePath}/${id}/edit`;
  return axiosInstance.get(URL).then((res) => res.data);
};

export const update = (payload, id) => {
  const URL = `${basePath}/${id}`;
  return axiosInstance.put(URL, payload).then((res) => res.data);
};

export const destroy = (id) => {
  const URL = `${basePath}/${id}`;
  return axiosInstance.delete(URL).then((res) => res.data);
};
