<footer class="bg-white text-dark pt-5 pb-4 border-top">
  <div class="container footer-top">
    <div class="row gy-4">

      <!-- About Section (Full Width on mobile) -->
      <div class="col-6 col-lg-4 ffooter-about">
        <div class="footer-contact">
          <h6 class="text-uppercase fw-bold">
            <?php the_field('company_name', 'option'); ?>
          </h6>   

          <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />

          <p><?php the_field('about_description', 'option'); ?></p>
        </div>


        <div class="social-links d-flex mt-4 gap-3">
            <?php if (have_rows('social_links', 'option')) : ?>
                <?php while (have_rows('social_links', 'option')) : the_row(); ?>
                    <?php 
                        $icon = get_sub_field('social_icon'); 
                        $url = get_sub_field('social_url');
                    ?>
                    <a href="<?php echo esc_url($url); ?>" class="text-dark fs-5" target="_blank">
                        <i class="<?php echo esc_attr($icon); ?>"></i>
                    </a>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>

      </div>

      <!-- Useful Links -->
      <div class="col-6 col-lg-2 footer-links">
        <h6 class="text-uppercase fw-bold">Useful Links</h6>
        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px"/>
        <ul class="list-unstyled">
          <?php
            wp_nav_menu(array(
              'theme_location' => 'footer_useful_links',
              'container' => false,
              'items_wrap' => '%3$s', 
              'depth' => 1,
              'fallback_cb' => false,
              'walker' => new class extends Walker_Nav_Menu {
                function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
                  $output .= '<li>';
                  $output .= '<a href="' . esc_url($item->url) . '" class="text-dark text-decoration-none d-block mb-2">' . esc_html($item->title) . '</a>';
                }
                function end_el(&$output, $item, $depth = 0, $args = null) {
                  $output .= "</li>\n";
                }
              }
            ));
          ?>
        </ul>
      </div>


      <!-- Our Services -->
      <div class="col-6 col-lg-3 footer-links">
          <h6 class="text-uppercase fw-bold">Our Services</h6>
          <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px"/>
          <ul class="list-unstyled">
            <?php
              wp_nav_menu(array(
                'theme_location' => 'our_services',
                'container' => false,
                'items_wrap' => '%3$s', 
                'depth' => 1,
                'fallback_cb' => false,
                'walker' => new class extends Walker_Nav_Menu {
                  function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
                    $output .= '<li>';
                    $output .= '<a href="' . esc_url($item->url) . '" class="text-dark text-decoration-none d-block mb-2">' . esc_html($item->title) . '</a>';
                  }
                  function end_el(&$output, $item, $depth = 0, $args = null) {
                    $output .= "</li>\n";
                  }
                }
              ));
            ?>
          </ul>
      </div>

      <!-- Contact Details -->
      <div class="col-6 col-lg-3 footer-links">
          <h6 class="text-uppercase fw-bold">Our Contact</h6>
          <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px"/>
          <?php if (have_rows('contact_footer', 'option')) : ?>
            <?php while (have_rows('contact_footer', 'option')) : the_row(); ?>
              <?php 
                $icon = get_sub_field('contact_icon');
                $text = get_sub_field('footer_contact_text');
              ?>
              <p>
                <i class="<?php echo esc_attr($icon); ?> mr-3"></i> 
                <?php echo esc_html($text); ?>
              </p>

            <?php endwhile; ?>
          <?php endif; ?>
      </div>
    </div>

    <hr class="text-secondary mt-5">

    <div class="text-center pt-3">
      <p class="mb-0"><?php the_field('footer_text','option'); ?></p>
    </div>
  </div>
</footer>





    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <?php wp_footer(); ?>



    <!-- Vendor JS Files -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/php-email-form/validate.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/aos/aos.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <!-- Main JS File -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        const faqItems = document.querySelectorAll('.faq-item');

        faqItems.forEach(item => {
          const header = item.querySelector('.faq-header');
          header.addEventListener('click', function () {
            item.classList.toggle('faq-active');

            faqItems.forEach(i => {
              if (i !== item) {
                i.classList.remove('faq-active');
              }
            });
          });
        });
      });
    </script>


</body>
</html>
