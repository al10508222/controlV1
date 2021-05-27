<template>
  <div>
    <div class="text-h6">
      Datos bancarios
      <q-btn class="float-right" round size="sm" @click="handleNewAccount" outline color="primary" icon="fas fa-plus" v-if="canCreate"/>
    </div>
    <!-- Agregar un scroll bar -->
    <div class="account-list q-mt-lg" v-for="(account, index) in employee.accounts.slice().reverse()" :key="account.id">
        <p v-if="index == 0" class="text-blue-10"><i class="fas fa-wallet"></i> Cuenta bancaria actual</p>
        <p v-if="index == 1" class="text-blue-10"><i class="fas fa-wallet"></i> Cuentas anteriores</p>
        <BankAccount :account="account" :isFirst="index == 0" :readonly="!canEdit" />
    </div>
    <!-- Dialog to add new account -->
    <q-dialog v-model="confirmNewAccount" persistent>
      <q-card>
        <q-card-section class="row items-center">
          <q-avatar icon="warning" color="orange" text-color="white" />
          <span class="q-ml-sm">Esta acción desactivará la última cuenta bancaria registrada</span>
        </q-card-section>

        <q-card-actions align="right">
          <q-btn flat label="Cancelar" color="primary" v-close-popup />
          <q-btn flat label="Continuar" color="primary" v-close-popup @click="addAccount"/>
        </q-card-actions>
      </q-card>
    </q-dialog>
  </div>
</template>

<script>
import { notifyError } from 'src/utils/notify'
import BankAccount from './BankAccount';

export default {
  components: { BankAccount },
  data() {
    return {
      confirmNewAccount: false
    }
  },
  methods: {
    addAccount() {
      this.$store.commit('employee/addAccount', {});
      this.$forceUpdate()
    },
    handleNewAccount() {
      const activeAccount = this.employee.accounts[0];
      if (activeAccount != null) {
        let isValid = false;
        if (activeAccount.cat_bank_id == null || activeAccount.cat_bank_account_type_id == null) {
          isValid = false
        } else if (activeAccount.cat_bank_account_type_id === 3 && activeAccount.clabe === '') {
          isValid = false
        } else if (activeAccount.cat_bank_account_type_id !== 3 && activeAccount.account === '') {
          isValid = false
        } else {
          isValid = true
        }
        if (isValid) {
          this.confirmNewAccount = true
        } else {
          notifyError('Debe completar los datos de la última cuenta bancaria.')
        }
      } else {
        this.$store.commit('employee/addAccount', {});
      }
    }
  },
  computed: {
    employee: {
      get() {
        return this.$store.state.employee;
      },
      set(val) {
        this.$store.commit('employee/updateEmployee', val);
      },
    },
    canEdit: {
      get() {
        return this.canShow('employee-edit');
      }
    },
    canCreate: {
      get() {
        return this.canShow('employee-create');
      }
    }
  }
}
</script>

<style>

</style>
