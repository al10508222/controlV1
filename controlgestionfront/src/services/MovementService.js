import { axiosInstance } from 'boot/axios'

/* La nomenclatura sugerida es la siguiente

  * index: /api/user GET
  * get: /api/user/{id} GET
  * store: /api/user POST
  * update: /api/user PUT
  * destroy: /api/user DELETE
  * */

const baseRoute = '/api/movements'

export const index = (payload) => axiosInstance.get(baseRoute, payload).then((res) => res.data)

export const store = (payload) => axiosInstance.post(baseRoute, payload).then((res) => res.data);

export const update = (payload, id) => {
  const URL = `${baseRoute}/${id}`
  return axiosInstance.put(URL, payload).then((res) => res.data)
}

export const show = (id) => {
  const URL = `${baseRoute}/${id}`
  return axiosInstance.get(URL).then((res) => res.data);
}

export const destroy = (id) => {
  const URL = `${baseRoute}/${id}`;
  return axiosInstance.delete(URL).then((res) => res.data);
}
