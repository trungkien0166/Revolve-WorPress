<?php
get_header();

$current_object = get_queried_object();
?>

<div class="breadcrumb-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">
                    <?php if (!empty($current_object->name)) { ?>
                        <h2 class="lg-title"><?php echo $current_object->name ?></h2>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <?php while (have_posts()) {
                        the_post();

                        $thumbnail = get_the_post_thumbnail_url('', 'article-thumbnail');
                    ?>
                        <div class="col-lg-6 col-md-6">
                            <article class="post-grid mb-5">
                                <?php if (!empty($thumbnail)) { ?>
                                    <div class="post-thumb mb-4">
                                        <img src="<?php echo $thumbnail ?>" alt="<?php echo esc_attr(get_the_title()) ?>" class="img-fluid w-100">
                                    </div>
                                <?php } else { ?>
                                    <div class="post-thumb mb-4">
                                        <img src="https://via.placeholder.com/350" alt="<?php echo esc_attr(get_the_title()) ?>" class="img-fluid w-100">
                                    </div>
                                <?php } ?>
                                <h3 class="post-title mt-1"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>

                                <span class=" text-muted  text-capitalize"><?php echo get_the_date() ?></span>

                            </article>
                        </div>
                    <?php } ?>

                </div>

                <div class="pagination mt-5 pt-4">
                    <?php
                    echo paginate_links(
                        array(
                            'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                            'total'        => $wp_query->max_num_pages,
                            'current'      => max(1, get_query_var('paged')),
                            'format'       => '?paged=%#%',
                            'show_all'     => false,
                            'type'         => 'list',
                            'end_size'     => 2,
                            'mid_size'     => 1,
                            'prev_next'    => true,
                            'prev_text'    => sprintf('<i class="ti-arrow-left"></i> %1$s', ''),
                            'next_text'    => sprintf('%1$s <i class="ti-arrow-right"></i>', ''),
                            'add_args'     => false,
                            'add_fragment' => '',
                        )
                    )
                    ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <?php get_sidebar() ?>
            </div>
        </div>
    </div>
</section>


<?php get_footer();
