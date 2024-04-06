<?php
/*
Template Name: Contacts
*/

?>

<?php
get_header(); ?>


<main id="contacts-html">
  <?php $contact_page = get_posts(
    array(
      'numberposts' => -1,
      'category_name' => 'contacts_page',
      'orderby' => 'date',
      'order' => 'ASC',
      'post_type' => 'post',
      'suppress_filters' => true,
    )
  );
  foreach ($contact_page as $post) {
    setup_postdata($post); ?>
    <section class="map-and-contacts">


      <div class="map-and-contacts-wrapper container">
        <div class="map-img">
          <img src="<?php the_field('image_1'); ?>" alt="map">
        </div>

        <div class="mibile-btns">
          <div class="btn-left">
            <img src="<?php the_field('yellow_left_arrow'); ?>" alt="yellow-arrow-left">
          </div>

          <div class="btn-right">
            <img src="<?php the_field('yellow_right_arrow'); ?>" alt="yellow-arrow-right">
          </div>
        </div>

        <ul class="contacts-list">
          <li>
            <h6 class="job-title">
              <?php the_field('job_title_1'); ?>
            </h6>
            <p class="employee-name">
              <?php the_field('employee_name_1'); ?>
            </p>
            <div class="mail">
              <span>E:</span>
              <a href="mailto:tony.bradley@allanlloyds.com">
                <?php the_field('email_1'); ?>
              </a>
            </div>
            <div class="phone">
              <span>P:</span>
              <a href="tel:+421221025322">
                <?php the_field('phone_1'); ?>
              </a>
            </div>
          </li>

          <li>
            <h6 class="job-title">
              <?php the_field('job_title_2'); ?>
            </h6>
            <p class="employee-name">
              <?php the_field('employee_name_2'); ?>
            </p>
            <div class="mail">
              <span>E:</span>
              <a href="mailto:bus.dev@allanlloyds.com">
                b
                <?php the_field('email_2'); ?>
              </a>
            </div>
            <div class="phone">
              <span>P:</span>
              <a href="tel:++421221025324">
                <?php the_field('phone_2'); ?>
              </a>
            </div>
          </li>

          <li>
            <h6 class="job-title">
              <?php the_field('job_title_3'); ?>
            </h6>
            <p class="employee-name">
              <?php the_field('employee_name_3'); ?>
            </p>
            <div class="mail">
              <span>E:</span>
              <a href="mailto:michael.sheridan@allanlloyds.com">
                <?php the_field('email_3'); ?>
              </a>
            </div>
            <div class="phone">
              <span>P:</span>
              <a href="tel:+421221025322">
                <?php the_field('phone_3'); ?>
              </a>
            </div>
          </li>

          <li>
            <h6 class="job-title">
              <?php the_field('job_title_4'); ?>
            </h6>
            <p class="employee-name">
              <?php the_field('employee_name_4'); ?>
            </p>
            <div class="mail">
              <span>E:</span>
              <a href="mailto:amy.taylor@allanlloyds.com">
                <?php the_field('email_4'); ?>
              </a>
            </div>
            <div class="phone">
              <span>P:</span>
              <a href="tel:+421221025322">
                <?php the_field('phone_4'); ?>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </section>

    <section class="feedback">
      <div class="feedback-wrapper container">
        <h2 class="title">
          <?php the_field('feedback_title'); ?>
        </h2>
        <div class="form-and-info">
          <form action="" method="post">
            <label for="appeal">
              <?php the_field('feedback_label'); ?>
            </label> <br>
            <textarea required name="" id="appeal"></textarea>

            <label for="feedback-mail">
              <?php the_field('feedback_mail'); ?>
            </label> <br>
            <input id="feedback-mail" required type="email" placeholder="E-mail">

            <input id="feedback-name" required type="text" placeholder="Your name">

            <input id="feedback-send" type="submit" value="Send">
          </form>

          <div class="info">
            <label for="feedback-phone">
              <?php the_field('feedback_info_text'); ?>
            </label> <br>
            <a class="feedback-phone" href="tel:+421221025322">
              <?php the_field('feedback_phone'); ?>
            </a>
            <p class="text-faq">
              <?php the_field('feedback_faq'); ?>
              <a class="faq" href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                <?php the_field('feedback_faq_link'); ?>
              </a>
            </p>
            <span>
              <?php the_field('feedback_span'); ?>
            </span>
          </div>
        </div>
      </div>

    </section>
  <?php }
  wp_reset_postdata(); ?>

</main>

<?php
get_footer();
?>