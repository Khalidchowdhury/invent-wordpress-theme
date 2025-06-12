<?php
/**
 * Template Name: Contact Section
 */
$contact_page = get_page_by_path('contact-section');
$contact_id = $contact_page->ID;
?>



    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2><?php the_field('contact_section_title', $contact_id) ?></h2>
        <p><?php the_field('contact_section_short_description', $contact_id) ?></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <!-- Contact Box -->
        <div class="row gy-4 mb-5">

          <?php if( have_rows('contact_box', $contact_id) ): ?>
              <?php while( have_rows('contact_box', $contact_id) ): the_row(); ?>

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                  <div class="info-card">
                    <div class="icon-box">
                        <?php
                            $icon_class = get_sub_field('box_icon', $contact_id);
                            $default_icon = 'fa-solid fa-star'; 
                            
                            $icon_to_show = $icon_class ? $icon_class : $default_icon;
                        ?>
                        <i class="<?php echo esc_attr($icon_to_show); ?>"></i>
                    </div>


                    <h3><?php the_sub_field('box_title', $contact_id); ?></h3>
                    <p><?php the_sub_field('box_short_description', $contact_id); ?></p>
                  </div>
                </div>

              <?php endwhile; ?>
            <?php endif; ?>

        </div>

        
        <!-- Contact Form Start -->
        <div class="row">
          <div class="col-lg-12">
            <div class="form-wrapper" data-aos="fade-up" data-aos-delay="400">
              <form action="<?php echo esc_url( home_url( '/?wpforms-submit=215' ) ); ?>" method="POST" class="php-email-form">

                <!-- WPForms Hidden Fields -->
                <input type="hidden" name="wpforms[id]" value="215">
                <input type="hidden" name="wpforms[author]" value="1">
                <input type="hidden" name="wpforms[post_id]" value="0">
                <input type="hidden" name="wpforms[submit]" value="1">

                <div class="row">
                  <!-- Name -->
                  <div class="col-md-6 form-group">
                    <div class="input-group">
                      <span class="input-group-text"><i class="bi bi-person"></i></span>
                      <input type="text" name="wpforms[fields][1]" class="form-control" placeholder="Your name*" required>
                    </div>
                  </div>
                  <!-- Email -->
                  <div class="col-md-6 form-group">
                    <div class="input-group">
                      <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                      <input type="email" name="wpforms[fields][2]" class="form-control" placeholder="Email address*" required>
                    </div>
                  </div>
                </div>

                <!-- Message -->
                <div class="form-group mt-3">
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-chat-dots"></i></span>
                    <textarea name="wpforms[fields][3]" rows="6" class="form-control" placeholder="Write a message*" required></textarea>
                  </div>
                </div>

                <!-- Submit -->
                <div class="text-center mt-4">
                  <button type="submit" class="btn btn-primary">Submit Message</button>
                </div>

              </form>
            </div>
          </div>
        </div>
        <!-- Contact Form End -->



      </div>
    </section>

