import { axiosInstance } from 'boot/axios'

/* La nomenclatura sugerida es la siguiente

  * index: /api/concepts GET
  * get: /api/concepts/{id} GET
  * store: /api/concepts POST
  * update: /api/concepts PUT
  * destroy: /api/concepts DELETE
  * */

export const index = (id) => {
  const URL = `/api/admin/catalogs/custom-fields/${id}`;
  return axiosInstance.get(URL).then((res) => res.data);
}
