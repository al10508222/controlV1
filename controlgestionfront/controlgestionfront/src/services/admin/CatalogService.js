import { axiosInstance } from 'boot/axios'

/* La nomenclatura sugerida es la siguiente

  * index: /api/catalogs GET
  * get: /api/catalogs/{id} GET
  * store: /api/catalogs POST
  * update: /api/catalogs PUT
  * destroy: /api/catalogs DELETE
  * */

export const index = (payload) => {
  const URL = '/api/admin/catalogs';
  return axiosInstance.get(URL, payload).then((res) => res.data.catalogs);
};

export const getStates = (payload) => {
  const URL = `/api/admin/catalogs/get-states/${payload}`;
  return axiosInstance.get(URL).then((res) => res.data.states);
}
