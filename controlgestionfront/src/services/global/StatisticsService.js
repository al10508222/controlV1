import { axiosInstance } from 'boot/axios'

export const getStatistics = () => {
  const URL = '/api/get-statistics'
  return axiosInstance.get(URL).then((res) => res.data);
};
