<template>
  <div class="row q-col-gutter-md">
    <div class="col-xs-12 col-sm-6 col-md-4">
      <q-select :disable="!isFirst" :readonly="readonly" map-options emit-value clearable outlined v-model="account.cat_bank_account_type_id" option-value="id" option-label="name" :options="catalogs.bank_account_types" label="Tipo de cuenta" :rules="[val => !!val || 'Este campo es requerido']" />
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4" v-if="account.cat_bank_account_type_id === 3">
      <q-input @input="selectBank" :disable="!isFirst" :readonly="readonly" square outlined v-model="account.clabe" label="CLABE" :rules="[requiredIfAccountTypeCLABE]" mask="##################"/>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4" v-if="account.cat_bank_account_type_id === 1">
      <q-input :disable="!isFirst" :readonly="readonly" square outlined v-model="account.account" label="Cuenta" :rules="[requiredIfNotAccountTypeCLABE]" mask="##########"/>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4">
      <q-select standard use-input map-options input-debounce="0" :readonly="readonly" :disable="!isFirst || account.cat_bank_account_type_id == 3" behavior="menu" emit-value clearable outlined v-model="account.cat_bank_id" option-value="id" option-label="name" :options="BankOptions" label="Banco" :rules="[val => !!val || 'Este campo es requerido']" @filter="filterFnBank"/>
    </div>
  </div>
</template>

<script>
import { notifyError } from 'src/utils/notify'

export default {
  props: {
    account: {
      type: Object,
      required: true
    },
    isFirst: {
      type: Boolean,
      required: true
    },
    readonly: {
      type: Boolean,
      default: false
    }
  },
  data() {
    return {
      BankOptions: [],
    }
  },
  created() {
    this.BankOptions = this.catalogs.banks
  },
  computed: {
    catalogs: {
      get() {
        return this.$store.state.catalogs;
      }
    },
  },
  watch: {
    // eslint-disable-next-line func-names
    'account.cat_bank_account_type_id': function () {
      this.BankOptions = this.catalogs.banks;
    },
  },
  methods: {
    requiredIfAccountTypeCLABE() {
      // if (this.account.cat_bank_account_type_id == 3)
      let valid = true;
      if (this.account.cat_bank_account_type_id === 3 && this.account.clabe === '') {
        valid = false
      }
      return valid || 'Debe ingresar un valor';
    },
    requiredIfNotAccountTypeCLABE() {
      let valid = true;
      if (this.account.cat_bank_account_type_id !== 3 && this.account.account === '') {
        valid = false
      }
      return valid || 'Debe ingresar un valor';
    },
    selectBank(val) {
      const inputText = val.substring(0, 3);
      if (inputText.length === 3) {
        const result = this.BankOptions.find(({ identifier }) => identifier === inputText);
        if (result !== undefined) {
          this.account.cat_bank_id = result.id
        } else {
          this.account.clabe = '';
          this.account.cat_bank_id = '';
          notifyError('No se ha encontrado un banco con la CLABE ingresada. Contacte al administrador de sistema')
        }
      }
    },
    filterFnBank(val, update) {
      update(() => {
        const needle = val.toString().toLowerCase();
        this.BankOptions = this.catalogs.banks.filter(
          (v) => v.name.toLowerCase().indexOf(needle) > -1,
        );
      })
    }
  },
};
</script>

<style>

</style>
