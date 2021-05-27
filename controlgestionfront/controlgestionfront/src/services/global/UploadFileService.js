import { axiosInstance } from 'boot/axios'

export const upload = (payload) => {
  const URL = '/api/files/upload';
  const headers = {
    'Content-Type': 'multipart/form-data'
  };
  return axiosInstance.post(URL, payload, { headers }).then((res) => res.data.file);
};

export const uploadContractExcel = (payload) => {
  const URL = '/api/contracts-file';
  const headers = {
    'Content-Type': 'multipart/form-data'
  };
  return axiosInstance.post(URL, payload, { headers }).then((res) => res);
};
