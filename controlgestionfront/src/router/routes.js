import Employees from './partials/Employees';
import Admin from './partials/Admin';
import Positions from './partials/Positions';
import Movements from './partials/Movements';
import General from './partials/General';
import Calendar from './partials/Calendar';
import Cucop from './partials/cucop';

// import Receipt from './partials/Receipt';

const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/Index.vue') },
      ...Employees,
      ...Admin,
      ...Positions,
      ...Movements,
      ...General,
      ...Calendar,
      ...Cucop,
    ],
    beforeEnter: (to, from, next) => {
      if (sessionStorage.getItem('grp_token')) {
        next();
      } else {
        next('/login');
      }
    },
  },
  {
    path: '/2fa',
    component: () => import('pages/TwoFA.vue')
  },
  {
    path: '/login',
    component: () => import('pages/Login.vue'),
    beforeEnter: (to, from, next) => {
      if (sessionStorage.getItem('grp_token')) {
        next('/');
      } else {
        next();
      }
    },
    children: [
      { path: '', component: () => import('pages/Index.vue') },
    ],
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: '*',
    component: () => import('pages/Error404.vue'),
  },
];

// Always leave this as last one
if (process.env.MODE !== 'ssr') {
  routes.push({
    path: '*',
    component: () => import('pages/Error404.vue')
  })
}

export default routes;
