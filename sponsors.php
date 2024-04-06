<?php
/*
Template Name: Sponsors
*/

?>
<?php
get_header(); ?>


<main class="sponsors-html" id="main-html">
  <div class="container">
    <?php $sponsor_page = get_posts(
      array(
        'numberposts' => -1,
        'category_name' => 'sponsors_page',
        'orderby' => 'date',
        'order' => 'ASC',
        'post_type' => 'post',
        'suppress_filters' => true,
      )
    );
    foreach ($sponsor_page as $post) {
      setup_postdata($post); ?>
      <div class="about-our-sponsors" id="about-html">
        <h2 class="title" id="title-html">
          <?php the_field('title'); ?>
        </h2>

        <div class="about-text" id="about-text-html">
          <p>
            <?php the_field('about_text'); ?>
          </p>
        </div>
      </div>

      <div class="select-conference" id="select-conference-html">
        <h4 class="title" id="select-title-html">
          <?php the_field('text_h4'); ?>
        </h4>

        <div class="select-block" id="select-block-html">
          <select name="conferences" id="select-conference">
            <option value="Wealth TOP FORUM Israel 2016">
              <?php the_field('select_1'); ?>
            </option>
            <option value="Wealth TOP FORUM India 2017">
              <?php the_field('select_2'); ?>
            </option>
          </select>
        </div>

      </div>

      <div class="sponsors-list" id="sponsors-list-html">
        <ul id="justify-center">
          <li>
            <h3 class="sponsor-belonging">
              <?php the_field('sponsor_belonging_1'); ?>
            </h3>
            <div class="sponsor-logo-img">
              <img src="<?php the_field('image_1'); ?>" alt="general">
            </div>
            <h6 class="sponsor-name">
              <?php the_field('sponsor_name_1'); ?>
            </h6>
            <p class="sponsor-about">
              <?php the_field('sponsor_text_1'); ?>
            </p>
            <div class="btn">
              <div class="btn">
                <a id="btn" href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                  <?php the_field('button_text'); ?>
                </a>
              </div>

            </div>
          </li>

          <li>
            <h3 class="sponsor-belonging">
              <?php the_field('sponsor_belonging_2'); ?>
            </h3>
            <div class="sponsor-logo-img">
              <img src="<?php the_field('image_2'); ?>" alt="platinum">
            </div>
            <h6 class="sponsor-name">
              <?php the_field('sponsor_name_2'); ?>
            </h6>
            <p class="sponsor-about">
              <?php the_field('sponsor_text_2'); ?>
            </p>
            <div class="btn">
              <div class="btn">
                <a id="btn" href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                  <?php the_field('button_text'); ?>
                </a>
              </div>

            </div>
          </li>

          <li>
            <h3 class="sponsor-belonging">
              <?php the_field('sponsor_belonging_3'); ?>
            </h3>
            <div class="sponsor-logo-img">
              <img src="<?php the_field('image_3'); ?>" alt="high-tech">
            </div>
            <h6 class="sponsor-name">
              <?php the_field('sponsor_name_3'); ?>
            </h6>
            <p class="sponsor-about">
              <?php the_field('sponsor_text_3'); ?>
            </p>
            <div class="btn">
              <div class="btn">
                <a id="btn" href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                  <?php the_field('button_text'); ?>
                </a>
              </div>

            </div>
          </li>

          <li>
            <h3 class="sponsor-belonging">
              <?php the_field('sponsor_belonging_4'); ?>
            </h3>
            <div class="sponsor-logo-img">
              <img src="<?php the_field('image_4'); ?>" alt="gold">
            </div>
            <h6 class="sponsor-name">
              <?php the_field('sponsor_name_4'); ?>
            </h6>
            <p class="sponsor-about">
              <?php the_field('sponsor_text_4'); ?>
            </p>
            <div class="btn">
              <div class="btn">
                <a id="btn" href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                  <?php the_field('button_text'); ?>
                </a>
              </div>

            </div>
          </li>

          <li>
            <h3 class="sponsor-belonging">
              <?php the_field('sponsor_belonging_5'); ?>
            </h3>
            <div class="sponsor-logo-img">
              <img src="<?php the_field('image_5'); ?>" alt="silver-night">
            </div>
            <h6 class="sponsor-name">
              <?php the_field('sponsor_name_5'); ?>
            </h6>
            <p class="sponsor-about">
              <?php the_field('sponsor_text_5'); ?>
            </p>
            <div class="btn">
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

  </div>

</main>

<?php
get_footer();
?>