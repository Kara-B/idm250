<!-- this is where we format the card in our archive -->
<div class="eventCard"> 
<img src="<?php echo get_the_post_thumbnail_url(); ?>"
          alt="" />
    <div class="eventCard_Headings"> 
        <h4 class="eventCard_category"> <?php the_field('event_card_category'); ?> <h4>
        <h2> <?php the_field('event_card_title'); ?></h2>
    </div>
</div>