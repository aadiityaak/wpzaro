<?php
/**
 * Header Navbar Menu
 *
 * @package wpzaro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$navbar_type        = wpzaro_theme_setting( 'wpzaro_navbar_type', 'collapse' );
$navbar_aligment    = wpzaro_theme_setting( 'wpzaro_menu_header_aligment', 'right' );
?>

<?php if ( $navbar_type === 'collapse' ) { ?>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'wpzaro' ); ?>">
        <span class="navbar-toggler-icon"></span>
    </button><!-- .collapse button -->

    <!-- The WordPress Menu goes here -->
    <?php
    wp_nav_menu(
        array(
            'theme_location'  => 'primary',
            'container_class' => 'collapse navbar-collapse',
            'container_id'    => 'navbarNavDropdown',
            'menu_class'      => 'navbar-nav '.$navbar_aligment ,
            'fallback_cb'     => '',
            'menu_id'         => 'main-menu',
            'depth'           => 2,
            'walker'          => new wpzaro_WP_Bootstrap_Navwalker(),
        )
    );
    ?>

<?php } else { ?>

    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarNavOffcanvas" aria-controls="navbarNavOffcanvas" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'wpzaro' ); ?>">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="navbarNavOffcanvas">

        <div class="offcanvas-header justify-content-end">
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div><!-- .offcancas-header -->

        <!-- The WordPress Menu goes here -->
        <?php
        wp_nav_menu(
            array(
                'theme_location'  => 'primary',
                'container_class' => 'offcanvas-body',
                'container_id'    => '',
                'menu_class'      => 'navbar-nav justify-content-end flex-grow-1 pe-3',
                'fallback_cb'     => '',
                'menu_id'         => 'main-menu',
                'depth'           => 2,
                'walker'          => new wpzaro_WP_Bootstrap_Navwalker(),
            )
        );
        ?>
    </div><!-- .offcanvas -->

<?php } ?>