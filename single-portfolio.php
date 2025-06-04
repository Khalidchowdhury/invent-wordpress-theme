<?php get_header(); ?>

<div class="portfolio-details-page">
  <main class="main">

    <!-- Page Title -->
    <div class="page-title">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1 class="heading-title"><?php the_title(); ?></h1>
              <p class="mb-0"><?php the_field('short_description'); ?></p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="<?php echo home_url(); ?>">Home</a></li>
            <li class="current"><?php the_title(); ?></li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Portfolio Details Section -->
    <section id="portfolio-details" class="portfolio-details section">

      <div class="container" data-aos="fade-up">

        <!-- Slider Image -->
        <div class="portfolio-details-slider swiper init-swiper">
        <script type="application/json" class="swiper-config">
            {
            "loop": true,
            "speed": 600,
            "autoplay": {
                "delay": 5000
            },
            "slidesPerView": "auto",
            "navigation": {
                "nextEl": ".swiper-button-next",
                "prevEl": ".swiper-button-prev"
            },
            "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
            }
            }
        </script>

            <div class="swiper-wrapper align-items-center">
                <?php
                    $gallery_images = get_field('gallery_images'); 

                    if ($gallery_images) :
                    foreach ($gallery_images as $image) : ?>
                        <div class="swiper-slide">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                        </div>
                    <?php endforeach;
                    endif;
                ?>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-pagination"></div>

        </div>

        <div class="row justify-content-between gy-4 mt-4">
            <!-- Project Content -->
            <div class="col-lg-8" data-aos="fade-up">
            <div class="portfolio-description">
                <h2><?php the_title(); ?></h2>
                <p><?php the_content(); ?></p>
            </div>
            </div>

            <!-- Project information Sidebar -->
            <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
            <div class="portfolio-info">
                <h3>Project information</h3>
                <ul>
                    <li><strong>Category</strong>
                        <?php
                        $terms = get_the_terms(get_the_ID(), 'portfolio_category');
                        if (!empty($terms) && !is_wp_error($terms)) {
                            echo esc_html($terms[0]->name);
                        } else {
                            echo 'Uncategorized';
                        }
                        ?>
                    </li>
                    <li><strong>Client</strong> <?php the_field('client_name'); ?></li>
                    <li><strong>Project date</strong> <?php the_field('project_date'); ?></li>
                    <li><strong>Project URL</strong> <a href="#"><a href="<?php the_field('project_url'); ?>" target="_blank"><?php the_field('project_url'); ?></a></a></li>
                </ul>
            </div>
            </div>

        </div>
      </div>

    </section>

  </main>
</div>

<?php get_footer(); ?>
