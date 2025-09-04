<script setup lang="ts">
import Navi from './components/Navi.vue';
import Header from './components/Header.vue';
import Content from './components/Content.vue';
import Sidebar from './components/Sidebar.vue';
import Footer from './components/Footer.vue';
import { onMounted, reactive } from 'vue';

const data = reactive({
  sidebar: {},
  content: {},
  navigation: {}
})


onMounted(() => {
  if (!['localhost', '127.0.0.1'].includes(window.location.hostname)) {
    fetch('/vue_data.php').then((response) => response.json()).then((responseData: { content: {}, navigation: {}, sidebar: {} }) => {
      data.sidebar = responseData.sidebar;
      data.content = responseData.content;
      data.navigation = responseData.navigation;
    });
  }
})

</script>

<template>
  <header>
    <Navi :data="data.navigation" />
    <Header></Header>
  </header>

  <main>
    <Content :data="data.content" />
    <Sidebar :data="data.sidebar" />
  </main>
  <Footer></Footer>
</template>

<style scoped>
header::after {
  display: block;
  content: '';
  width: 100%;
  height: 10px;
  background-color: #F8F8F8;
}

main {
  display: flex;
  width: 100%;
  max-width: 1001px;
  margin-left: auto;
  margin-right: auto;
  height: auto;
  overflow: hidden;
  margin-top: -75px;
  justify-content: space-between;
}

@media (max-width: 600px) {
  main {
    flex-direction: column-reverse;
  }
}
</style>
