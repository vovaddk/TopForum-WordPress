<?php
/*
Template Name: Media
*/

?>
<?php
get_header(); ?>


<main id="main-html">
  <div class="container">
    <?php $media_page = get_posts(
      array(
        'numberposts' => -1,
        'category_name' => 'media_page',
        'orderby' => 'date',
        'order' => 'ASC',
        'post_type' => 'post',
        'suppress_filters' => true,
      )
    );
    foreach ($media_page as $post) {
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

      <div id="sponsors-list-html" class="articles-html">
        <ul id="articles-list">
          <li>
            <div id="article-img">
              <img src="<?php the_field('image_1'); ?>" alt="general">
            </div>
            <h6 class="sponsor-name" id="article-name">
              <a href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                <?php the_field('media_name_1'); ?>
              </a>
            </h6>
            <p class="sponsor-about">
              <?php the_field('media_text_1'); ?>
            </p>
          </li>

          <li>
            <div id="article-img">
              <img src="<?php the_field('image_2'); ?>" alt="general">
            </div>
            <h6 class="sponsor-name" id="article-name">
              <a href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                <?php the_field('media_name_2'); ?>
              </a>
            </h6>
            <p class="sponsor-about">
              <?php the_field('media_text_2'); ?>
            </p>
          </li>

          <li>
            <div id="article-img">
              <img src="<?php the_field('image_3'); ?>" alt="general">
            </div>
            <h6 class="sponsor-name" id="article-name">
              <a href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                <?php the_field('media_name_3'); ?>
              </a>
            </h6>
            <p class="sponsor-about">
              <?php the_field('media_text_3'); ?>
            </p>
          </li>

          <li>
            <div id="article-img">
              <img src="<?php the_field('image_4'); ?>" alt="general">
            </div>
            <h6 class="sponsor-name" id="article-name">
              <a href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                <?php the_field('media_name_4'); ?>
              </a>
            </h6>
            <p class="sponsor-about">
              <?php the_field('media_text_4'); ?>
            </p>
          </li>

          <li>
            <div id="article-img">
              <img src="<?php the_field('image_5'); ?>" alt="general">
            </div>
            <h6 class="sponsor-name" id="article-name">
              <a href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                <?php the_field('media_name_5'); ?>
              </a>
            </h6>
            <p class="sponsor-about">
              <?php the_field('media_text_5'); ?>
            </p>
          </li>

          <li>
            <div id="article-img">
              <img src="<?php the_field('image_6'); ?>" alt="general">
            </div>
            <h6 class="sponsor-name" id="article-name">
              <a href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                <?php the_field('media_name_6'); ?>
              </a>
            </h6>
            <p class="sponsor-about">
              <?php the_field('media_text_6'); ?>
            </p>
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