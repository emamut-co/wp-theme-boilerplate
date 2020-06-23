<?php get_header(); ?>

<div class="container mx-auto">
  <div class="flex mb-4" id="app">
    <div class="w-1/2 h-12" :class="message.bgClass" v-for="message in messages">{{ message.text }}</div>
  </div>
</div>

<?php get_footer() ?>