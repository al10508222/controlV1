import { axiosInstance } from 'boot/axios'

/* La nomenclatura sugerida es la siguiente

  * index: /api/user GET
  * get: /api/user/{id} GET
  * store: /api/user POST
  * update: /api/user PUT
  * destroy: /api/user DELETE
  * */

export const index = (payload) => {
  const URL = '/api/admin/asentamientos';
  return axiosInstance.get(URL, payload).then((res) => res.data.asentamientos);
};

export const edit = (id) => {
  const URL = `/api/admin/asentamientos/${id}/edit`;
  console.log(axiosInstance.get(URL).then((res) => res.data))
  return axiosInstance.get(URL).then((res) => res.data.Asentamientos);
};

export const store = (payload) => {
  const URL = '/api/admin/asentamientos';
  return axiosInstance.post(URL, payload).then((res) => res.data);
};

export const update = (payload, id) => {
  const URL = `/api/admin/asentamientos/${id}`;
  return axiosInstance.put(URL, payload).then((res) => res.data);
};

export const getCode = () => {
  const URL = '/api/generate-code';
  return axiosInstance.get(URL).then((res) => res.data);
}

export const destroy = (data) => {
  const URL = `/api/admin/asentamientos/${data.params.id}`
  return axiosInstance.delete(URL).then((res) => res.data);
}
