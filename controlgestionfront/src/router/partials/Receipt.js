export default [
  { path: 'admin/receipt', component: () => import('components/receipt/Index.vue') },
  { path: 'admin/receipt/create', component: () => import('components/receipt/Create.vue') },
];
