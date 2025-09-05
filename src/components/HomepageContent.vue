<script setup lang="ts">

import { computed } from 'vue';
import Block from './Block.vue';

const props = defineProps(['data']);

const contentMock = [{
  id: 0,
  width: 1,
  image: 'https://tierschutz-ohne-grenzen.de/bilder/76front.jpg',
  text: 'Lebensgefahr! Das gilt für Kinder !!  und Haustiere gleichermaßen: lassen Sie Ihren Liebling nicht im Auto! Und nicht nur weil das teuer werden kann....',
  link: 'http://www.youtube.com/watch?v=27nAje6I3O4&feature=youtu.be'
}, {
  id: 1,
  width: 1,
  image: 'https://tierschutz-ohne-grenzen.de/bilder/76front.jpg',
  text: 'Lebensgefahr! Das gilt für Kinder !!  und Haustiere gleichermaßen: lassen Sie Ihren Liebling nicht im Auto! Und nicht nur weil das teuer werden kann....',
  link: 'http://www.youtube.com/watch?v=27nAje6I3O4&feature=youtu.be'
}, {
  id: 2,
  width: 2,
  image: 'https://tierschutz-ohne-grenzen.de/bilder/2front.jpg',
  text: 'Wir möchten Sie ermutigen, Herdenschutzhunde (HSHe) nicht beim Züchter zu erwerben, sondern auf Nummer sicher zu gehen und sich von erfahrenen Tierschützern beraten zu lassen und den passenden Tierschutz-HSH zu adoptieren. Spanische HSHe machen es den Neulingen dieser Rassen in der Regel leichter.  ',
  link: 'https://www.tierschutz-ohne-grenzen.de/site.php?site=70'
}, {
  id: 3,
  width: 1,
  image: 'https://tierschutz-ohne-grenzen.de/bilder/76front.jpg',
  text: 'Lebensgefahr! Das gilt für Kinder !!  und Haustiere gleichermaßen: lassen Sie Ihren Liebling nicht im Auto! Und nicht nur weil das teuer werden kann....',
  link: 'http://www.youtube.com/watch?v=27nAje6I3O4&feature=youtu.be'
}, {
  id: 4,
  width: 1,
  image: 'https://tierschutz-ohne-grenzen.de/bilder/76front.jpg',
  text: 'Lebensgefahr! Das gilt für Kinder !!  und Haustiere gleichermaßen: lassen Sie Ihren Liebling nicht im Auto! Und nicht nur weil das teuer werden kann....',
  link: 'http://www.youtube.com/watch?v=27nAje6I3O4&feature=youtu.be'
}, {
  id: 5,
  width: 1,
  image: 'https://tierschutz-ohne-grenzen.de/bilder/76front.jpg',
  text: 'Lebensgefahr! Das gilt für Kinder !!  und Haustiere gleichermaßen: lassen Sie Ihren Liebling nicht im Auto! Und nicht nur weil das teuer werden kann....',
  link: 'http://www.youtube.com/watch?v=27nAje6I3O4&feature=youtu.be'
}, {
  id: 6,
  width: 1,
  image: 'https://tierschutz-ohne-grenzen.de/bilder/76front.jpg',
  text: 'Lebensgefahr! Das gilt für Kinder !!  und Haustiere gleichermaßen: lassen Sie Ihren Liebling nicht im Auto! Und nicht nur weil das teuer werden kann....',
  link: 'http://www.youtube.com/watch?v=27nAje6I3O4&feature=youtu.be'
}, {
  id: 7,
  width: 1,
  image: 'https://tierschutz-ohne-grenzen.de/bilder/76front.jpg',
  text: 'Lebensgefahr! Das gilt für Kinder !!  und Haustiere gleichermaßen: lassen Sie Ihren Liebling nicht im Auto! Und nicht nur weil das teuer werden kann....',
  link: 'http://www.youtube.com/watch?v=27nAje6I3O4&feature=youtu.be'
}
];

const contents = computed(() => Array.isArray(props.data) ? props.data : contentMock);


</script>
<template>
  <div class="homepage-content">
    <template v-for="content in contents" :key="content.width">
      <Block v-bind:="content" />
    </template>
  </div>
</template>
<style scoped>
.homepage-content {
  display: grid;
  grid-template-columns: 1fr;
  grid-auto-flow: row dense;
  font-family: "Verdana", "Tahoma", sans-serif;
  gap: 5px;
  row-gap: 15px;
  max-width: 781px;
  padding-top: 15px;
}

@media (min-width: 600px) {
  .homepage-content {
    grid-template-columns: 1fr 1fr;
  }
}

@media (min-width: 1024px) {
  .homepage-content {
    grid-template-columns: 1fr 1fr 1fr;
  }
}
</style>
