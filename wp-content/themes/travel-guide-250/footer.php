</body>

<footer> 
        <img class="footerLogo" src="<?php echo get_template_directory_uri(); ?>/dist/images/site_logo.svg" alt="Site Logo" >
  <div class="iconDiv"> 
  <iconify-icon icon="ant-design:twitter-circle-filled" style="color: white;"></iconify-icon>
        <iconify-icon icon="typcn:social-instagram" style="color: white;"></iconify-icon>
        <iconify-icon icon="mdi:facebook" style="color: white;"></iconify-icon>
  </div>
  <div class="joinNewsletter">
    <p> Join Our Newsletter </p>
    <input type="text" value="Your Email">
    <button> <iconify-icon icon="material-symbols:arrow-right-alt-rounded" style="color: white;"></iconify-icon> </button>
  </div>
  <?php wp_nav_menu(['theme_location' => 'footer-menu']); ?>
</footer>
<script src="https://code.iconify.design/iconify-icon/1.0.5/iconify-icon.min.js"></script>
<?php wp_footer(); ?>
</html>