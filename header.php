<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- theme meta -->
    <meta name="theme-name" content="revolve"/>

    <!--Favicon-->
    <link rel="shortcut icon" href="<?php echo get_theme_file_uri( 'assets/images/favicon.ico' ) ?>"
          type="image/x-icon">

	<?php wp_head(); ?>

</head>

<body>

<header class="header-top bg-grey justify-content-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-2 col-md-4 text-center d-none d-lg-block">
				<?php $custom_logo_id = get_theme_mod( 'custom_logo' );
				$logo                 = wp_get_attachment_image_src( $custom_logo_id, 'full' );
				?>
                <a class="navbar-brand " href="<?php echo get_bloginfo( 'url' ) ?>">
                    <img src="<?php echo $logo[0] ?>" alt="logo" class="img-fluid">
                </a>
            </div>

            <div class="col-lg-8 col-md-12">
                <nav class="navbar navbar-expand-lg navigation-2 navigation">
                    <a class="navbar-brand text-uppercase d-lg-none" href="#">
                        <img src="<?php echo $logo[0] ?>" alt="logo" class="img-fluid">
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse"
                            aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="ti-menu"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbar-collapse">
						<?php wp_nav_menu(
							array(
								'container'      => false,
								'theme_location' => 'main-menu-location',
								'menu_class'     => 'menu navbar-nav mx-auto',
								'menu_id'        => 'menu',
							)
						) ?>
                    </div>

                </nav>
            </div>

            <div class="col-lg-2 col-md-4 col-6">
                <div class="header-socials-2 text-right d-none d-lg-block">
					<?php mt_welcome_text(); ?>
                </div>
            </div>
        </div>
    </div>
</header>
