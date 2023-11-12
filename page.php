<?php

get_header();

if (have_posts()) :
    the_post();

?>

    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-center">
                        <h2 class="lg-title"><?php the_title() ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="pt-5 padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="row">
                        <div class="col-lg-12">
                            <?php $thumbnail = get_the_post_thumbnail_url('', 'full');
                            if (!empty($thumbnail)) {
                            ?>
                                <img src="<?php echo $thumbnail ?>" alt="feature-image" class="img-fluid w-100">
                            <?php } ?>
                        </div>
                    </div>

                    <div class="row justify-content-center mt-5">
                        <div class="col-lg-12">
                            <div class="row">
                                <?php the_content() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


<?php get_footer() ?>
