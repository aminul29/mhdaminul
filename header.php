
<!doctype html>

<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo('charset'); ?>">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?php wp_head(); ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Oswald:wght@200..700&family=Syne:wght@400..800&display=swap" rel="stylesheet">

</head>
<body <?php body_class('body'); ?>>
	<?php wp_body_open(); ?>

<div id="ip-container" class="ip-container">

	<!-- Container -->
	<div id="container">

	<?php
	
	get_template_part( 'template-parts/header/header' ); ?>

	