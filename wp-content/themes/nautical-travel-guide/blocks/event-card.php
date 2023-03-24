<div class="eventCard"> 
<?php
            $image = get_field('event_card_image');
            if(!empty($image)): ?>
        <img src="<?php echo esc_url($image['url']); ?>"
          alt="<?php echo esc_attr($image['alt']); ?>" />
        <?php endif; ?>
    <div class="eventCard_Headings"> 
        <h4 class="eventCard_category"> <?php the_field('event_card_category'); ?> <h4>
        <h2> <?php the_field('event_card_title'); ?></h2>
    </div>
    <div class="eventCard_Info">
        <div class="eventCard_Detail"> 
        <iconify-icon icon="material-symbols:calendar-month"></iconify-icon>
            <p> <?php the_field('event_card_date'); ?> </p>
        </div>
        <div class="eventCard_Detail"> 
            <iconify-icon icon="material-symbols:location-on-outline-rounded"></iconify-icon>
            <p> <?php the_field('event_card_location'); ?> </p>
        </div>
    </div>
</div>