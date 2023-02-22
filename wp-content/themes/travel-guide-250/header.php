<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dist/styles/main.css">
    <title>Visit The Inner Harbor</title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
<?php
  // @link https://developer.wordpress.org/reference/functions/wp_body_open/
  // Fires the wp_body_open action.
  wp_body_open();
  ?>
<div class="menuHeader">
    <h3 class="navItem"> Things to Do </h3>
    <h3 class="navItem"> History </h3>
    <h3 class="navItem"> Travel </h3>
</div>
<?php wp_nav_menu(['theme_location' => 'primary-menu']); ?>