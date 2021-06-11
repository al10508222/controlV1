export default [
  { path: 'municipios', component: () => import('components/municipios/Index.vue') },
  { path: 'municipios/create', component: () => import('components/municipios/Create.vue') },
  { path: 'municipios/:id/edit', component: () => import('components/municipios/Edit.vue') },

];
