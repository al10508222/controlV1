import { axiosInstance } from 'boot/axios'

/* La nomenclatura sugerida es la siguiente

  * index: /api/incidents GET
  * get: /api/incidents/{id} GET
  * store: /api/incidents POST
  * update: /api/incidents PUT
  * destroy: /api/incidents DELETE
  * */

export const index = (payload, id) => {
  const URL = `/api/employees/${id}/incidents`;
  return axiosInstance.get(URL, payload).then((res) => res.data.incidents);
};

export const edit = (employee, id) => {
  const URL = `/api/employees/${employee}/incidents/${id}/edit`
  return axiosInstance.get(URL).then((res) => res.data.incident);
};

export const store = (payload, id) => {
  const URL = `/api/employees/${id}/incidents/create`;
  return axiosInstance.post(URL, payload).then((res) => {
    console.log(res)
    return res.data
  });
};

export const update = (payload, id) => {
  const URL = `/api/employees/${payload.employee_id}/incidents/${id}`;
  return axiosInstance.put(URL, payload).then((res) => res.data);
};

export const destroy = (employee, incident) => {
  const URL = `/api/employees/${employee}/incidents/${incident}`;
  return axiosInstance.delete(URL).then((res) => res.data);
}
