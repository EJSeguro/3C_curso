<script setup>
import Card from '@/components/Card.vue';

</script>

<template>
  <main>
    <div class="cards">
      <Card class="card"/>
      <Card class="card"/>
      <Card class="card"/>
      <Card class="card"/>
      <Card class="card"/>
    </div>
  </main>
</template>

<style scoped>
main {
  width: 100vw;
  height: 80vh;
}

.cards {
  display: flex;
  flex-wrap: wrap;
  flex-direction: row;
  justify-content: space-evenly;
  gap: 2px;
}

.cards .card {
  margin: 25px 10px;
}
</style>