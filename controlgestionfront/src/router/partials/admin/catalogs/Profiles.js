export default [
  { path: 'admin/profiles', component: () => import('components/admin/cats/profiles/Index.vue') },
  { path: 'admin/profiles/create', component: () => import('components/admin/cats/profiles/Create.vue') },
  { path: 'admin/profile/:id/edit', component: () => import('components/admin/cats/profiles/Edit.vue') }
];
