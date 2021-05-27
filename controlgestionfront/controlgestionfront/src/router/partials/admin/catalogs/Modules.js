export default [
  { path: 'admin/cat/modules', component: () => import('components/admin/cats/modules/Index.vue') },
  { path: 'admin/cat/modules/create', component: () => import('components/admin/cats/modules/Create.vue') },

];
