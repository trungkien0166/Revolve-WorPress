<?php
get_header();

$current_object = get_queried_object();
?>

    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-center">
						<?php if ( ! empty( $current_object->display_name ) ) { ?>
                            <h2 class="lg-title">Trang cá nhân của "<?php echo $current_object->display_name ?>"</h2>
						<?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section-padding">
        <div class="container">
            <div class="row">
                <form id="form-new-topic" method="post" action="">
                    <h3>New topic</h3>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="topic">New topic *</label>
                        <textarea type="text" id="topic" name="u_topic"
                                  class="form-control"></textarea>
                    </div>

                    <!-- Submit button -->
                    <input type="submit" name="mt_submit_new_topic" class="btn btn-primary btn-block"
                           value="Submit new topic">
                </form>
            </div>
            <div class="row">
				<?php
				$args   = array(
					'post_type'  => 'topic',
					'meta_key'   => 'creator',
					'meta_value' => $current_object->ID
				);
				$topics = new WP_Query( $args );
				?>

                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div id="list-topic" class="row">
						<?php while ( $topics->have_posts() ) {
							$topics->the_post();

							$thumbnail = get_the_post_thumbnail_url( '', 'article-thumbnail' );
							?>
                            <div class="col-lg-12 col-md-12" style="border: #ccc solid 1px;">
                                <article class="post-grid mb-5">
									<?php the_content(); ?>
                                    <span class=" text-muted  text-capitalize"><?php echo get_the_date() ?></span>

                                </article>
                            </div>
						<?php }
						wp_reset_postdata();
						?>

                    </div>

                    <div class="pagination mt-5 pt-4">

                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                </div>

            </div>
        </div>
    </section>

<?php get_footer();
