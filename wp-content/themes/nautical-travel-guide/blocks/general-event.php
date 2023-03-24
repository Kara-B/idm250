<div class="upcomingEvent">
<?php
            $image = get_field('general_event_image');
            if(!empty($image)): ?>
        <img src="<?php echo esc_url($image['url']); ?>"
          alt="<?php echo esc_attr($image['alt']); ?>" />
        <?php endif; ?>
    <h2> <?php the_field('general_event_title'); ?></h2>
</div>