export default [
  { path: 'employees', component: () => import('components/employees/Index.vue') },
  { path: 'employees/create', component: () => import('components/employees/Create.vue') },
  { path: 'employees/:id/edit', component: () => import('components/employees/Edit.vue') },
  { path: 'employees/:id/incidents', component: () => import('components/employees/incidents/Index.vue') },
  { path: 'employees/:id/incidents/create', component: () => import('components/employees/incidents/Create.vue') },
  { path: 'employees/:employee_id/incidents/:id/edit', component: () => import('components/employees/incidents/Edit.vue') },
  { path: 'employees-report', component: () => import('components/employees/report-form/ReportForm.vue') },
  { path: 'employees/:id/vacations', component: () => import('components/employees/vacations/Index') },
];
