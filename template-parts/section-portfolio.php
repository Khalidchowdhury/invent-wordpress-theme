<?php
/**
 * Template Name: Portfolio Section
 */

$portfolio_section = get_page_by_path('portfolio-section');
$portfolio_id = $portfolio_section->ID;


?>

<!-- Portfolio Section start -->
<section id="portfolio" class="portfolio section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2><?php the_field('portfolio_section_title', $portfolio_id); ?></h2>
        <p><?php the_field('portfolio_section_short_description_', $portfolio_id); ?></p>
    </div>
        
    
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

            <!-- Portfolio Filter Tab -->
            <div class="portfolio-filters-container" data-aos="fade-up" data-aos-delay="200">
                <ul class="portfolio-filters isotope-filters">
                    <li data-filter="*" class="filter-active">All Work</li>
                    <?php
                    $terms = get_terms(array(
                        'taxonomy' => 'portfolio_category', 
                        'hide_empty' => true,
                    ));

                    if (!empty($terms) && !is_wp_error($terms)) :
                        foreach ($terms as $term) :
                            echo '<li data-filter=".filter-' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</li>';
                        endforeach;
                    endif;
                    ?>
                </ul>
            </div>
            <!-- End Portfolio Filter Tab -->


            <!-- Portfolio Items  -->
            <div class="row g-4 isotope-container" data-aos="fade-up" data-aos-delay="300">

                <!-- Portfolio Item -->
                <?php
                $args = array(
                    'post_type' => 'portfolio',
                    'posts_per_page' => -1,
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();

                        // Get categories for filter class
                        $terms = get_the_terms(get_the_ID(), 'portfolio_category');
                        $term_classes = '';
                        $term_names = [];

                        if ($terms && !is_wp_error($terms)) {
                            foreach ($terms as $term) {
                                $term_classes .= ' filter-' . $term->slug;
                                $term_names[] = $term->name;
                            }
                        }

                        // Get featured image URL
                        $image_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                        ?>

                        <!-- Portfolio Item -->
                        <div class="col-lg-6 col-md-6 portfolio-item isotope-item<?php echo esc_attr($term_classes); ?>">
                            <div class="portfolio-card">
                                <div class="portfolio-image">
                                    <img src="<?php echo esc_url($image_url); ?>" class="img-fluid" alt="<?php the_title_attribute(); ?>" loading="lazy">
                                    <div class="portfolio-overlay">
                                        <div class="portfolio-actions">
                                            <a href="<?php echo esc_url($image_url); ?>" class="glightbox preview-link" data-gallery="portfolio-gallery-<?php echo esc_attr($term_classes); ?>"><i class="bi bi-eye"></i></a>
                                            <a href="<?php the_permalink(); ?>" class="details-link"><i class="bi bi-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="portfolio-content">
                                    <span class="category"><?php echo implode(', ', $term_names); ?></span>
                                    <h3><?php the_title(); ?></h3>
                                    <p><?php echo wp_trim_words(get_field('short_description'), 20); ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- End Portfolio Item -->

                    <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>No portfolio items found.</p>';
                endif;
                ?>

                <!-- End Portfolio Item -->

            </div>

        </div>
    </div>

</section>
