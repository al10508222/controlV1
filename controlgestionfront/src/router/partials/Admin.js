import Documents from './admin/catalogs/Documents';
import Modules from './admin/catalogs/Modules';
import Profiles from './admin/catalogs/Profiles';
import customFields from './admin/catalogs/CustomFields';
import renderFields from './admin/renderFields/renderFields';
import Test from './admin/catalogs/Test';

export default [
  { path: 'admin', component: () => import('components/admin/Index.vue') },
  { path: 'admin/users', component: () => import('components/admin/users/Index.vue') },
  { path: 'admin/users/create', component: () => import('components/admin/users/Create.vue') },
  { path: 'admin/users/:id/edit', component: () => import('components/admin/users/Edit.vue') },
  { path: 'admin/settings', component: () => import('components/admin/settings/Index.vue') },
  // { path: 'admin/cat/lawVacations', component: () => import('components/admin/cats/lawVacations/Index.vue') },
  ...Documents,
  ...Modules,
  ...Profiles,
  ...customFields,
  ...renderFields,
  ...Test,
];
