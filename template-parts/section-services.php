<?php
/**
 * Template Name: Services Section
 */

// Services Section Page ID
$services_section = get_page_by_path('services-section');
$services_id = $services_section->ID;

// CTA Section Page ID
$cta_section = get_page_by_path('call-to-action-section');
$cta_id = $cta_section->ID;
?>



    <!-- Services Section start -->
    <section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2><?php the_field('services_heading', $services_id); ?></h2>
        <p><?php the_field('services_description', $services_id); ?>t</p>
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row justify-content-center g-5">

          <!-- services box -->
          <?php if (have_rows('services_box', $services_id)): ?>
            <?php while (have_rows('services_box', $services_id)): the_row(); ?>
              <div class="col-md-6" data-aos="fade-left" data-aos-delay="100">
                <div class="service-item">
                  <div class="service-icon">
                    <?php
                      $icon_class = the_sub_field('services_box_icon_class', $services_id);
                      if (!empty($icon_class)) :
                    ?>
                      <i class="<?php echo esc_attr($icon_class); ?>"></i>
                    <?php endif; ?>
                  </div>
                  <div class="service-content">
                    <h3><?php the_sub_field('services_box_title', $services_id); ?></h3>
                    <p><?php the_sub_field('services_box_description', $services_id); ?></p>
                    <a href="<?php the_sub_field('button_link', $services_id); ?>" class="service-link">
                      <span>Learn More</span>
                      <i class="bi bi-arrow-right"></i>
                    </a>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          <?php endif; ?>
          <!-- End Service BOX -->

        </div>

      </div>

    </section>
    <!-- Services Section end -->


    <!-- Call To Action Section start -->
    <section id="call-to-action-2" class="call-to-action-2 section light-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-5 align-items-center">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
            <div class="cta-image-wrapper">
              <?php 
              $image = get_field('cta_feature_image', $cta_id); 
              if ($image): ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="img-fluid rounded-4">
              <?php endif; ?>
              <div class="cta-pattern"></div>
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
            <div class="cta-content">
              <p><?php the_field('cta_section_heading', $cta_id); ?></p>
              <h2><?php the_field('cta_section_title_', $cta_id); ?></h2>
              <p class="lead"><?php the_field('cta_section_description', $cta_id); ?></p>

              <div class="cta-features">
                <?php if (have_rows('cta_list', $cta_id)) : ?>
                  <?php while (have_rows('cta_list', $cta_id)) : the_row(); 
                    $text = get_sub_field('cta_list_text'); 
                  ?>
                    <div class="feature-item" data-aos="zoom-in" data-aos-delay="400">
                      <i class="bi bi-check-circle-fill"></i>
                      <span><?php echo esc_html($text); ?></span>
                    </div>
                  <?php endwhile; ?>
                <?php endif; ?>
              </div>

              <div class="cta-action mt-5">
                <a href="<?php the_field('cta_button_url', $cta_id); ?>" class="btn btn-primary btn-lg me-3"><?php the_field('cta_button_text', $cta_id); ?></a>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section>
    <!-- Call To Action Section end -->



