<script setup lang="ts">
</script>
<template>
  <div class="header">
    <div id="logo">
      <a href="index.php">
        <img src="https://tierschutz-ohne-grenzen.de/images/logotransparent.png" alt="Tierschutz ohne Grenzen e.V.">
      </a>
    </div>
  </div>
</template>
<style scoped>
.header {
  display: flex;
  justify-content: end;
  height: 240px;
  background-image: url("https://tierschutz-ohne-grenzen.de/header.php");
  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;
  padding-top: 15px;
}

@media (min-width: 1024px) {
  .header {
    margin-top: 40px;
    padding-top: 200px;
  }
}

#logo {
  height: 170px;
  width: 1001px;
  margin: 0 auto;
  display: flex;
  justify-content: end;
}

img {
  border-width: 0;
  margin: 0;
  padding: 0;
  width: 198px;
  height: 168px;
  border-radius: 2px;
}
</style>
