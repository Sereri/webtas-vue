<script setup lang="ts">
import { computed } from 'vue';

const props = defineProps(['data']);


const sidebarMock = [{
  content: '<p>lol</p>'
}, {
  content: '<strong>Spenden:</strong><br><a href="site.php?site=38"><img src="http://www.tierschutz-ohne-grenzen.de/bilder/Tierschutz-spenden-Sie-einer-guten-Sache.jpg" width="190" alt="Spenden Sie Online" title="Spenden Sie Online"></a>'
}, {
  content: '<p style="text-align:center"><span style="font-size: medium;"><strong><a href="http://www.tierschutz-ohne-grenzen.de/vermittlung.php">Zu unseren Hunden</a></strong></span></p>'
}, {
  content: '<strong>Unsere Seiten bei:</strong><a href="https://www.facebook.com/pages/Tierschutz-ohne-Grenzen-eV/529951040360668"><img src="http://www.tierschutz-ohne-grenzen.de/images/group-site.png" alt="Die Tierschutz ohne Grenzen Seite bei facebook.com" title="Die Tierschutz ohne Grenzen Seite bei facebook.com" style="margin-top:5px"></a><br><a href="http://www.youtube.com/akzeptiere"><img src="http://www.tierschutz-ohne-grenzen.de/images/channel.png" style="margin-top:5px" alt="Der Tierschutz ohne Grenzen Channel bei Youtube.com" title="Der Tierschutz ohne Grenzen Channel bei Youtube.com"></a><strong>Unsere Facebook-Gruppe:</strong><a href="http://www.facebook.com/group.php?gid=120104428003823"><img src="http://www.tierschutz-ohne-grenzen.de/images/group-site.png" alt="Die Tierschutz ohne Grenzen Gruppe bei facebook.com" title="Die Tierschutz ohne Grenzen Gruppe bei facebook.com" style="margin-top:5px"></a>'
}]

const sidebarContent = computed(() => Array.isArray(props.data) ? props.data : sidebarMock);
</script>
<template>
  <div class="sidebar">
    <div class="sidebar-items">
      <div class="sidebar-item sidebar-head">Aktiv werden:</div>
      <div v-for="sbcontent in sidebarContent" class="sidebar-item" v-html="sbcontent.content" :key="sbcontent.id">
      </div>
    </div>
  </div>
</template>
<style scoped>
.sidebar {
  overflow: auto;
  max-width: 100vw;
}

@media (min-width: 600px) {
  .sidebar {
    overflow: visible;
    max-width: none;
    flex: 1 0 auto;
    align-self: stretch;
    position: sticky;
    height: fit-content;
    top: 0;
    max-width: 198px;
  }
}

@media (min-width: 1024px) {
  .sidebar {
    top: 40px;
  }
}

.sidebar-items {
  display: flex;
  font-family: "Verdana", "Tahoma", sans-serif;
  font-size: small;
  align-items: stretch;
  gap: 5px;
  padding: 0 5px;
}

@media (min-width: 600px) {
  .sidebar-items {
    flex-direction: column;
    align-items: normal;
    min-width: 198px;
    width: 198px;
    padding: 0;
    gap: 15px;
  }
}

.sidebar-item {
  flex-shrink: 0;
  font-size: small;
  overflow: hidden;
  padding: 4px;
  color: #333;
  background-color: #efefef;
  border-radius: 2px;
  width: 198px;
  align-self: stretch;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
}

.sidebar-item :deep(a) {
  color: #C04040;
}

@media (min-width: 600px) {
  .sidebar-item {
    display: block;
  }
}

.sidebar-head {
  font-size: 16px;
  font-weight: bold;
}

@media (min-width: 600px) {
  .sidebar-head {
    display: block;
    margin-top: 15px;
  }
}
</style>
