import Employees from './partials/Employees';
import Admin from './partials/Admin';
import Positions from './partials/Positions';
import Movements from './partials/Movements';
import General from './partials/General';
import Calendar from './partials/Calendar';
import Cucop from './partials/cucop';
import Clues from './partials/clues';
import Vialidades from './partials/vialidades';
import Entidades from './partials/entidades';
import Municipios from './partials/municipios';
import Localidades from './partials/localidades';
import acreditacion from './partials/acreditacion';
import estrato from './partials/estrato';
import asentamientos from './partials/asentamientos';
import establecimientos from './partials/establecimientos';
import operacion from './partials/operacion';
import nivelAtencion from './partials/nivelAtencion';
import tipologia from './partials/tipologia';
import subtipologia from './partials/subtipologia';
import instituciones from './partials/instituciones';
import institucionesAdmor from './partials/instituciones_admor';
import scians from './partials/scians';
import jurisdicciones from './partials/jurisdicciones';

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
      ...Clues,
      ...Vialidades,
      ...Entidades,
      ...Municipios,
      ...Localidades,
      ...acreditacion,
      ...estrato,
      ...asentamientos,
      ...establecimientos,
      ...operacion,
      ...nivelAtencion,
      ...tipologia,
      ...subtipologia,
      ...instituciones,
      ...institucionesAdmor,
      ...scians,
      ...jurisdicciones
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
