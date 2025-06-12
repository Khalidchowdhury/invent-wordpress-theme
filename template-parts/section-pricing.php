<?php
/**
 * Template Name: Pricing Section
 */
$price_section = get_page_by_path('pricing-section');
$price_id = $price_section->ID;

$faq_section = get_page_by_path('faq-section');
$faq_id = $faq_section->ID;
?>


    <!-- Pricing Section Start -->
    <section id="pricing" class="pricing section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2><?php the_field('section_title', $price_id); ?></h2>
        <p><?php the_field('section_description', $price_id); ?></p>
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-4 justify-content-center">

          <?php if (have_rows('pricing_plans', $price_id)) : ?>
            <?php
              $count = 0;
              $delay = 100;
            ?>
            <?php while (have_rows('pricing_plans', $price_id)) : the_row(); ?>
              <?php
                // Stop loop after 3 items
                if ($count >= 3) break;

                // Add special class for the middle box (2nd one)
                $box_class = ($count === 1) ? 'highlight-pricing' : '';
              ?>
              <div class="col-lg-4" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                <div class="pricing-card <?php echo $box_class; ?>">
                  <h3><?php the_sub_field('plan_title', $price_id); ?></h3>

                  <div class="price">
                    <span class="currency">$</span>
                    <span class="amount"><?php the_sub_field('plan_price', $price_id); ?></span>
                    <span class="period">/Month</span>
                  </div>

                  <p class="description"><?php the_sub_field('plan_description', $price_id); ?></p>

                  <h4>Featured Included:</h4>
                  <ul class="features-list">
                    <?php if (have_rows('plan_features_list', $price_id)) : ?>
                      <?php while (have_rows('plan_features_list', $price_id)) : the_row(); ?>
                        <li>
                          <i class="bi bi-check-circle-fill"></i>
                          <?php the_sub_field('feature_text', $price_id); ?>
                        </li>
                      <?php endwhile; ?>
                    <?php endif; ?>
                  </ul>

                  <?php $button_link = get_sub_field('button_link'); ?>
                  <?php if ($button_link) : ?>
                    <a href="<?php echo esc_url($button_link); ?>" class="btn btn-primary">
                      Buy Now
                      <i class="bi bi-arrow-right"></i>
                    </a>
                  <?php endif; ?>
                </div>
              </div>
              <?php
                $count++;
                $delay += 100;
              ?>
            <?php endwhile; ?>
          <?php endif; ?>

        
        </div>

      </div>

    </section>
    <!-- Pricing Section End -->



    <!-- Faq Section -->
    <section id="faq" class="faq section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-5">
          <div class="col-lg-6" data-aos="zoom-out" data-aos-delay="200">
            <div class="faq-contact-card">
              <div class="card-icon">
                <?php
                    $icon_class = the_field('section_icon', $faq_id);
                ?>
                <i class="<?php echo esc_attr($icon_class); ?>"></i>
              </div>
              <div class="card-content">
                <h3><?php the_field('faq_title', $faq_id); ?></h3>
                <p><?php the_field('faq_description', $faq_id); ?></p>
                  <!-- Social contact list -->
                  <?php if (have_rows('social_contact_list', $faq_id)) : ?>
                    <div class="contact-options">
                      <?php while (have_rows('social_contact_list', $faq_id)) : the_row(); 
                        $icon_class = get_sub_field('social_contact_icon', $faq_id);
                        $text = get_sub_field('social_contact_text', $faq_id);
                      ?>
                        <a href="#" class="contact-option">
                          <?php if ($icon_class): ?>
                            <i class="<?php echo esc_attr($icon_class); ?>"></i>
                          <?php endif; ?>
                          <?php if ($text): ?>
                            <span><?php echo esc_html($text); ?></span>
                          <?php endif; ?>
                        </a>
                      <?php endwhile; ?>
                    </div>
                  <?php endif; ?>
                  <!-- Social contact list end -->
              </div>
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <div class="faq-accordion">

              <?php if( have_rows('faq_list', $faq_id) ): ?>
                <?php $i = 1; ?>
                <?php while( have_rows('faq_list', $faq_id) ): the_row(); 
                  $title = get_sub_field('faq_content_title', $faq_id);
                  $description = get_sub_field('faq_content_description', $faq_id);
                ?>
                  <div class="faq-item<?php echo ($i === 1) ? ' faq-active' : ''; ?>" data-aos="zoom-in" data-aos-delay="<?php echo $i * 100; ?>">
                    <div class="faq-header">
                      <h3><?php echo esc_html($title); ?></h3>
                      <i class="bi bi-chevron-down faq-toggle"></i>
                    </div>
                    <div class="faq-content">
                      <p><?php echo esc_html($description); ?></p>
                    </div>
                  </div>
                  <?php $i++; ?>
                <?php endwhile; ?>
              <?php endif; ?>

            </div>
          </div>
        </div>

      </div>
    </section>
    <!-- Faq Section -->
