export default [
  { path: 'entidades', component: () => import('components/entidades/Index.vue') },
  { path: 'entidades/create', component: () => import('components/entidades/Create.vue') },
  { path: 'entidades/:id/edit', component: () => import('components/entidades/Edit.vue') },

];
