export default [
  { path: 'nivel_atencion', component: () => import('components/nivel_atencion/Index.vue') },
  { path: 'nivel_atencion/create', component: () => import('components/nivel_atencion/Create.vue') },
  { path: 'nivel_atencion/:id/edit', component: () => import('components/nivel_atencion/Edit.vue') },
  { path: 'nivel_atencion/:id/show', component: () => import('components/nivel_atencion/Show.vue') },

];
