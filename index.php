<?php
get_header(); ?>


<main>
  <section class="about">
    <?php $topforum_about = get_posts(
      array(
        'numberposts' => 1,
        'category_name' => 'topforum_about',
        'orderby' => 'date',
        'order' => 'ASC',
        'post_type' => 'post',
        'suppress_filters' => true,
      )
    );
    foreach ($topforum_about as $post) {
      setup_postdata($post); ?>

      <div class="slider-area" style="background: url(<?php the_field('slider_area_bg'); ?>)">
        <div class=" slider-area-wrapper container">

          <div class="slider-block" auto-scroll="3000">
            <div class="arrow-left">
              <img src="<?php the_field('left_arrow'); ?>" alt=" arrow-left">
            </div>
            <div class="slider-schedule">
              <ul id="slider" class="DudeInfiniteSlider">
                <li class="slider-item">
                  <div class="data">
                    <p class="day">
                      <?php the_field('slider_item_data_day'); ?>
                    </p>
                    <p class="month">
                      <?php the_field('slider_item_data_month'); ?>
                    </p>
                    <p class="year">
                      <?php the_field('slider_item_data_year'); ?>
                    </p>
                  </div>

                  <div class="data-about">
                    <h5 class="title">
                      <?php the_field('data_about_title'); ?>
                    </h5>
                    <p class="about">
                      <?php the_field('data_about_text'); ?>
                    </p>
                    <span class="location">
                      <?php the_field('data_about_location'); ?>
                    </span>
                  </div>
                </li>

                <li class="slider-item">
                  <div class="data">
                    <p class="day">
                      <?php the_field('slider_item_data_day'); ?>
                    </p>
                    <p class="month">
                      <?php the_field('slider_item_data_month'); ?>
                    </p>
                    <p class="year">
                      <?php the_field('slider_item_data_year'); ?>
                    </p>
                  </div>

                  <div class="data-about">
                    <h5 class="title">
                      <?php the_field('data_about_title'); ?>
                    </h5>
                    <p class="about">
                      <?php the_field('data_about_text'); ?>
                    </p>
                    <span class="location">
                      <?php the_field('data_about_location'); ?>
                    </span>
                  </div>
                </li>

                <li class="slider-item">
                  <div class="data">
                    <p class="day">
                      <?php the_field('slider_item_data_day'); ?>
                    </p>
                    <p class="month">
                      <?php the_field('slider_item_data_month'); ?>
                    </p>
                    <p class="year">
                      <?php the_field('slider_item_data_year'); ?>
                    </p>
                  </div>

                  <div class="data-about">
                    <h5 class="title">
                      <?php the_field('data_about_title'); ?>
                    </h5>
                    <p class="about">
                      <?php the_field('data_about_text'); ?>
                    </p>
                    <span class="location">
                      <?php the_field('data_about_location'); ?>
                    </span>
                  </div>
                </li>

                <li class="slider-item">
                  <div class="data">
                    <p class="day">
                      <?php the_field('slider_item_data_day'); ?>
                    </p>
                    <p class="month">
                      <?php the_field('slider_item_data_month'); ?>
                    </p>
                    <p class="year">
                      <?php the_field('slider_item_data_year'); ?>
                    </p>
                  </div>

                  <div class="data-about">
                    <h5 class="title">
                      <?php the_field('data_about_title'); ?>
                    </h5>
                    <p class="about">
                      <?php the_field('data_about_text'); ?>
                    </p>
                    <span class="location">
                      <?php the_field('data_about_location'); ?>
                    </span>
                  </div>
                </li>

              </ul>
            </div>
            <div class="arrow-right">
              <img src="<?php the_field('right_arrow'); ?>" alt=" arrow-right">
            </div>
          </div>
        </div>
      </div>
      <div class="about-forum-text">
        <div class="about-forum-text-wrapper container">
          <p>
            <?php the_field('about_forum_text'); ?>
          </p>
        </div>
      </div>
      <div class="benefits">
        <div class="benefits-wrapper container">
          <ul>
            <li>
              <div class="image">
                <img src="<?php the_field('benefits_image_1'); ?>" alt=" img">
              </div>
              <div class="title">
                <h4>
                  <?php the_field('benefits_title_1'); ?>
                </h4>
              </div>
              <div class="text">
                <p>
                  <?php the_field('benefits_text_1'); ?>
                </p>
              </div>
              <div class="btn">
                <a id="btn" href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                  <?php the_field('benefits_buttons_text'); ?>
                </a>
              </div>
              <span>
                <?php the_field('benefist_span_text'); ?>
              </span>
            </li>

            <li>
              <div class=" image">
                <img src="<?php the_field('benefits_image_2'); ?>" alt=" img">
              </div>
              <div class="title">
                <h4>
                  <?php the_field('benefits_title_2'); ?>
                </h4>
              </div>
              <div class="text">
                <p>
                  <?php the_field('benefits_text_2'); ?>
                </p>
              </div>
              <div class="btn">
                <a id="btn" href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                  <?php the_field('benefits_buttons_text'); ?>
                </a>
              </div>
              <span>
                <?php the_field('benefist_span_text'); ?>
              </span>
            </li>

            <li>
              <div class=" image">
                <img src="<?php the_field('benefits_image_3'); ?>" alt=" img">
              </div>
              <div class="title">
                <h4>
                  <?php the_field('benefits_title_3'); ?>
                </h4>
              </div>
              <div class="text">
                <p>
                  <?php the_field('benefits_text_3'); ?>
                </p>
              </div>
              <div class="btn">
                <a id="btn" href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                  <?php the_field('benefits_buttons_text'); ?>
                </a>
              </div>
              <span>
                <?php the_field('benefist_span_text'); ?>
              </span>
            </li>
          </ul>

          <div class=" btns">
            <div class="register">
              <a id="btn" href="<?php echo get_page_link(get_page_by_path('Registration')->ID); ?>">
                <?php the_field('benefits_register_button'); ?>
              </a>
            </div>
            <div class=" subscribe">
              <a id="btn" href="#modal-sub">
                <?php the_field('benefits_subscribe_button'); ?>
              </a>
            </div>
          </div>


          <div class="modal-dark-style"></div>
          <div class="modal-subscibe" id="modal-sub">
            <div class="modal-close">
              <img class="close" src="<?php the_field('modal_close_image'); ?>" alt="">
            </div>
            <h4>
              <?php the_field('modal_subscribe'); ?>
            </h4>
            <p>
              <?php the_field('modal_text'); ?>
            </p>

            <form method=" post">
              <input type="text" placeholder="Name and surname" required>
              <input type="text" placeholder="Company name" required>
              <input type="email" placeholder="E-mail" required>

              <input class="btn" type="submit" value="Subscibe">
            </form>
          </div>
        </div>
      </div>
    <?php }
    wp_reset_postdata(); ?>

  </section>

  <section class="customer-reviews" auto-scroll-btns="3000">

    <?php $topforum_about = get_posts(
      array(
        'numberposts' => -3,
        'category_name' => 'topforum_custom_reviews',
        'orderby' => 'date',
        'order' => 'ASC',
        'post_type' => 'post',
        'suppress_filters' => true,
      )
    );
    foreach ($topforum_about as $post) {
      setup_postdata($post); ?>

      <div class="customer-reviews-wrapper container">
        <h2 class="title">
          <?php the_field('cutsomers_title'); ?>
        </h2>
        <div class="slider-review-wrapper">
          <ul id="slider-reviews">
            <li id="review">
              <div class="avatar">
                <img class="image" src="<?php the_field('customers_image_1'); ?>" alt="avatar">
              </div>
              <div class="comment">
                <div class="title">
                  <p class="name">
                    <?php the_field('customers_name_1'); ?>
                  </p>
                  <span class="data">
                    <p>
                      <?php the_field('customers_data_1'); ?>
                    </p>
                </div>

                <div class="text-comment">
                  <p>
                    <?php the_field('customers_text_1'); ?>
                  </p>
                </div>
              </div>
            </li>

            <li id="review">
              <div class="no-avatar">
                <img src="<?php the_field('customers_no_image'); ?>" alt=" avatar">
              </div>
              <div class="comment">
                <div class="title">
                  <p class="name">
                    <?php the_field('customers_name_2'); ?>
                  </p>
                  <span class="data">
                    <p>
                      <?php the_field('customers_data_2'); ?>
                    </p>
                  </span>
                </div>

                <div class="text-comment">
                  <p>
                    <?php the_field('customers_text_2'); ?>
                  </p>
                </div>
              </div>
            </li>

            <li id="review">
              <div class="no-avatar">
                <img src="<?php the_field('customers_no_image'); ?>" alt=" avatar">
              </div>
              <div class="comment">
                <div class="title">
                  <p class="name">
                    <?php the_field('customers_name_3'); ?>
                  </p>
                  <span class="data">
                    <p>
                      <?php the_field('customers_data_3'); ?>
                    </p>
                  </span>
                </div>

                <div class="text-comment">
                  <p>
                    <?php the_field('customers_text_3'); ?>
                  </p>
                </div>
              </div>
            </li>

            <li id="review">
              <div class="no-avatar">
                <img src="<?php the_field('customers_no_image'); ?>" alt=" avatar">
              </div>
              <div class="comment">
                <div class="title">
                  <p class="name">
                    <?php the_field('customers_name_4'); ?>
                  </p>
                  <span class="data">
                    <p>
                      <?php the_field('customers_data_4'); ?>
                    </p>
                  </span>
                </div>

                <div class="text-comment">
                  <p>
                    <?php the_field('customers_text_4'); ?>
                  </p>
                </div>
              </div>
            </li>
          </ul>
          <div class="yellow-arrows">
            <div class="yellow-arrow-left">
              <img src=" <?php the_field('yellow_left_arrow'); ?>" alt=" yellow-arrow-left">
            </div>

            <div class="yellow-arrow-right">
              <img src=" <?php the_field('yellow_right_arrow'); ?>" alt=" yellow-arrow-right">
            </div>
          </div>
        </div>
      </div>

    <?php }
    wp_reset_postdata(); ?>


  </section>


  <section class="promo-video">
    <?php $topforum_video = get_posts(
      array(
        'numberposts' => 1,
        'category_name' => 'topforum_video',
        'orderby' => 'date',
        'order' => 'ASC',
        'post_type' => 'post',
        'suppress_filters' => true,
      )
    );
    foreach ($topforum_video as $post) {
      setup_postdata($post); ?>

      <div class="promo-video-wrapper container">
        <h2 class="title">
          <?php the_field('title'); ?>
        </h2>

        <video controls src="<?php the_field('topforum_video'); ?>">
        </video>
      </div>
    <?php }
    wp_reset_postdata(); ?>


  </section>

  <section class="our-clients">
    <?php $topforum_clients = get_posts(
      array(
        'numberposts' => 1,
        'category_name' => 'topforum_clients',
        'orderby' => 'date',
        'order' => 'ASC',
        'post_type' => 'post',
        'suppress_filters' => true,
      )
    );
    foreach ($topforum_clients as $post) {
      setup_postdata($post); ?>

      <div class="our-clients-wrapper container">
        <h2 class="title">
          <?php the_field('clients_title'); ?>
        </h2>

        <div class="slider-clients-block">
          <ul id="slider-clients">
            <li class="item-client-logo">
              <img src="<?php the_field('clients_image_1'); ?>" alt="logo">
            </li>
            <li class="item-client-logo">
              <img src="<?php the_field('clients_image_2'); ?>" alt="logo">
            </li>
            <li class="item-client-logo">
              <img src="<?php the_field('clients_image_3'); ?>" alt="logo">
            </li>
            <li class="item-client-logo">
              <img src="<?php the_field('clients_image_4'); ?>" alt="logo">
            </li>
            <li class="item-client-logo">
              <img src="<?php the_field('clients_image_5'); ?>" alt="logo">
            </li>
            <li class="item-client-logo">
              <img src="<?php the_field('clients_image_6'); ?>" alt="logo">
            </li>
            <li class="item-client-logo">
              <img src="<?php the_field('clients_image_1'); ?>" alt="logo">
            </li>
            <li class="item-client-logo">

              <img src="<?php the_field('clients_image_2'); ?>" alt="logo">
            </li>
            <li class="item-client-logo">

              <img src="<?php the_field('clients_image_3'); ?>" alt="logo">
            </li>
            <li class="item-client-logo">

              <img src="<?php the_field('clients_image_4'); ?>" alt="logo">
            </li>
            <li class="item-client-logo">

              <img src="<?php the_field('clients_image_5'); ?>" alt="logo">
            </li>
            <li class="item-client-logo">

              <img src="<?php the_field('clients_image_6'); ?>" alt="logo">
            </li>
          </ul>

          <div class="yellow-arrows">
            <div class="yellow-arrow-left">
              <img src=" <?php the_field('yellow_left_arrow'); ?>" alt=" yellow-arrow-left">
            </div>

            <div class="yellow-arrow-right">
              <img src=" <?php the_field('yellow_right_arrow'); ?>" alt=" yellow-arrow-right">
            </div>
          </div>
        </div>
      </div>
    <?php }
    wp_reset_postdata(); ?>

  </section>
</main>

<?php
get_footer();
?>