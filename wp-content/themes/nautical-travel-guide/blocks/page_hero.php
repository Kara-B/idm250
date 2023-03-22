<div class="hero">
    <div>
      <h1> <?php the_field('page_hero_heading'); ?> </h1>
      <?php
            $image = get_field('page_hero_image');
            if(!empty($image)): ?>
        <img src="<?php echo esc_url($image['url']); ?>"
          alt="<?php echo esc_attr($image['alt']); ?>" />
        <?php endif; ?>
    </div>
    <svg viewBox="0 0 1274 74" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M0 31L1274 31.0001" stroke="black" stroke-width="11"/>
    <circle cx="640" cy="37" r="32.5" fill="white" stroke="black" stroke-width="9"/>
    </svg>
  </div>