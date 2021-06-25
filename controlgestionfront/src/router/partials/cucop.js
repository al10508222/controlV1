export default [
  { path: 'cucop', component: () => import('components/cucop/Index.vue') },
  { path: 'cucop/create', component: () => import('components/cucop/Create.vue') },
  { path: 'cucop/:id/edit', component: () => import('components/cucop/Edit.vue') },
  { path: 'cucop/:id/show', component: () => import('components/cucop/show.vue') },

];
