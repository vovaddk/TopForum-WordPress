<?php
/*
Template Name: Registration
*/

?>
<?php
get_header(); ?>


<main id="registration-html">

  <?php $registration_page = get_posts(
    array(
      'numberposts' => -1,
      'category_name' => 'registration_page',
      'orderby' => 'date',
      'order' => 'ASC',
      'post_type' => 'post',
      'suppress_filters' => true,
    )
  );
  foreach ($registration_page as $post) {

    setup_postdata($post); ?>
    <section class="register">
      <div class="register-wrapper container">
        <h2 class="title">
          <?php the_field('reg_title'); ?>
        </h2>

        <div class="steps">
          <p>
            <?php the_field('steps_text_1'); ?>

          </p>
          <p>
            <?php the_field('steps_text_2'); ?>
          </p>
        </div>

        <div class="form-area">
          <form method="post">
            <ul>
              <li>
                <label for="conference">
                  <p>
                    <?php the_field('conference_title') ?>
                  </p>
                </label>
                <span class="conferences-select-arrow"></span>
                <select name="conferences" id="select-conference">
                  <option value="Wealth TOP FORUM Israel 2016">
                    <?php the_field('conference_1') ?>
                  </option>
                  <option value="Wealth TOP FORUM India 2017">
                    <?php the_field('conference_2') ?>
                  </option>
                </select>
              </li>

              <li>
                <label for="package">
                  <?php the_field('package_title') ?> <span class="span-underline">
                    <?php the_field('package_title_span') ?>
                  </span>:
                </label>

                <div class="choose-btns">
                  <input class="package" id="standard" type="radio" value="Standard" name="package">
                  <label class="label-standard" for="standard">
                    <?php the_field('button_text_1') ?>
                  </label>

                  <input class="package" id="premium" type="radio" value="Premium" name="package">
                  <label class="label-premium" for="premium">
                    <?php the_field('button_text_2') ?>
                  </label>

                </div>

              </li>

              <li>
                <label for="reg-name">
                  <?php the_field('reg_name') ?>
                </label>
                <input id="reg-name" type="text">
              </li>

              <li>
                <label for="reg-surname">
                  <?php the_field('reg_surname') ?>
                </label>
                <input id="reg-surname" type="text">
              </li>

              <li>
                <label for="reg-company-name">
                  <?php the_field('company_name') ?>
                </label>
                <input id="reg-company-name" type="text">
              </li>

              <li>
                <label for="business-area">
                  <?php the_field('business_area') ?>
                </label>
                <span class="business-area-select-arrow"></span>
                <select name="business-area" id="business-area">
                  <option value="Forex companies">
                    <?php the_field('forex_companies') ?>
                  </option>
                  <option value="Troupex compamies">
                    <?php the_field('troupex_compamies') ?>
                  </option>
                </select>
              </li>

              <li>
                <label for="reg-position">
                  <?php the_field('position') ?>
                </label>
                <input id="reg-position" type="text">
              </li>

              <li>
                <label for="reg-email-organizers">
                  <?php the_field('e-mail_for_organizers') ?>
                </label>
                <input id="reg-email-organizers" type="email">
              </li>

              <li>
                <label for="reg-email-sponsors">
                  <?php the_field('e-mail_for_sponsors') ?>
                </label>
                <input id="reg-email-sponsors" type="email">
              </li>

              <li>
                <label for="reg-mobile-organizers">
                  <?php the_field('mobile_number_for_organizers') ?>
                </label>
                <input id="reg-mobile-organizers" type="tel">
              </li>

              <li>
                <label for="reg-country">
                  <?php the_field('country') ?>
                </label>
                <input id="reg-country" type="text">
              </li>

              <li>
                <label for="reg-website">
                  <?php the_field('web-site') ?>
                </label>
                <input id="reg-website" type="text">
              </li>

              <li>
                <label for="method-payment">
                  <?php the_field('method_of_payment') ?>
                </label>

                <div class="method-payment-btns">
                  <input class="method-payment" id="free" type="radio" value="Free" name="pay-method">
                  <label class="label-free" for="free">
                    <?php the_field('method_payment_btns_1') ?>
                  </label>

                  <input class="method-payment" id="visa" type="radio" value="Visa" name="pay-method">
                  <label class="label-visa" for="visa">
                    <?php the_field('method_payment_btns_2') ?>
                  </label>

                  <input class="method-payment" id="invoice" type="radio" value="Invoice" name="pay-method">
                  <label class="label-invoice" for="invoice">
                    <?php the_field('method_payment_btns_3') ?>
                  </label>

                  <input class="method-payment" id="paypal" type="radio" value="PayPal" name="pay-method">
                  <label class="label-paypal" for="paypal">
                    <?php the_field('method_payment_btns_4') ?>
                  </label>
                </div>
              </li>
            </ul>

            <div class="accept-and-submit">
              <div class="terms">
                <div class="accept-checkbox">
                  <input required type="checkbox">
                </div>

                <span>
                  <?php the_field('accept_terms') ?> <a
                    href="<?php echo get_page_link(get_page_by_path('Sample Page')->ID); ?>">
                    <?php the_field('accept_terms_span') ?>
                  </a>
                </span>
              </div>

              <div class="btn-submit">
                <input type="submit" value="Submit">
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
  <?php }
  wp_reset_postdata(); ?>

</main>

<?php
get_footer();
?>