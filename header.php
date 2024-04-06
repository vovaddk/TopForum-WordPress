<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php the_title(); ?>
  </title>

  <?php

  wp_head();
  ?>
</head>

<body>
  <header>

    <?php $navbar_posts = get_posts(array('numberposts' => 1, 'category_name' => 'topforum_header', 'orderby' => 'date', 'order' => 'ASC', 'post_type' => 'post', 'suppress_filters' => true, ));
    foreach ($navbar_posts as $post) {
      setup_postdata($post); ?>
    <div class="nav-mobile-wrapper">
      <div class="opacity-effect-mobile"></div>
      <div class="logo-mobile">
        <a href="#"><img src="<?php the_field('logo_image'); ?>" alt="logo"></a>

      </div>
      <nav class="nav-menu container">
        <ul>
          <li>
            <a href="<?php echo get_page_link(get_page_by_path('sponsors')->ID); ?>">
              <?php the_field('navbar_title_1'); ?>
            </a>
          </li>

          <li>
            <a href="<?php echo get_page_link(get_page_by_path('exhibitors')->ID); ?>">
              <?php the_field('navbar_title_2'); ?>
            </a>
          </li>

          <li>
            <a href="<?php echo get_page_link(get_page_by_path('speakers')->ID); ?>">
              <?php the_field('navbar_title_3'); ?>
            </a>
          </li>

          <li>
            <a href="<?php echo get_page_link(get_page_by_path('media')->ID); ?>">
              <?php the_field('navbar_title_4'); ?>
            </a>
          </li>
        </ul>

        <div class="btn">
          <button>
            <a id="btn" href="<?php echo get_page_link(get_page_by_path('Registration')->ID); ?>">
              <?php the_field('topforum_header_button'); ?>
            </a>
          </button>
        </div>
      </nav>
    </div>

    <div class="nav-wrapper">
      <nav class="nav-menu container">
        <ul class="menu">
          <li class="item-list">
            <a href="<?php echo get_page_link(get_page_by_path('sponsors')->ID); ?>" class="manu-link">
              <?php the_field('navbar_title_1'); ?>
            </a>
            <ul id="sub-menu">
              <li id="sub-menu-list">
                <a id="sub-menu-link" href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                  <?php the_field('navbar_subtitle_1'); ?>
                </a>
              </li>

              <li id="sub-menu-list">
                <a id="sub-menu-link" href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                  <?php the_field('navbar_subtitle_2'); ?>
                </a>
              </li>

              <li id="sub-menu-list">
                <a id="sub-menu-link" href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                  <?php the_field('navbar_subtitle_3'); ?>
                </a>
              </li>

              <li id="sub-menu-list">
                <a id="sub-menu-link" href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                  <?php the_field('navbar_subtitle_4'); ?>
                </a>
              </li>

              <li id="sub-menu-list">
                <a id="sub-menu-link" href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                  <?php the_field('navbar_subtitle_5'); ?>
                </a>
              </li>
            </ul>
          </li>

          <li class="item-list">
            <a href="<?php echo get_page_link(get_page_by_path('exhibitors')->ID); ?>" class="manu-link">
              <?php the_field('navbar_title_2'); ?>
            </a>
            <ul id="sub-menu">
              <li id="sub-menu-list">
                <a id="sub-menu-link" href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                  <?php the_field('navbar_subtitle_6'); ?>
                </a>
              </li>

              <li id="sub-menu-list">
                <a id="sub-menu-link" href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                  <?php the_field('navbar_subtitle_7'); ?>
                </a>
              </li>

              <li id="sub-menu-list">
                <a id="sub-menu-link" href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                  <?php the_field('navbar_subtitle_8'); ?>
                </a>
              </li>
            </ul>
          </li>

          <li class="item-list">
            <a href="<?php echo get_page_link(get_page_by_path('speakers')->ID); ?>" class="manu-link">
              <?php the_field('navbar_title_3'); ?>
            </a>
            <ul id="sub-menu">
              <li id="sub-menu-list">
                <a id="sub-menu-link" href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                  <?php the_field('navbar_subtitle_6'); ?>
                </a>
              </li>

              <li id="sub-menu-list">
                <a id="sub-menu-link" href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                  <?php the_field('navbar_subtitle_7'); ?>
                </a>
              </li>

              <li id="sub-menu-list">
                <a id="sub-menu-link" href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                  <?php the_field('navbar_subtitle_8'); ?>
                </a>
              </li>
            </ul>
          </li>

          <li class="item-list">
            <a href="<?php echo get_page_link(get_page_by_path('media')->ID); ?>" class="manu-link">
              <?php the_field('navbar_title_4'); ?>
            </a>
          </li>
        </ul>

        <div class="btn">
          <a class="manu-linkid=" btn" href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
            <?php the_field('topforum_header_button'); ?>
          </a>
        </div>

      </nav>
    </div>

    <div class="under-nav-bar">
      <div class="under-nav-bar-wrapper container">
        <div class="logo-elements">
          <div class="logo">
            <?php
              $page = get_page_by_title('Sample Page');
              if ($page) {
                echo '<a href="' . get_permalink($page->ID) . '" class="manu-link">';
                echo '<img src="' . get_field('logo_image') . '" alt="logo">';
                echo '</a>';
              }
              ?>

          </div>
          <div class="bars-solod-mobile">
            <img src="<?php the_field('topforum_bars_solod_mobile'); ?>" alt="bars-solid">
          </div>
          <ul>
            <li>
              <span>

                <div class="img">
                  <img src="<?php the_field('topforum_image_1'); ?>" alt="cubok">
                </div>
                </a>
              </span>

              <p>
                <a href="<?php echo get_page_link(get_page_by_path('Upcoming Events')->ID); ?>" class="manu-link">
                  <?php the_field('topforum_header_text_1'); ?>
                </a>
              </p>

            </li>

            <li>
              <span>
                <div class="img">
                  <img src="<?php the_field('topforum_image_2'); ?>" alt="flag">
                </div>
                </a>
              </span>

              <p>
                <a href="<?php echo get_page_link(get_page_by_path('contact')->ID); ?>" class="manu-link">
                  <?php the_field('topforum_header_text_2'); ?>
                </a>
              </p>
            </li>
          </ul>
        </div>
        <div class="btn">
          <a id="btn" href="<?php echo get_page_link(get_page_by_path('Registration')->ID); ?>">
            <?php the_field('topforum_register_now_button'); ?>
          </a>
        </div>
      </div>
    </div>

    <?php }
    wp_reset_postdata(); ?>

  </header>