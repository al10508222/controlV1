export default [
  { path: 'admin/cat/customFields', component: () => import('components/admin/cats/customFields/Index.vue') },
  { path: 'admin/cat/customFields/create', component: () => import('components/admin/cats/customFields/Create.vue') },
  { path: 'admin/cat/customFields/:id/edit', component: () => import('components/admin/cats/customFields/Edit.vue') },
];
