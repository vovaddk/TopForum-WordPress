<?php
/*
Template Name: Exhibitors
*/

?>
<?php
get_header(); ?>

<main id="main-html">
  <div class="container">
    <?php $exhibitors_page = get_posts(
      array(
        'numberposts' => -1,
        'category_name' => 'exhibitors_page',
        'orderby' => 'date',
        'order' => 'ASC',
        'post_type' => 'post',
        'suppress_filters' => true,
      )
    );
    foreach ($exhibitors_page as $post) {
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
          <div class="sponsor-logo-img">
            <img src="<?php the_field('image_1'); ?>" alt="general">
          </div>
          <h6 class="sponsor-name">
            <?php the_field('exhibitors_name_1'); ?>
          </h6>
          <p class="sponsor-about">
            <?php the_field('exhibitors_text_1'); ?>
          </p>
          <div class="btn">
            <div class="btn">
              <a id="btn" href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                <?php the_field('button_text'); ?>
              </a>
            </div>
        </li>

        <li>
          <div class="sponsor-logo-img">
            <img src="<?php the_field('image_2'); ?>" alt="platinum">
          </div>
          <h6 class="sponsor-name">
            <?php the_field('exhibitors_name_2'); ?>
          </h6>
          <p class="sponsor-about">
            <?php the_field('exhibitors_text_2'); ?>
          </p>
          <div class="btn">
            <div class="btn">
              <a id="btn" href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                <?php the_field('button_text'); ?>
              </a>
            </div>
        </li>

        <li>
          <div class="sponsor-logo-img">
            <img src="<?php the_field('image_3'); ?>" alt="high-tech">
          </div>
          <h6 class="sponsor-name">
            <?php the_field('exhibitors_name_3'); ?>
          </h6>
          <p class="sponsor-about">
            <?php the_field('exhibitors_text_3'); ?>
          </p>
          <div class="btn">
            <div class="btn">
              <a id="btn" href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                <?php the_field('button_text'); ?>
              </a>
            </div>
        </li>

        <li>
          <div class="sponsor-logo-img">
            <img src="<?php the_field('image_4'); ?>" alt="silver-night">
          </div>
          <h6 class="sponsor-name">
            <?php the_field('exhibitors_name_4'); ?>
          </h6>
          <p class="sponsor-about">
            <?php the_field('exhibitors_text_4'); ?>
          </p>
          <div class="btn">
            <div class="btn">
              <a id="btn" href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                <?php the_field('button_text'); ?>
              </a>
            </div>
        </li>

        <li>
          <div class="sponsor-logo-img">
            <img src="<?php the_field('image_5'); ?>" alt="gold">
          </div>
          <h6 class="sponsor-name">
            <?php the_field('exhibitors_name_5'); ?>
          </h6>
          <p class="sponsor-about">
            <?php the_field('exhibitors_text_5'); ?>
          </p>
          <div class="btn">
            <div class="btn">
              <a id="btn" href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                <?php the_field('button_text'); ?>
              </a>
            </div>
        </li>

        <li>
          <div class="sponsor-logo-img">
            <img src="<?php the_field('image_6'); ?>" alt="converse">
          </div>
          <h6 class="sponsor-name">
            <?php the_field('exhibitors_name_6'); ?>
          </h6>
          <p class="sponsor-about">
            <?php the_field('exhibitors_text_6'); ?>
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