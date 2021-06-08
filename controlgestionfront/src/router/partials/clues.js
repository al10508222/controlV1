export default [
  { path: 'clues', component: () => import('components/clues/Index.vue') },
  { path: 'clues/create', component: () => import('components/clues/Create.vue') },
  { path: 'clues/:id/edit', component: () => import('components/clues/Edit.vue') },

];
