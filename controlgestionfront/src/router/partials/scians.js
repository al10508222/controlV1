export default [
  { path: 'instituciones', component: () => import('components/instituciones/Index.vue') },
  { path: 'instituciones/create', component: () => import('components/instituciones/Create.vue') },
  { path: 'instituciones/:id/edit', component: () => import('components/instituciones/Edit.vue') },
  { path: 'instituciones/:id/show', component: () => import('components/instituciones/Show.vue') },

];
