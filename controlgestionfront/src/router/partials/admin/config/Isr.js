export default [
  { path: 'admin/config/isr', component: () => import('components/admin/config/isr/Index.vue') },
  { path: 'admin/config/isr/create', component: () => import('components/admin/config/isr/Create.vue') },
  { path: 'admin/config/isr/:id/edit', component: () => import('components/admin/config/isr/Edit.vue') },
];
