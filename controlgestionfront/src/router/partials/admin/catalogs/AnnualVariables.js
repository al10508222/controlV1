export default [
  { path: 'admin/cat/annualVariables', component: () => import('components/admin/cats/annualVariables/Index.vue') },
  { path: 'admin/cat/annualVariables/create', component: () => import('components/admin/cats/annualVariables/Create.vue') },
  { path: 'admin/cat/annualVariables/:id/edit', component: () => import('components/admin/cats/annualVariables/Edit.vue') },
];
