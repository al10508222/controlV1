export default [
  { path: 'subtipologia', component: () => import('components/subtipologia/Index.vue') },
  { path: 'subtipologia/create', component: () => import('components/subtipologia/Create.vue') },
  { path: 'subtipologia/:id/edit', component: () => import('components/subtipologia/Edit.vue') },
  { path: 'subtipologia/:id/show', component: () => import('components/subtipologia/Show.vue') },

];
