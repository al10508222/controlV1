export default [
  { path: 'admin/config/imss-deductions', component: () => import('components/admin/config/imssDeductions/Index.vue') },
  { path: 'admin/config/imss-deductions/create', component: () => import('components/admin/config/imssDeductions/Create.vue') },
  { path: 'admin/config/imss-deductions/:id/edit', component: () => import('components/admin/config/imssDeductions/Edit.vue') },
];
