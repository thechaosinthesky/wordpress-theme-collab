    <div id="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-5 col-sm-8 col-xs-8">
            <h4 class="text-muted"><a>Our Mission</a></h4>
            <p>Our mission is to help divorcing families avoid unnecessary pain, expense and conflict through alternative processes that acknowledge that it is the parties themselves, with guidance from their advisors, who are best qualified to determine their future and the future of their children.</p>
          </div>
          <div class="col-md-5 col-sm-8 col-xs-8">
            <h4 class="text-muted"><a>Contact Us</a></h4>
            <p>Please call <?php echo get_option( 'phone_field' ); ?> to speak with one of our members.  Or, complete our contact form and one of our members will respond.</p>
          </div>
          <div class="col-md-2 col-sm-8 col-xs-8">
            <h4 class="text-muted"><a>Site Map</a></h4>
            <ul>
              <li><a href="<?php echo get_permalink( home_url() ) ?>">Home</a></li>
              <li><a href="<?php echo get_permalink( get_page_by_path( 'frequently-asked-questions' ) ) ?>">FAQ</a></li>
              <li><a href="<?php echo get_permalink( get_page_by_path( 'helpful-resources' ) ) ?>">Helpful Resources</a></li>
              <li><a href="<?php echo get_permalink( get_page_by_path( 'contact' ) ) ?>">Contact Us</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <?php wp_footer(); ?>

  </body>
</html>
