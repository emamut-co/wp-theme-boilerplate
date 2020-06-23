<?php get_header(); ?>

  <div class="flex mb-4">
    <div class="w-1/2 h-12" :class="message.bgClass" v-for="message in messages">{{ message.text }}</div>
  </div>

<?php get_footer() ?>