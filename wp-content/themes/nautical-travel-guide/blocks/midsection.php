<div class="midsection">
    <h1> <?php the_field('midsection_heading'); ?> </h1>
    <p> <?php the_field('midsection_paragraph'); ?> </p>
    <?php
            $image = get_field('midsection_image');
            if(!empty($image)): ?>
        <img src="<?php echo esc_url($image['url']); ?>"
          alt="<?php echo esc_attr($image['alt']); ?>" />
        <?php endif; ?>
</div>
