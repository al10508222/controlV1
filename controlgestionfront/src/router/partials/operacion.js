export default [
  { path: 'operacion', component: () => import('components/operacion/Index.vue') },
  { path: 'operacion/create', component: () => import('components/operacion/Create.vue') },
  { path: 'operacion/:id/edit', component: () => import('components/operacion/Edit.vue') },
  { path: 'operacion/:id/show', component: () => import('components/operacion/Show.vue') },

];
