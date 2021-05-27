export default [
  { path: 'admin/config/five-year-bonus', component: () => import('components/admin/config/fiveYearBonus/Index.vue') },
  { path: 'admin/config/five-year-bonus/create', component: () => import('components/admin/config/fiveYearBonus/Create.vue') },
  { path: 'admin/config/five-year-bonus/:id/edit', component: () => import('components/admin/config/fiveYearBonus/Edit.vue') }
];
