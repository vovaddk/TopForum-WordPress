<?php
/*
Template Name: Upcoming Events
*/

?>

<?php
get_header(); ?>

<main id="events-html">
  <section class="our-events">
    <?php $events_page = get_posts(
      array(
        'numberposts' => -1,
        'category_name' => 'events_page',
        'orderby' => 'date',
        'order' => 'ASC',
        'post_type' => 'post',
        'suppress_filters' => true,
      )
    );
    foreach ($events_page as $post) {
      setup_postdata($post); ?>
    <div class="our-events-wrapper container">
      <h2 class="title">
        <?php the_field('title'); ?>
      </h2>

      <p class="title-about">
        <?php the_field('about_text'); ?>
      </p>

      <ul class="events-list">
        <li>
          <div class="img">
            <img src="<?php the_field('image_1'); ?>" alt="">
          </div>

          <div class="img-about">
            <h6 class="name">
              <a href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                <?php the_field('events_name_1'); ?>
              </a>
            </h6>

            <span class="data">
              <?php the_field('events_data_1'); ?>
            </span>

            <p class="text-about">
              <?php the_field('events_text_1'); ?>
            </p>

            <div class="btn">
              <a id="btn" href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                <?php the_field('button_text'); ?>
              </a>
            </div>
          </div>
        </li>

        <li>
          <div class="img">
            <img src="<?php the_field('image_2'); ?>" alt="">
          </div>

          <div class="img-about">
            <h6 class="name">
              <a href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                <?php the_field('events_name_2'); ?>
              </a>
            </h6>

            <span class="data">
              <?php the_field('events_data_2'); ?>
            </span>

            <p class="text-about">
              <?php the_field('events_text_2'); ?>
            </p>

            <div class="btn">
              <a id="btn" href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                <?php the_field('button_text'); ?>
              </a>
            </div>
          </div>
        </li>

        <li>
          <div class="img">
            <img src="<?php the_field('image_3'); ?>" alt="">
          </div>

          <div class="img-about">
            <h6 class="name">
              <a href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                <?php the_field('events_name_3'); ?>
              </a>
            </h6>

            <span class="data">
              <?php the_field('events_data_3'); ?>
            </span>

            <p class="text-about">
              <?php the_field('events_text_4'); ?>
            </p>

            <div class="btn">
              <a id="btn" href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                <?php the_field('button_text'); ?>
              </a>
            </div>
          </div>
        </li>

        <li>
          <div class="img">
            <img src="<?php the_field('image_4'); ?>" alt="">
          </div>

          <div class="img-about">
            <h6 class="name">
              < href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                <?php the_field('events_name_4'); ?>
                </a>
            </h6>

            <span class="data">
              <?php the_field('events_data_4'); ?>
            </span>

            <p class="text-about">
              <?php the_field('events_text_4'); ?>
            </p>

            <div class="btn">
              <a id="btn" href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                <?php the_field('button_text'); ?>
              </a>
            </div>
          </div>
        </li>

        <li>
          <div class="img">
            <img src="<?php the_field('image_5'); ?>" alt="">
          </div>

          <div class="img-about">
            <h6 class="name">
              <a href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                <?php the_field('events_name_5'); ?>
              </a>
            </h6>

            <span class="data">
              <?php the_field('events_data_5'); ?>
            </span>

            <p class="text-about">
              <?php the_field('events_text_5'); ?>
            </p>

            <div class="btn">
              <a id="btn" href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                <?php the_field('button_text'); ?>
              </a>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <?php }
    wp_reset_postdata(); ?>

  </section>
</main>

<?php
get_footer();
?>