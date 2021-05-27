export default [
  { path: 'admin/config/law-vacations', component: () => import('components/admin/config/lawVacations/Index.vue') },
  { path: 'admin/config/law-vacations/create', component: () => import('components/admin/config/lawVacations/Create.vue') },
  { path: 'admin/config/law-vacations/:id/edit', component: () => import('components/admin/config/lawVacations/Edit.vue') },
];
