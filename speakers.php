<?php
/*
Template Name: Speakers
*/

?>
<?php
get_header(); ?>


<main id="main-html">
  <div class="container">
    <?php $speakers_page = get_posts(
      array(
        'numberposts' => -1,
        'category_name' => 'speakers_page',
        'orderby' => 'date',
        'order' => 'ASC',
        'post_type' => 'post',
        'suppress_filters' => true,
      )
    );
    foreach ($speakers_page as $post) {
      setup_postdata($post); ?>
      <div id="about-html">
        <h2 class="title" id="title-html">
          <?php the_field('title'); ?>
        </h2>

        <div id="about-text-html">
          <p>
            <?php the_field('about_text'); ?>
          </p>
        </div>
      </div>

      <div id="select-conference-html">
        <h4 id="select-title-html">
          <?php the_field('text_h4'); ?>
        </h4>

        <div id="select-block-html">
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

      <div id="sponsors-list-html">
        <ul>
          <li>
            <div id="speaker-img">
              <img src=" <?php the_field('image_1'); ?>" alt="general">
            </div>
            <h6 class="sponsor-name">
              <?php the_field('speakers_name_1'); ?>
            </h6>
            <p class="sponsor-about">
              <?php the_field('speakers_text_1'); ?>
            </p>
            <div class="btn">
              <div class="btn">
                <a id="btn" href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                  <?php the_field('button_text'); ?>
                </a>
              </div>
          </li>

          <li>
            <div id="speaker-img">
              <img src=" <?php the_field('image_2'); ?>" alt="general">
            </div>
            <h6 class="sponsor-name">
              <?php the_field('speakers_name_2'); ?>
            </h6>
            <p class="sponsor-about">
              <?php the_field('speakers_text_2'); ?>
            </p>
            <div class="btn">
              <div class="btn">
                <a id="btn" href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                  <?php the_field('button_text'); ?>
                </a>
              </div>
          </li>

          <li>
            <div id="speaker-img">
              <img src=" <?php the_field('image_3'); ?>" alt="general">
            </div>
            <h6 class="sponsor-name">
              <?php the_field('speakers_name_3'); ?>
            </h6>
            <p class="sponsor-about">
              <?php the_field('speakers_text_3'); ?>
            </p>
            <div class="btn">
              <div class="btn">
                <a id="btn" href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                  <?php the_field('button_text'); ?>
                </a>
              </div>
          </li>

          <li>
            <div id="speaker-img">
              <img src=" <?php the_field('image_4'); ?>" alt="general">
            </div>
            <h6 class="sponsor-name">
              <?php the_field('speakers_name_4'); ?>
            </h6>
            <p class="sponsor-about">
              <?php the_field('speakers_text_4'); ?>
            </p>
            <div class="btn">
              <div class="btn">
                <a id="btn" href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                  <?php the_field('button_text'); ?>
                </a>
              </div>
          </li>

          <li>
            <div id="speaker-img">
              <img src=" <?php the_field('image_5'); ?>" alt="general">
            </div>
            <h6 class="sponsor-name">
              <?php the_field('speakers_name_5'); ?>
            </h6>
            <p class="sponsor-about">
              <?php the_field('speakers_text_5'); ?>
            </p>
            <div class="btn">
              <div class="btn">
                <a id="btn" href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                  <?php the_field('button_text'); ?>
                </a>
              </div>
          </li>

          <li>
            <div id="speaker-img">
              <img src=" <?php the_field('image_6'); ?>" alt="general">
            </div>
            <h6 class="sponsor-name">
              <?php the_field('speakers_name_6'); ?>
            </h6>
            <p class="sponsor-about">
              <?php the_field('speakers_text_6'); ?>
            </p>
            <div class="btn">
              <div class="btn">
                <a id="btn" href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                  <?php the_field('button_text'); ?>
                </a>
              </div>
          </li>

          <li>
            <div id="speaker-img">
              <img src=" <?php the_field('image_7'); ?>" alt="general">
            </div>
            <h6 class="sponsor-name">
              <?php the_field('speakers_name_7'); ?>
            </h6>
            <p class="sponsor-about">
              <?php the_field('speakers_text_7'); ?>
            </p>
            <div class="btn">
              <div class="btn">
                <a id="btn" href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                  <?php the_field('button_text'); ?>
                </a>
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