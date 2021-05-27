<template>
  <q-menu>
    <q-list dense style="min-width: 100px">
      <q-item v-if="canShow('users-view')" @click="$router.push('/admin/users')" clickable v-close-popup>
        <q-item-section>Usuarios</q-item-section>
      </q-item>
      <q-item v-if="canShow('concepts-view')" @click="$router.push('/positions')" dense clickable>
        <q-item-section>Puestos</q-item-section>
      </q-item>
      <q-item v-if="canShow('movements-view')" @click="$router.push('/movements')" dense clickable>
        <q-item-section>Movimientos</q-item-section>
      </q-item>
      <q-item v-if="canShow('roles-view')" @click="$router.push('/admin/profiles')" clickable v-close-popup>
        <q-item-section>Perfiles/Permisos</q-item-section>
      </q-item>
      <q-item v-if="canShow('catalogs-view')" clickable>
        <q-item-section>Catálogos</q-item-section>
        <q-item-section side>
          <q-icon name="keyboard_arrow_right" />
        </q-item-section>
        <q-menu anchor="top right" self="top left">
          <q-list>
            <q-item dense clickable>
              <q-item-section @click="$router.push('/admin/cat/documents')">Documentos</q-item-section>
            </q-item>
          </q-list>
        </q-menu>
      </q-item>
      <q-item clickable v-if="canShowSection(systemSection)">
        <q-item-section>Sistema</q-item-section>
        <q-item-section side>
          <q-icon name="keyboard_arrow_right" />
        </q-item-section>
        <q-menu anchor="top right" self="top left">
          <q-list>
            <q-item v-if="canShow('customField-view')" dense clickable>
              <q-item-section @click="$router.push('/admin/cat/customFields')">Campos personalizados</q-item-section>
            </q-item>
            <q-item dense clickable>
              <q-item-section @click="$router.push('/admin/settings')">Configuración</q-item-section>
            </q-item>
          </q-list>
        </q-menu>
      </q-item>
    </q-list>
  </q-menu>
</template>

<script>
export default {
  components: {
  },
  data() {
    return {
      reportSection: ['reports-view', 'reports-view-saved'],
      systemSection: ['customField-view'], // TODO: add permission for config
      providerSection: ['providers-view',
        'pspReview-view',
        'clients-view',
        'projects-view',
        'memo-view',
        'contracts-view',
        'payments-view',
        'pspPaymentConsult-view',
        'pspApReview-view',
        'pspBinnacle-view',
        'pspBinnacle-view',
      ],
    }
  },
  methods: {
    canShowSection(section) {
      return this.canShowAny(section)
    },
  }
};
</script>
