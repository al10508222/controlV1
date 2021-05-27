export default [
  { path: 'admin/cat/physicalLocation', component: () => import('components/admin/cats/physicalLocation/Index.vue') },
  { path: 'admin/cat/physicalLocation/create', component: () => import('components/admin/cats/physicalLocation/Create.vue') },
  { path: 'admin/cat/physicalLocation/:id/edit', component: () => import('components/admin/cats/physicalLocation/Edit.vue') },
];
