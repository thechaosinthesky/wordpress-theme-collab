<?php get_header(); ?>

<body>

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
        position: relative;
        height: 105px;
        width: 768px;
        margin: auto;
        background-position: center -24px;
        background-image: url("<?php echo $logo_url; ?>");
        box-shadow: 12px 0 15px -4px rgba(31, 73, 125, 0.8), -12px 0 8px -4px rgba(31, 73, 125, 0.8);
      }
    </style>
  <?php endif; ?>

  <div id="main">
    <div id="banner">
      <span class="phone badge text-info" style="float:right;"><i class="fas fa-phone-alt"></i> <?php echo get_option( 'phone_field' ); ?></span>
      <div class="banner-main">
      </div>


      <div class="banner-sub">
        <?php get_template_part('navigation'); ?>
      </div>
    </div>

    <div id="main-page-header">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h1>
              <?php the_title(); ?>
            </h1>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-12 page-body">

          <?php if (is_page('blog')) : ?>
            <?php
              $loop = new WP_Query(
                array(
                  'post_type' => 'post',
                  'posts_per_page' => 100
                )
              );
              while ( $loop->have_posts() ) : $loop->the_post();
            ?>

              <div class="row mb-3">
                <div class="col-4 text-right">
                  <a target="_blank" href="<?php the_permalink(); ?>">
                    <?php echo get_the_post_thumbnail( get_the_ID(), 'medium' ); ?>
                  </a>
                </div>
                <div class="col-8 pt-3 pb-3">
                  <h4><?php the_title(); ?></h4>
                  <p class="font-weight-light">
                    <?php the_date(); ?>
                  </p>

                  <?php the_excerpt(); ?>
                  <a target="_blank" href="<?php the_permalink(); ?>">
                    More
                  </a>
                </div>
              </div>

            <?php endwhile; ?>
          <?php else : ?>
            <?php if(has_post_thumbnail()) : ?>

              <div class="row">
                <div class="col-6">
                  <?php if(get_post_type() == "post") : ?>
                    <p class="font-weight-light">
                      <?php echo get_the_date() ?>
                    </p>
                  <?php endif; ?>

                  <?php the_content(); ?>
                </div>
                <div class="col-6 text-right">
                  <?php echo get_the_post_thumbnail( get_the_ID(), 'medium' ); ?>
                </div>
              </div>
            <?php else : ?>
              <?php the_content(); ?>
            <?php endif; ?>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </div>

<?php get_footer(); ?>
