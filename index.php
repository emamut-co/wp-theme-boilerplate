<?php get_header(); ?>

  <div class="flex justify-center mt-3 flex-wrap">
    <div class="w-4/5">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
        the_content();
      endwhile; else: ?>
        <p>Sorry, no posts matched your criteria.</p>
      <?php endif; ?>
    </div>
  </div>

<?php get_footer() ?>