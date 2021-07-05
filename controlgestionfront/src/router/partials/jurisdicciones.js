export default [
  { path: 'jurisdicciones', component: () => import('components/jurisdicciones/Index.vue') },
  { path: 'jurisdicciones/create', component: () => import('components/jurisdicciones/Create.vue') },
  { path: 'jurisdicciones/:id/edit', component: () => import('components/jurisdicciones/Edit.vue') },
  { path: 'jurisdicciones/:id/show', component: () => import('components/jurisdicciones/Show.vue') },

];
