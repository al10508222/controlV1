import { axiosInstance } from 'boot/axios'

import * as EmployeeService from 'src/services/EmployeeService';

export function save(context, employee) {
  const endPoint = '/api/employees';
  return axiosInstance.post(endPoint, employee).then((res) => res).catch((error) => error.response);
}

export function edit(context, payload) {
  const endPoint = `/api/employees/${payload.params}/edit`;
  EmployeeService.edit(endPoint).then((employee) => {
    employee.customValues.forEach((value) => {
      if (value.values.length === 1) {
        value.value = value.values[0].value
      } else {
        value.value = value.values
      }
    })

    context.commit('updateEmployee', employee);
  }).catch((err) => {
    alert(err);
  });
}

export function update(context, employee) {
  const endPoint = `/api/employees/${employee.id}`;
  return axiosInstance.put(endPoint, employee)
    .then((res) => res).catch((err) => {
      console.log(err)
      return false;
    });
}
