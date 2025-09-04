<script setup lang="ts">
defineProps(['width', 'image', 'text', 'link']);
</script>
<template>
  <div :class="`block block-${width || 1}`">
    <a :href="link" target="_blank" class="block-image">
      <img :src="image" alt="Artikel #76">
    </a>
    <div class="block-text">{{ text }}</div>
    <a :href="link" target="_blank" class="block-link">weiter</a>
  </div>
</template>
<style scoped>
.block {
  display: flex;
  flex-direction: column;
  font-size: small;
  color: #222;
  overflow: hidden;
  padding: 5px;
  background-color: #efefef;
  border-radius: 2px;
}

.block-image {
  width: 100%;
  padding-bottom: 5px;
}

.block-image img {
  width: 100%;
  aspect-ratio: 1.25 / 1;
}

.block-text {
  height: 97px;
  font-size: small;
}

.block-link {
  text-align: right;
  height: 13px;
  line-height: 11px;
  font-size: small;
  font-weight: bold;
}

.block-link a {
  color: #C04040;
}

@media (min-width: 600px) {
  .block-2 {
    grid-column: span 2;
  }
}
</style>
