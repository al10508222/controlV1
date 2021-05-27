export default [
  { path: 'positions', component: () => import('components/positions/Index.vue') },
  { path: 'positions/create', component: () => import('components/positions/Create.vue') },
  { path: 'positions/:id/edit', component: () => import('components/positions/Edit.vue') },

];
