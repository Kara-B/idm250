<?php     
// Template Name: Business Highlight
get_header();
?>

<!-- <p> This is a template for a new page </p> -->

<div class="businessHighlight">
  <div class="businessHighlight_image">
    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
  </div>
  <div class="businessHighlight_info">
    <h1> <?php echo get_the_title(); ?></h1>
    <div>
      <?php get_template_part('components/content'); ?>
    </div>
  </div>
</div>

<!-- line 19 goes under the title and image  (components/content) -->
<?php get_footer(); ?>