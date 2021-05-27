import { axiosInstance } from 'boot/axios'

/* La nomenclatura sugerida es la siguiente

  * index: /api/employees-document GET
  * get: /api/employees-document/{id} GET
  * store: /api/employees-document POST
  * update: /api/employees-document PUT
  * destroy: /api/employees-document DELETE
  * */

export const index = (payload) => {
  const URL = '/api/employees-document';
  return axiosInstance.get(URL, payload).then((res) => res.data.documents);
};

export const store = (payload) => {
  const URL = '/api/employees-documents';
  const headers = {
    'Content-Type': 'multipart/form-data'
  };
  return axiosInstance.post(URL, payload, { headers }).then((res) => res.data);
};
