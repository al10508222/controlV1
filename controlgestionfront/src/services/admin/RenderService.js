import { axiosInstance } from 'boot/axios'

/* La nomenclatura sugerida es la siguiente
  * index: /api/catalogs/document GET
  * get: /api/catalogs/document/{id} GET
  * store: /api/catalogs/document POST
  * update: /api/catalogs/document PUT
  * destroy: /api/catalogs/document DELETE
  * */
const basePath = '/api/admin/render';

export const index = (payload) => {
  const URL = basePath;
  return axiosInstance.get(URL, payload).then((res) => res.data.variables);
};

export const edit = (id) => {
  const URL = `${basePath}/${id}/edit`;
  return axiosInstance.get(URL).then((res) => res.data.variable);
};

export const store = (payload) => {
  const URL = basePath;
  return axiosInstance.post(URL, payload).then((res) => res.data);
};

export const post = (payload) => {
  const URL = `${basePath}`;
  return axiosInstance.post(URL, payload).then((res) => res.data);
};
