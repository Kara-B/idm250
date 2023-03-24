<?php
$title = get_the_archive_title();
// get the archive description
$description = get_the_archive_description();
?>
<div class="" data-component="archive-hero">
  <div class="">
    <h2 class="">
      <?php echo  $title ; ?>
    </h2>

    <?php if ($description) { ?>
    <p class="">
      <?php echo $description; ?>
    </p>
    <?php } ?>
  </div>
</div>