<?php
/**
 * Template Name: Team Section
 */
$team_section = get_page_by_path('team-section');
$team_id = $team_section->ID;

$testimonials_section = get_page_by_path('testimonials-section');
$testimonials_id = $testimonials_section->ID;
?>




    <!-- Team Section -->
    <section id="team" class="team section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2><?php the_field('team_section_title', $team_id); ?></h2>
        <p><?php the_field('team_section_description', $team_id); ?></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-5">

          <!--Team Member Loop Start -->
          <?php if( have_rows('team_slider', $team_id) ): ?>
            <?php while( have_rows('team_slider', $team_id) ): the_row(); 
              $image = get_sub_field('team_hero_image');
              $name = get_sub_field('team_hero_title');
              $designation = get_sub_field('team_hero_designation');
              $description = get_sub_field('short_description');
            ?>
              <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="100">
                <div class="team-card">
                  <div class="team-image">
                    <?php if ($image): ?>
                      <img src="<?php echo esc_url($image['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($name); ?>">
                    <?php endif; ?>
                    <div class="team-overlay">
                      <p><?php echo esc_html($description); ?></p>
                      <div class="team-social">
                        <?php if( have_rows('team_social_media', $team_id) ): ?>
                          <?php while( have_rows('team_social_media', $team_id) ): the_row(); 
                            $icon = get_sub_field('team_social_media_icon', $team_id);
                            $link = get_sub_field('team_social_media_link', $team_id);
                          ?>
                            <a href="<?php echo esc_url($link); ?>" target="_blank">
                              <i class="<?php echo esc_attr($icon); ?>"></i>
                            </a>
                          <?php endwhile; ?>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                  <div class="team-content">
                    <h4><?php echo esc_html($name); ?></h4>
                    <span class="position"><?php echo esc_html($designation); ?></span>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          <?php endif; ?>
          <!--Team Member Loop End -->

        </div>

      </div>

    </section>
    <!-- /Team Section -->


    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2><?php the_field('testimonials_section_title', $testimonials_id); ?></h2>
        <p><?php the_field('testimonials_section_description', $testimonials_id); ?></p>
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="testimonials-slider swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 800,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": 1,
              "spaceBetween": 30,
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "768": {
                  "slidesPerView": 2
                },
                "1200": {
                  "slidesPerView": 3
                }
              }
            }
          </script>

          <div class="swiper-wrapper">
            <!-- Review Section Loop -->
              <?php if( have_rows('review_box', $testimonials_id) ): ?>
                <?php while( have_rows('review_box', $testimonials_id) ): the_row(); 
                  $description = get_sub_field('review_description', $testimonials_id);
                  $client_image = get_sub_field('clirnt_image', $testimonials_id);
                  $client_name = get_sub_field('clirnt_name', $testimonials_id);
                  $client_designation = get_sub_field('clirnt_designation', $testimonials_id);
                ?>
                  <div class="swiper-slide">
                    <div class="testimonial-card">
                      <div class="testimonial-content">
                        <p>
                          <i class="bi bi-quote quote-icon"></i>
                          <?php echo esc_html($description); ?>
                        </p>
                      </div>
                      <div class="testimonial-profile">
                        <div class="rating">
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                        </div>
                        <div class="profile-info">
                          <?php if ($client_image): ?>
                            <img src="<?php echo esc_url($client_image['url']); ?>" alt="<?php echo esc_attr($client_name); ?>">
                          <?php endif; ?>
                          <div>
                            <h3><?php echo esc_html($client_name); ?></h3>
                            <h4><?php echo esc_html($client_designation); ?></h4>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endwhile; ?>
              <?php endif; ?>
            <!-- Review Section Loop end-->
          </div>

          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section>
    <!-- Testimonials Section -->
