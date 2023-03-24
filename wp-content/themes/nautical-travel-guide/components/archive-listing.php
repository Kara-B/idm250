<?php
/**
 * This component is used to display the archive listing.
 * To set the number of posts per page, go to Settings > Reading > Blog pages show at most
 */
?>
<div class="" data-component="archive-listing">
  <div class="">
    <div class="">
      <?php
        if (have_posts()) {
            // Load posts loop.
            while (have_posts()) {
                the_post();
                get_template_part('components/archive-card');
            }
        } else {
            echo 'no posts found';
        }
?>

    </div>
  </div>
</div>