import { axiosInstance } from 'boot/axios'

/* La nomenclatura sugerida es la siguiente

  * index: /api/incidents GET
  * get: /api/incidents/{id} GET
  * store: /api/incidents POST
  * update: /api/incidents PUT
  * destroy: /api/incidents DELETE
  * */

export const index = (employeeId) => {
  const URL = `/api/employees/${employeeId}/vacations`;
  return axiosInstance.get(URL).then((res) => res.data);
}

export const store = (payload, employeeId) => {
  const URL = `/api/employees/${employeeId}/vacations/`;
  return axiosInstance.post(URL, payload).then((res) => res.data);
}
