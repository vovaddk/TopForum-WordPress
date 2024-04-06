<footer>
  <div class="footer-wrapper container">
    <?php $topforum_footer = get_posts(
      array(
        'numberposts' => -3,
        'category_name' => 'topforum_footer',
        'orderby' => 'date',
        'order' => 'ASC',
        'post_type' => 'post',
        'suppress_filters' => true,
      )
    );
    foreach ($topforum_footer as $post) {
      setup_postdata($post); ?>

    <div class="main-links">
      <div class="main-info">
        <ul class="top-forum">
          <a href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
            <h6 class="title">
              <?php the_field('footer_title'); ?>
            </h6>
          </a>
          <?php wp_nav_menu([
              'menu' => 'Main',
              'container' => 'div',
              'container_class' => '',
              'container_id' => '',
              'menu_class' => 'menu',
              'menu_id' => '',
              'echo' => true,
              'fallback_cb' => 'wp_page_menu',
              'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
              'depth' => 0,
            ]); ?>
        </ul>

        <ul class="contact">
          <?php
            $page = get_page_by_title('Contact');
            if ($page) {
              echo '<a href="' . get_permalink($page->ID) . '">';
            }
            ?>

          <h6 class="title">
            <?php the_field('contact_title'); ?>

          </h6>
          </a>
          <li class="location">
            <p class="name">
              <?php the_field('contact_data_name'); ?>
            </p>
            <address>
              <?php the_field('contact_data_address'); ?>
            </address>
          </li>

          <li class="contact-data">
            <div class="phone">
              <a href="tel:+421221025322">
                <?php the_field('contact_data_number'); ?>
              </a>
            </div>

            <div class="mail">
              <a href="mailto:info@topforum.com">
                <?php the_field('contact_data_email'); ?>
              </a>
            </div>
          </li>
        </ul>
      </div>
      <div class="follow-us">
        <?php
          $page = get_page_by_title('Sample Page');
          if ($page) {
            echo '<a href="' . get_permalink($page->ID) . '">';
          }
          ?>
        <h6 class="title">
          <?php the_field('follow_us'); ?>
        </h6>
        </a>
      </div>
    </div>

    <div class="all-rights">
      <div class="text">
        <p>
          <?php the_field('all_right'); ?>
        </p>
      </div>

      <div class="develop">
        <span>
          <?php the_field('website_development'); ?>
        </span>
        <div class="image">
          <img src="<?php the_field('footer_develop_image'); ?>" alt="develop">
        </div>
      </div>
    </div>
    <?php }
    wp_reset_postdata(); ?>

  </div>
  <?php wp_footer(); ?>
</footer>

</body>

</html>