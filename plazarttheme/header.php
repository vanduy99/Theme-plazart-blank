<?php
/*
 * The Header for our theme.
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php bloginfo('description'); ?>" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <link media="all" rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/ie9.css">
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
    <![endif]-->

    <?php wp_head(); ?>
</head>
<body id="bd" <?php body_class(); ?>>


<?php $plazarttheme_show_loading = ot_get_option('plazarttheme_TzGlobalOptionLoading',1);
    if( isset($plazarttheme_show_loading) && $plazarttheme_show_loading == 1 ):
?>
    <div id="tzloadding">
    <?php

    $plazarttheme_loading = ot_get_option('plazarttheme_TzGlobalOptionUploadLoading');

    if( isset($plazarttheme_loading) && !empty($plazarttheme_loading) ):
        $plazarttheme_loading_image_size   =   getimagesize(esc_url($plazarttheme_loading));
        ?>
        <img class="loadding_img" src="<?php echo esc_url($plazarttheme_loading); ?>" alt="<?php esc_attr_e('loading...','plazarttheme') ?>" width="<?php echo esc_attr($plazarttheme_loading_image_size[0]);?>" height ="<?php echo esc_attr($plazarttheme_loading_image_size[1]); ?>">
    <?php else: ?>
        <img class="loadding_img" src="<?php echo (get_template_directory_uri().'/images/loadding.GIF'); ?>" alt="<?php esc_attr_e('loading...','plazarttheme') ?>" width="32" height="39">

    <?php endif; ?>
<?php endif; ?>

</div>