<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
<title><?php 
        wp_title('|', true, 'right');
        bloginfo('name');
    ?></title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Tài Hòa</title>
    <meta name="title" content="" />
    <meta name="description" content="" />
    <meta property="og:locale" content="vi" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Trang chủ" />
    <meta property="og:description" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:image" content="" />
    <link rel="icon" href="imgs/taihoa-logo.svg" />

    <?php wp_head(); ?>
    <?php $default_posts_per_page = get_option( 'posts_per_page' ); ?>
</head>

<body>
    <!-- <div id="preloder">
        <div class="loader"></div>
        <img src="data:image/png;base64,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"
            alt="">
    </div> -->