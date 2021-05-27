import { axiosInstance } from 'boot/axios'

/* La nomenclatura sugerida es la siguiente
  * index: /api/modules GET
  * get: /api/modules/{id} GET
  * store: /api/modules POST
  * update: /api/modules PUT
  * destroy: /api/modules DELETE
  * */
const basePath = '/api/admin/modules';

export const index = (payload) => {
  const URL = basePath;
  return axiosInstance.get(URL, payload).then((res) => res.data);
};

export const store = (payload) => {
  const URL = basePath;
  return axiosInstance.post(URL, payload).then((res) => res.data);
};
