export default [
  { path: 'admin/cat/documents', component: () => import('components/admin/cats/documents/Index.vue') },
  { path: 'admin/cat/documents/create', component: () => import('components/admin/cats/documents/Create.vue') },
  { path: 'admin/cat/documents/:id/edit', component: () => import('components/admin/cats/documents/Edit.vue') },
];
