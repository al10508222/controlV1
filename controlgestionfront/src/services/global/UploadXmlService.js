import { axiosInstance } from 'boot/axios'

export const upload = (payload) => {
  const URL = '/api/providers/importExcel';
  const headers = {
    'Content-Type': 'multipart/form-data'
  };
  return axiosInstance.post(URL, payload, { headers }).then((res) => res.data);
};
