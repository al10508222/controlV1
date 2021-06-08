export default [
  { path: 'vialidades', component: () => import('components/vialidades/Index.vue') },
  { path: 'vialidades/create', component: () => import('components/vialidades/Create.vue') },
  { path: 'vialidades/:id/edit', component: () => import('components/vialidades/Edit.vue') },

];
