<!-- this is where we format the card in our archive -->
<a href="<?php echo get_the_permalink(); ?>">
    <div class="eventCard"> 
    <img src="<?php echo get_the_post_thumbnail_url(); ?>"
            alt="" />
        <div class="eventCard_Headings"> 
            <h2> <?php echo get_the_title(); ?></h2>
        </div>
    </div>
</a>