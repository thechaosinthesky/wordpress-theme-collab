<?php get_header(); ?>

<body style="position:relative;" data-spy="scroll" data-target="#banner-nav">

<?php
  $args = array(
    'post_type' => 'attachment',
    'title' => 'splash',
    'post_status' => 'inherit',
    'posts_per_page' => 1,
    'orderby' => 'title',
    'order' => 'DESC',
  );
  $imgquery = new WP_Query( $args );
  $total = $imgquery->found_posts;
  if($total > 0) :
    $splash = $imgquery->posts[0];
    $splash_id = $splash->ID;
    $splash_url = wp_get_attachment_url( $splash_id );
?>
  <style>
    #main-content {
      background-image: url("<?php echo $splash_url; ?>");
    }
  </style>
<?php endif; ?>

<?php
  $args = array(
    'post_type' => 'attachment',
    'title' => 'main-logo',
    'post_status' => 'inherit',
    'posts_per_page' => 1,
    'orderby' => 'title',
    'order' => 'DESC',
  );
  $imgquery = new WP_Query( $args );
  $total = $imgquery->found_posts;
  if($total > 0) :
    $logo = $imgquery->posts[0];
    $logo_id = $logo->ID;
    $logo_url = wp_get_attachment_url( $logo_id );
?>
  <style>
    #banner .banner-main {
      height: 147px;
      height: 168px;
      width: 768px;
      margin: auto;
      background-position: center top;
      background-image: url("<?php echo $logo_url; ?>");
      box-shadow: 12px 0 15px -4px rgba(31, 73, 125, 0.8), -12px 0 8px -4px rgba(31, 73, 125, 0.8);
    }
  </style>
<?php endif; ?>

  <div id="main">
    <div id="banner">
      <div class="banner-bar">
        <span class="phone badge text-info"><i class="fas fa-phone-alt"></i> <?php echo get_option( 'phone_field' ); ?></span>
      </div>
      <div class="banner-main">
      </div>

      <div class="banner-sub">

        <?php get_template_part('navigation'); ?>
      </div>

    </div>

    <div id="main-content">
      <div id="main-overlay">
      </div>

      <div class="container">
        <div class="row-no-gutters">
          <div class="col-12">

            <a name="about"></a>

            <a name="seminar"></a>

            <?php
              $loop = new WP_Query(
                  array(
                      'post_type' => 'homecard',
                      'posts_per_page' => 100,
                      'orderby' => 'title',
                      'order' => 'DESC',
                  )
              );
              while ( $loop->have_posts() ) : $loop->the_post();
            ?>

              <div class="row cbd-card-row">
                <div class="col-xs-12 col-sm-12 col-md-8 offset-md-2">
                  <div class="card cbd-card">
                    <div class="card-header bg-info">
                      <h3><?php the_title(); ?></h3>
                    </div>
                    <div class="card-body">
                      <?php the_content(); ?>
                    </div>
                  </div>
                </div>
              </div>

            <?php endwhile;
              wp_reset_postdata();
            ?>

            <a name="members"></a>

            <?php get_template_part('members'); ?>

          </div>
        </div>
      </div>

    </div>

  </div>

<?php get_footer(); ?>
