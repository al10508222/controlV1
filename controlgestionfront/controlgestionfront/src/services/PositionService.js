import { axiosInstance } from 'boot/axios'

/* La nomenclatura sugerida es la siguiente
  * index: /api/positions GET
  * get: /api/positions/{id} GET
  * store: /api/positions POST
  * update: /api/positions PUT
  * destroy: /api/positions DELETE
  * */
const basePath = '/api/positions';

export const index = (payload) => {
  const URL = basePath;
  return axiosInstance.get(URL, payload).then((res) => res.data.positions);
};

export const edit = (id) => {
  const URL = `${basePath}/${id}/edit`;
  return axiosInstance.get(URL).then((res) => res.data.position);
};

export const store = (payload) => {
  const URL = basePath;
  return axiosInstance.post(URL, payload).then((res) => res.data);
};

export const update = (payload, id) => {
  const URL = `${basePath}/${id}`;
  return axiosInstance.put(URL, payload).then((res) => res.data);
};

export const retrieve = (payload) => {
  const URL = `${basePath}/get-positions-by`;
  return axiosInstance.post(URL, payload).then((res) => {
    console.log(res)
    return res.data
  })
}

export const destroy = (id) => {
  const URL = `/api/positions/${id}`
  return axiosInstance.delete(URL).then((res) => res.data);
}
