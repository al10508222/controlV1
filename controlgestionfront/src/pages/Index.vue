<template>
  <div>
    <DashBoard v-if="canShow('dashboard-view')" />
    <div class="row">
      <div v-for="link in links" v-bind:key="link.title" class="col-xs-12 col-sm-6 col-md-3">
        <HomeCard v-if="canShow(link.permission)" :title='link.title' :link='link.path'  :description="link.description"/>
      </div>
    </div>
  </div>
</template>
<script>
import DashBoard from 'components/dashboard/Index';
import HomeCard from '../components/HomeCard';

export default {
  components: { HomeCard, DashBoard },
  name: 'PageIndex',
  mounted() {
  },
  data() {
    return {
      slide: 1,
      otp: true,
      links: [
        { title: 'Personas', path: '/employees', permission: 'employee-view', description: 'Administra las personas que laboran el la institución' },
        { title: 'Movimientos', path: '/movements', permission: 'movements-view', description: 'Movimientos' },
        { title: 'Puestos', path: '/positions', permission: 'positions-view', description: 'Administra los puestos de trabajo disponibles en la institución' },
        { title: 'Dashboard', path: '/dashboard', permission: 'dashboard-view', description: 'Vista general del sistema' },
        { title: 'Calendario', path: '/calendar', permission: 'calendar-view', description: 'Accede a un calendario para planear eventos o programar actividades' },
        { title: 'Catálogo CuCop', path: '/cucop', permission: 'cucop-view', description: 'Detalle del Catálogo' },
        // { title: 'Proyectos', path: '/psp/projects' },
        // { title: 'Proveedores', path: '/psp/providers' },
        // { title: 'Memos de Contrato', path: '/psp/hiringMemos' },
        // { title: 'Contratos', path: '/psp/contracts' },
        // { title: 'Facturas', path: '/psp/invoices' },
      ],
    };
  },
};
</script>
