const URL_BASE = 'admin/cat/vacations-types'
export default [
  { path: `${URL_BASE}`, component: () => import('components/admin/cats/vacationsTypes/Index') },
  { path: `${URL_BASE}/create`, component: () => import('components/admin/cats/vacationsTypes/Create') },
  { path: `${URL_BASE}/:id/edit`, component: () => import('components/admin/cats/vacationsTypes/Edit') },
]
