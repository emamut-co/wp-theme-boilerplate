<?php get_header(); ?>

  <div class="flex justify-center flex-wrap">
    <div class="w-2/5 mt-10">
      <?php if (have_posts()):
        while (have_posts()):
          the_post(); ?>
        <div class="text-white">
          <h2 class="text-3xl font-bold text-white"><?php the_title(); ?></h2>
          <?php the_content(); ?>
        </div>
      <?php
        endwhile;
      else:
         ?>
        <p>Sorry, no posts matched your criteria.</p>
      <?php
      endif; ?>
    </div>
  </div>

<?php get_footer();
?>
