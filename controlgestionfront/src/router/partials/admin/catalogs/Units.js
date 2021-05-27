export default [
  { path: 'admin/cat/units', component: () => import('components/admin/cats/units/Index.vue') },
  { path: 'admin/cat/units/create', component: () => import('components/admin/cats/units/Create.vue') },
  { path: 'admin/cat/units/:id/edit', component: () => import('components/admin/cats/units/Edit.vue') },
];
