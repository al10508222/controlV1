export default [
  { path: 'localidades', component: () => import('components/localidades/Index.vue') },
  { path: 'localidades/create', component: () => import('components/localidades/Create.vue') },
  { path: 'localidades/:id/edit', component: () => import('components/localidades/Edit.vue') },
  { path: 'localidades/:id/show', component: () => import('components/localidades/Show.vue') },

];
