export default [
  { path: 'admin/cat/accounts', component: () => import('components/admin/cats/accounts/Index.vue') },
  { path: 'admin/cat/accounts/create', component: () => import('components/admin/cats/accounts/Create.vue') },
  { path: 'admin/cat/accounts/:id/edit', component: () => import('components/admin/cats/accounts/Edit.vue') },
];
