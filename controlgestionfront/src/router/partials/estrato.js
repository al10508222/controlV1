export default [
  { path: 'estrato', component: () => import('components/estrato/Index.vue') },
  { path: 'estrato/create', component: () => import('components/estrato/Create.vue') },
  { path: 'estrato/:id/edit', component: () => import('components/estrato/Edit.vue') },
  { path: 'estrato/:id/show', component: () => import('components/estrato/Show.vue') },

];
