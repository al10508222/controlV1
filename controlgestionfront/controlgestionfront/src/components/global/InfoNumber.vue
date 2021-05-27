<template>
  <div>
    <div class="title">{{title}}</div>
    <div class="amount">
      {{moneyFilter(amount)}}
    </div>
    <div v-if="info" class="info">
      {{info}}
    </div>
  </div>
</template>
<script>
import { Money } from 'src/utils/Filters'

export default {
  props: ['title', 'amount', 'info'],
  methods: {
    moneyFilter(money) {
      return Money(money);
    },
  }
}
</script>
<style scoped>
  .title {
    text-align: center;
    font-size: 20px;
    color: #5b5b5b;
    text-transform: uppercase;
  }
  .amount {
    text-align: center;
    font-size: 40px;
  }
  .info{
    font-size: 10px;
  }
</style>
