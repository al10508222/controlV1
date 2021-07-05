export default [
  { path: 'scians', component: () => import('components/scians/Index.vue') },
  { path: 'scians/create', component: () => import('components/scians/Create.vue') },
  { path: 'scians/:id/edit', component: () => import('components/scians/Edit.vue') },
  { path: 'scians/:id/show', component: () => import('components/scians/Show.vue') },

];
