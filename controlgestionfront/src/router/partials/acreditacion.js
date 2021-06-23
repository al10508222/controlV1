export default [
  { path: 'acreditacion', component: () => import('components/acreditacion/Index.vue') },
  { path: 'acreditacion/create', component: () => import('components/acreditacion/Create.vue') },
  { path: 'acreditacion/:id/edit', component: () => import('components/acreditacion/Edit.vue') },
  { path: 'acreditacion/:id/show', component: () => import('components/acreditacion/Show.vue') },

];
