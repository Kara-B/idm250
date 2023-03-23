<?php     
// Template Name: General Information with Midsection
get_header();
?>

<!-- <p> This is a template for a new page </p> -->
<div class="hero">
    <div>
      <h1> <?php echo get_the_title(); ?> </h1>
        <img src="<?php echo get_the_post_thumbnail_url(); ?>"
          alt="" />
    
    </div>
    <svg viewBox="0 0 1274 74" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M0 31L1274 31.0001" stroke="black" stroke-width="11"/>
    <circle cx="640" cy="37" r="32.5" fill="white" stroke="black" stroke-width="9"/>
    </svg>
  </div>
<?php get_template_part('components/content'); ?>
<!-- line 19 goes under the title and image  -->
<?php get_footer(); ?>