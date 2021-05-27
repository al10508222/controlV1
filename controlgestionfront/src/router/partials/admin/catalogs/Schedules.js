export default [
  { path: 'admin/cat/schedules', component: () => import('components/admin/cats/schedules/Index.vue') },
  { path: 'admin/cat/schedules/create', component: () => import('components/admin/cats/schedules/Create.vue') },
  { path: 'admin/cat/schedules/:id/edit', component: () => import('components/admin/cats/schedules/Edit.vue') }
];
