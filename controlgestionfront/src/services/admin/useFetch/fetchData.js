import { axiosInstance } from 'boot/axios'
import { Loading } from 'quasar'

export const fetchData = (path, payload, method) => {
  Loading.show()
  return axiosInstance({
    method,
    url: path,
    data: payload
  }).then(async (res) => {
    Loading.hide()
    return res.data
  });
};
