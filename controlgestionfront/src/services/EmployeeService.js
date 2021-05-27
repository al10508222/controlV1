import { axiosInstance } from 'boot/axios'

/* La nomenclatura sugerida es la siguiente

  * index: /api/user GET
  * get: /api/user/{id} GET
  * store: /api/user POST
  * update: /api/user PUT
  * destroy: /api/user DELETE
  * */
export const index = (payload) => {
  const URL = '/api/employees';
  return axiosInstance.get(URL, payload).then((res) => res.data.employees);
}

export const store = (payload) => {
  const URL = '/api/employee';
  return axiosInstance.post(URL, payload).then((res) => res.data);
};

export const edit = (endpoint) => {
  console.log(endpoint);
  return axiosInstance.get(endpoint).then((res) => res.data.employee);
}

export const destroy = (id) => {
  const URL = `/api/employees/${id}`;
  return axiosInstance.delete(URL).then((res) => res.data);
}

export const getAllByContractType = (id) => {
  const URL = `/api/employees/by-contract-type/${id}`;
  return axiosInstance.get(URL).then((res) => res.data.employees);
}

export const destroyEntry = (data) => {
  const URL = `/api/employees/entries/${data.params.id}`;
  return axiosInstance.post(URL, data.params).then((res) => res.data);
}

export const downloadEmployeeReport = (payload) => {
  const URL = '/api/employee-report';
  return axiosInstance.post(URL, payload, { responseType: 'blob' }).then((res) => res);
}
export const getCatalogEmployeeReport = (params) => {
  const URL = '/api/get-catalog-employee-report';
  return axiosInstance.get(URL, { params });
}

export const massiveLoad = (payload) => {
  const URL = '/api/employees/massive-load'
  const headers = {
    'Content-Type': 'multipart/form-data'
  }
  return axiosInstance.post(URL, payload, { headers }).then((res) => res.data)
}

export const searchByCURP = (payload) => {
  const URL = '/api/employees/search-by-curp'
  return axiosInstance.get(URL, payload).then((res) => res.data)
}
