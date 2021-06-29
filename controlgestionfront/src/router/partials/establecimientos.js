export default [
  { path: 'establecimientos', component: () => import('components/establecimientos/Index.vue') },
  { path: 'establecimientos/create', component: () => import('components/establecimientos/Create.vue') },
  { path: 'establecimientos/:id/edit', component: () => import('components/establecimientos/Edit.vue') },
  { path: 'establecimientos/:id/show', component: () => import('components/establecimientos/Show.vue') },

];
