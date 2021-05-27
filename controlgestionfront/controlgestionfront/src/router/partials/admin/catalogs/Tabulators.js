export default [
  { path: 'admin/cat/tabulators', component: () => import('components/admin/cats/tabulators/Index.vue') },
  { path: 'admin/cat/tabulators/create', component: () => import('components/admin/cats/tabulators/Create.vue') },
  { path: 'admin/cat/tabulators/:id/edit', component: () => import('components/admin/cats/tabulators/Edit.vue') },
];
