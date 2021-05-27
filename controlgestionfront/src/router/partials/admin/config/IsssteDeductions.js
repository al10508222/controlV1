export default [
  { path: 'admin/config/issste-deductions', component: () => import('components/admin/config/isssteDeductions/Index.vue') },
  { path: 'admin/config/issste-deductions/create', component: () => import('components/admin/config/isssteDeductions/Create.vue') },
  { path: 'admin/config/issste-deductions/:id/edit', component: () => import('components/admin/config/isssteDeductions/Edit.vue') },
]
