<div class="row">
  <div class="col-12">
    <div id="members" class="card cbd-card">
      <div class="card-header bg-info">
        <h4>Collaboratively Trained Divorce Professionals</h4>
      </div>
      <div class="card-footer">
        <div class="row">

          <?php
            $loop = new WP_Query(
                array(
                    'post_type' => 'member',
                    'posts_per_page' => 100,
                    'orderby' => 'ID',
                    'order' => 'ASC'
                )
            );
            while ( $loop->have_posts() ) : $loop->the_post();
          ?>
          <div class="col-lg-3 col-md-4 col-xs-6 col-sm-6">
            <div class="card mb-3" style="min-width:200px;">
              <div class="card-header" style="padding:0;">
                <a target="_blank" href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail( 'square-small', array('class' => 'card-img-top member-image') ); ?>
                </a>
              </div>

              <div class="card-footer text-center">
                <h5 class="card-title text-center">
                  <a target="_blank" href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                  </a>
                </h5>
                <?php the_excerpt(); ?>
              </div>
            </div>
          </div>
          <?php endwhile;
            wp_reset_postdata();
          ?>

        </div>
      </div>
    </div>
  </div>
</div>
