export default [
  { path: 'movements', component: () => import('components/movements/Index.vue') },
  { path: 'movements/create/:curp?', component: () => import('components/movements/Create.vue') },
  { path: 'movements/:id/edit', component: () => import('components/movements/Edit.vue') },
];
