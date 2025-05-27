<?php
/**
 * Template Name: About Page
 */
$about_page = get_page_by_path('about-section');
$about_id = $about_page->ID;
?>



<!-- About Section -->
<section id="about" class="about section">
  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
        <p class="who-we-are"><?php the_field('about_heading', $about_id); ?></p>
        <h3><?php the_field('about_title', $about_id); ?></h3>
        <p class="fst-italic">
          <?php the_field('about_description', $about_id); ?>
        </p>

        <?php if (have_rows('about_features', $about_id)) : ?>
          <ul>
            <?php while (have_rows('about_features', $about_id)) : the_row(); ?>
              <li>
                <i class="bi bi-check-circle"></i>
                <span><?php the_sub_field('item_text'); ?></span>
              </li>
            <?php endwhile; ?>
          </ul>
        <?php endif; ?>

        <?php if (get_field('about_btn_link', $about_id) && get_field('about_btn_text', $about_id)) : ?>
          <a href="<?php the_field('about_btn_link', $about_id); ?>" class="read-more">
            <span><?php the_field('about_btn_text', $about_id); ?></span>
            <i class="bi bi-arrow-right"></i>
          </a>
        <?php endif; ?>
      </div>

      <?php $horizontal = get_field('about_img_horizontal', $about_id); ?>
      <?php $vertical1 = get_field('about_img_vertical1', $about_id); ?>
      <?php $vertical2 = get_field('about_img_vertical2', $about_id); ?>
      <div class="col-lg-6 about-images" data-aos="fade-up" data-aos-delay="200">
        <div class="row gy-4">
          <div class="col-lg-6">
            <?php if ($horizontal): ?>
              <img src="<?php echo esc_url($horizontal['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($horizontal['alt']); ?>">
            <?php endif; ?>
          </div>
          <div class="col-lg-6">
            <div class="row gy-4">
              <div class="col-lg-12">
                <?php if ($vertical1): ?>
                  <img src="<?php echo esc_url($vertical1['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($vertical1['alt']); ?>">
                <?php endif; ?>
              </div>
              <div class="col-lg-12">
                <?php if ($vertical2): ?>
                  <img src="<?php echo esc_url($vertical2['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($vertical2['alt']); ?>">
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>
</section>
