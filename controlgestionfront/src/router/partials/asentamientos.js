export default [
  { path: 'asentamientos', component: () => import('components/asentamientos/Index.vue') },
  { path: 'asentamientos/create', component: () => import('components/asentamientos/Create.vue') },
  { path: 'asentamientos/:id/edit', component: () => import('components/asentamientos/Edit.vue') },
  { path: 'asentamientos/:id/show', component: () => import('components/asentamientos/Show.vue') },

];
