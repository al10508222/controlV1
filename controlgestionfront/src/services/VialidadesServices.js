import { axiosInstance } from 'boot/axios'

/* La nomenclatura sugerida es la siguiente

  * index: /api/user GET
  * get: /api/user/{id} GET
  * store: /api/user POST
  * update: /api/user PUT
  * destroy: /api/user DELETE
  * */

export const index = (payload) => {
  const URL = '/api/admin/vialidades';
  return axiosInstance.get(URL, payload).then((res) => res.data.vialidades);
};

export const edit = (id) => {
  const URL = `/api/admin/vialidades/${id}/edit`;
  return axiosInstance.get(URL).then((res) => res.data.vialidades);
};

export const store = (payload) => {
  const URL = '/api/admin/vialidades';
  return axiosInstance.post(URL, payload).then((res) => res.data);
};

export const update = (payload, id) => {
  const URL = `/api/admin/vialidades/${id}`;
  return axiosInstance.put(URL, payload).then((res) => res.data);
};

export const getCode = () => {
  const URL = '/api/generate-code';
  return axiosInstance.get(URL).then((res) => res.data);
}

export const destroy = (data) => {
  const URL = `/api/admin/vialidades/${data.params.id}`
  return axiosInstance.delete(URL).then((res) => res.data);
}
