export default [
  { path: 'instituciones_admor', component: () => import('components/instituciones_admor/Index.vue') },
  { path: 'instituciones_admor/create', component: () => import('components/instituciones_admor/Create.vue') },
  { path: 'instituciones_admor/:id/edit', component: () => import('components/instituciones_admor/Edit.vue') },
  { path: 'instituciones_admor/:id/show', component: () => import('components/instituciones_admor/Show.vue') },

];
