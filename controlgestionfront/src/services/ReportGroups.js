import { axiosInstance } from 'boot/axios'

/* La nomenclatura sugerida es la siguiente
  * index: /api/modules GET
  * get: /api/modules/{id} GET
  * store: /api/modules POST
  * update: /api/modules PUT
  * destroy: /api/modules DELETE
  * */

export const ReportGroups = (payload) => {
  const URL = '/api/report-groups';
  return axiosInstance.get(URL, payload).then((res) => res.data);
};
