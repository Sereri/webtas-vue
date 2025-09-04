<script setup lang="ts">
import { computed } from 'vue';

const props = defineProps(['data'])
const navigationMock = [{
  title: 'Verein',
  content: [
    {
      title: 'Über uns',
      link: 'site.php?site=36'
    }
  ]
}, {
  title: 'WO WIR HELFEN',
  content: [
    {
      title: 'Spanien - Perrera von Vitoria',
      link: 'site.php?site=36'
    }
  ]
}, {
  title: 'AKTUELLES',
  content: [
    {
      title: 'Aktuelles'
    },
    {
      title: 'Spanien - Perrera von Vitoria',
      link: 'site.php?site=36'
    }
  ]
}
]

const navigation = computed(() => Array.isArray(props.data) ? props.data : navigationMock);
</script>

<template>
  <nav>
    <ul class="nav-items">
      <template v-for="(item, index) of navigation" :key="item.id">
        <li class="nav-item" tabindex="0">
          <span v-html="item.title"></span>
          <ul class="sub-items">
            <li v-for="subItem of item.content" class="sub-item" :key="subItem.id">
              <a v-if="subItem.link" :href="subItem.link">{{ subItem.title }}</a>
              <span v-else v-text="subItem.title"></span>
            </li>
          </ul>
        </li>
        <li v-if="index < navigation.length - 1" class="nav-spacer" aria-hidden="true" role="presentation">|</li>
      </template>
      <li class="nav-item">
        <form action="search.php" method="post">
          <input value="" name="search" style="display:none;" type="text">
          <input placeholder="Suchen" name="magen" class="search" type="search" results="0">
          <input name="source" value="searchbox" type="hidden">
          <input value="Suchen" style="display:none;" type="submit">
        </form>
      </li>
    </ul>
  </nav>
</template>

<style scoped>
nav {
  color: #fff;
  background-color: #C04040;
  height: 30px;
  font-family: "Verdana", "Tahoma", sans-serif;
  padding-top: 10px;
  font-weight: bold;
  font-size: 14px;
  width: 100%;
  position: fixed;
  z-index: 1000;
  top: 0;
  box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.5);
}

.nav-items {
  display: flex;
  justify-content: space-between;
  list-style: none;
  position: relative;
  z-index: 5000;
  height: 30px;
  padding: 0;
  margin: 0 auto;
  width: 1001px;
  text-align: justify;
}

.nav-item {
  display: inline-block;
  height: 30px;
  cursor: default;
}

.sub-items {
  position: absolute;
  left: -9999px;
  top: -9999px;
  width: 0;
  height: 0;
  margin: 0;
  padding: 0;
  list-style: none;
}

.sub-item {
  display: block;
  height: 18px;
  font-size: 11px;
  line-height: 18px;
  font-weight: bold;
  clear: left;
}

.sub-item a {
  font-weight: normal;
  display: block;
  font-size: 11px;
  height: 18px;
  line-height: 18px;
  text-indent: 5px;
  color: #fff;
  text-decoration: none;
}

.nav-item:hover,
.nav-item:focus-within {
  position: relative;
  z-index: 2000;
}

.nav-item:hover .sub-items,
.nav-item:focus-within .sub-items {
  left: 1px;
  top: 25px;
  padding: 3px;
  white-space: nowrap;
  height: auto;
  z-index: 3000;
  background-color: #C04040;
  overflow: visible;
  width: auto;
  color: #fff;
}

.search {
  line-height: 14px;
  text-align: left;
}
</style>
