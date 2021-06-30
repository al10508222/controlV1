export default [
  { path: 'tipologia', component: () => import('components/tipologia/Index.vue') },
  { path: 'tipologia/create', component: () => import('components/tipologia/Create.vue') },
  { path: 'tipologia/:id/edit', component: () => import('components/tipologia/Edit.vue') },
  { path: 'tipologia/:id/show', component: () => import('components/tipologia/Show.vue') },

];
