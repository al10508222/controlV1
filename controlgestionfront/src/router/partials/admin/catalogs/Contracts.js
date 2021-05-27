export default [
  { path: 'admin/cat/contracts', component: () => import('components/admin/cats/contracts/Index.vue') },
  { path: 'admin/cat/contracts/create', component: () => import('components/admin/cats/contracts/Create.vue') },
  { path: 'admin/cat/contracts/:id/edit', component: () => import('components/admin/cats/contracts/Edit.vue') },
];
