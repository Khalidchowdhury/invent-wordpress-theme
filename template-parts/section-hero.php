<?php
/**
 * Template Name: Hero Section
 */

$hero_section = get_page_by_path('home');
$hero_id = $hero_section->ID;


?>


<!-- Hero Section start -->
    <section id="hero" class="hero section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row align-items-center mb-5">

                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="badge-wrapper mb-3">

                        <!-- Slogan with Icon  -->
                        <div class="d-inline-flex align-items-center rounded-pill border border-accent-light">
                            <span class="badge-text me-3"><?php the_field('hero_slogan_text', $hero_id); ?></span>
                        </div>
                    </div>

                    <!-- Title -->
                    <h1 class="hero-title mb-4"><?php the_field('hero_title', $hero_id); ?></h1>
                    <!-- Description -->
                    <p class="hero-description mb-4"><?php the_field('hero_description', $hero_id); ?></p>

                    <!-- Hero Section Button -->
                    <div class="cta-wrapper">
                    <a href="<?php the_field('hero_button_link', $hero_id); ?>" class="btn btn-primary"><?php the_field('hero_button_text', $hero_id); ?></a>
                    </div>

                </div>

                <!-- Hero Section Image -->
                <div class="col-lg-6">
                    <div class="hero-image">
                    <img src="<?php the_field('hero_image', $hero_id); ?>" alt="Business Growth" class="img-fluid" loading="lazy">
                    </div>
                </div>

            </div>
        
            <!-- Hero Feature Boxes -->
            <div class="row feature-boxes">
                <?php if(have_rows('hero_features', $hero_id)): $delay = 200; ?>
                    <?php while(have_rows('hero_features', $hero_id)): the_row(); ?>
                        <div class="col-lg-4 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                            <div class="feature-box">
                                <div class="feature-icon me-sm-4 mb-3 mb-sm-0">
                                    <?php
                                        $icon_class = the_sub_field('feture_icon', $hero_id);
                                        if (!empty($icon_class)) :
                                    ?>
                                        <i class="<?php echo esc_attr($icon_class); ?>"></i>
                                    <?php endif; ?>
                                </div>
                                <div class="feature-content">
                                    <h3 class="feature-title"><?php the_sub_field('title', $hero_id); ?></h3>
                                    <p class="feature-text"><?php the_sub_field('description', $hero_id); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php $delay += 100; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>

        </div>
    </section>
<!-- Hero Section End-->
