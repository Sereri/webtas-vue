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

function toggleMenu(event: MouseEvent) {
  const target = event.target as Element;
  if (window.matchMedia('min-width: 600px').matches || !target) {
    return;
  }
  target.parentElement?.classList.toggle('active');
  document.body.classList.toggle('locked');
}
</script>

<template>
  <nav>
    <button class="menu-button" @click="toggleMenu">☰</button>
    <ul class="nav-items">
      <template v-for="(item, index) of navigation" :key="item.id">
        <li class="nav-item" tabindex="0">
          <span v-html="item.title"></span>
          <ul class="sub-items">
            <li v-for="subItem of item.content" class="sub-item" :key="subItem.id">
              <a v-if="subItem.link" :href="subItem.link">{{ subItem.title }}</a>
              <span v-else v-text="`${subItem.title}:`"></span>
            </li>
          </ul>
        </li>
        <li v-if="index < navigation.length - 1" class="nav-spacer" aria-hidden="true" role="presentation">|</li>
      </template>
      <li class="nav-item nav-item-search">
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
* {
  margin: 0;
  padding: 0;
}

nav {
  color: #fff;
  background-color: #C04040;
  height: 60px;
  font-family: "Verdana", "Tahoma", sans-serif;
  font-weight: bold;
  width: 60px;
  position: fixed;
  z-index: 1000;
  top: 0;
  box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.5);
}


.menu-button {
  appearance: none;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 60px;
  width: 60px;
  background: transparent;
  border: 0;
  color: #fff;
  font-weight: bold;
}

.nav-items {
  display: none;
  row-gap: 15px;
  padding: 0 20px;
  overflow: auto;
  height: 100%;
}

.nav-item-search {
  order: -1;
}

nav.active {
  height: 100%;
  width: 100%;
}

nav.active .nav-items {
  display: flex;
  flex-direction: column;
}

.nav-spacer {
  display: none;
}

.sub-items {
  display: flex;
  flex-direction: column;
  row-gap: 10px;
  padding: 10px 0;
}

.sub-item {
  display: block;
  height: 18px;
  font-size: smaller;
  line-height: 18px;
  font-weight: bold;
}

.sub-item a {
  font-weight: normal;
  display: block;
  text-indent: 5px;
  color: #fff;
  text-decoration: none;
}

.search {
  line-height: 30px;
  text-align: left;
  width: 100%;
}

@media (min-width:1024px) {
  .menu-button {
    display: none;
  }

  nav,
  nav.active {
    padding-top: 10px;
    height: 30px;
    width: 100%;
    max-width: 100%;
    font-size: 14px;
  }

  nav::before {
    content: none
  }

  .nav-items,
  nav.active .nav-items {
    display: flex;
    justify-content: space-between;
    list-style: none;
    position: relative;
    z-index: 5000;
    height: 30px;
    padding: 0;
    margin: 0 auto;
    max-width: 1001px;
    text-align: justify;
    row-gap: 0;
    overflow: visible;
  }

  .nav-item {
    display: inline-block;
    height: 30px;
    cursor: default;
  }

  .nav-item-search {
    order: initial;
  }

  .nav-spacer {
    display: inline;
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
    row-gap: 0;
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
    width: auto;
  }
}
</style>
