export default [
  { path: 'admin/config/employment-subsidy', component: () => import('components/admin/config/employmentSubsidy/Index.vue') },
  { path: 'admin/config/employment-subsidy/create', component: () => import('components/admin/config/employmentSubsidy/Create.vue') },
  { path: 'admin/config/employment-subsidy/:id/edit', component: () => import('components/admin/config/employmentSubsidy/Edit.vue') },
];
