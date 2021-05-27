export default [
  { path: 'admin/cat/test', component: () => import('components/admin/cats/test/Index.vue') },
  { path: 'admin/cat/test/create', component: () => import('components/admin/cats/test/Create.vue') },
  { path: 'admin/cat/test/:id/edit', component: () => import('components/admin/cats/test/Edit.vue') },
];
