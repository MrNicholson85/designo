<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wp-tailwind
 */

get_header();
?>

<section id="primary">
    <main id="main">

        <?php
        /* Start the Loop */
        while (have_posts()) :
            the_post();
            get_template_part('template-parts/content/content', 'project');

            if (is_singular('project')) {
                // Previous/next post navigation.
                echo '<div class="post-nav dps-wrapper">';
                the_post_navigation(
                    array(
                        'next_text' => '<span aria-hidden="true">' . __('Next Post', 'wp-tailwind') . '</span> ' .
                            '<span class="sr-only">' . __('Next post:', 'wp-tailwind') . '</span> <br/>',
                        'prev_text' => '<span aria-hidden="true">' . __('Previous Post', 'wp-tailwind') . '</span> ' .
                            '<span class="sr-only">' . __('Previous post:', 'wp-tailwind') . '</span> <br/>',
                    )
                );
                echo '</div>';
            }
        endwhile;
        ?>

    </main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
