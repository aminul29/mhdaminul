<?php
/**
 * An example file demonstrating how to add all controls.
 *
 * @package     Kirki
 * @category    Core
 * @author      Aristeides Stathopoulos
 * @copyright   Copyright (c) 2017, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       3.0.12
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
// Do not proceed if Kirki does not exist.
if ( ! class_exists( 'Kirki' ) ) {
	return;
}
/**
 * First of all, add the config.
 *
 * @link https://aristath.github.io/kirki/docs/getting-started/config.html
 */
Kirki::add_config(
	'kirki_demo', array(
		'capability'  => 'edit_theme_options',
		'option_type' => 'theme_mod',
	)
);
/**
 * Add a panel.
 *
 * @link https://aristath.github.io/kirki/docs/getting-started/panels.html
 */
Kirki::add_panel(
	'gridos_options_panel', array(
		'priority'    => 10,
		'title'       => esc_attr__( 'Gridos Options Panel', 'gridos' ),
		'description' => esc_attr__( 'Config Your Theme Options Here.', 'gridos' ),
	)
);
/**
 * Add Sections.
 *
 * We'll be doing things a bit differently here, just to demonstrate an example.
 * We're going to define 1 section per control-type just to keep things clean and separate.
 *
 * @link https://aristath.github.io/kirki/docs/getting-started/sections.html
 */
$sections = array(
	'body'      => array( esc_attr__( 'Main Body Style', 'gridos' ), '' ),
	'social'	=> array( esc_attr__('Social Network Links', 'gridos'), ''),
);
foreach ( $sections as $section_id => $section ) {
	$section_args = array(
		'title'       => $section[0],
		'description' => $section[1],
		'panel'       => 'gridos_options_panel',
	);
	if ( isset( $section[2] ) ) {
		$section_args['type'] = $section[2];
	}
	Kirki::add_section( str_replace( '-', '_', $section_id ) . '_section', $section_args );
}
/**
 * A proxy function. Automatically passes-on the config-id.
 *
 * @param array $args The field arguments.
 */
function my_config_kirki_add_field( $args ) {
	Kirki::add_field( 'kirki_demo', $args );
}


// logo max-width
my_config_kirki_add_field(
	array(
		'type'        => 'dimensions',
		'settings'    => 'logo_dimensions',
		'label'       => esc_attr__( 'Logo Dimension Control', 'gridos' ),
		'section'     => 'body_section',
		'default'     => [
			'max-width'  => '180px',
		],
		'choices'     => [
			'labels' => [
				
				'max-width'  => esc_html__( 'Max Width', 'gridos' ),
			],
		],
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'color',
		'settings'    => 'main_color',
		'label'       => esc_attr__( 'Primary Color 1', 'gridos' ),
		'description' => esc_attr__( 'your Main Color Style 1.', 'gridos' ),
		'section'     => 'colors_section',
		'default'     => '#d92828',
		
	)
);


my_config_kirki_add_field(
	array(
		'type'        => 'typography',
		'settings'    => 'title_typo',
		'label'       => esc_attr__( 'Titles Font Family', 'gridos' ),
		'section'     => 'fonts_section',
		'default'     => array(
			'font-family'    => 'Montserrat',
		),
		'priority'    => 10,
		'output'      => array(
			array(
				'element' => 'h1, h2, h3, h4, h5, h6, body, p, .paragraph',
			),
		),
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'typography',
		'settings'    => 'quote_typo',
		'label'       => esc_attr__( 'Blockquote Font Family', 'gridos' ),
		'section'     => 'fonts_section',
		'default'     => array(
			'font-family'    => 'Rubik',
		),
		'priority'    => 10,
		'output'      => array(
			array(
				'element' => 'blockquote, blockquote p',
			),
		),
	)
);

/**social switcher**/

my_config_kirki_add_field(
	array(
		'type'        => 'switch',
		'settings'    => 'switch_socials',
		'label'       => esc_html__( 'Enable/Disable Social Icons', 'gridos' ),
		'section'     => 'social_section',
		'default'     => 'off',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'gridos' ),
			'off' => esc_html__( 'Disable', 'gridos' ),
		],
	)
);

/**facebook line**/

my_config_kirki_add_field(
	array(
		'type'        => 'text',
		'settings'    => 'facebook',
		'label'       => esc_attr__( 'Facebook Url', 'gridos' ),
		'section'     => 'social_section',
	)
);

/**twitter line**/

my_config_kirki_add_field(
	array(
		'type'        => 'text',
		'settings'    => 'twitter',
		'label'       => esc_attr__( 'Twitter Url', 'gridos' ),
		'section'     => 'social_section',
	)
);

/**instagram line**/

my_config_kirki_add_field(
	array(
		'type'        => 'text',
		'settings'    => 'instagram',
		'label'       => esc_attr__( 'Instagram Url', 'gridos' ),
		'section'     => 'social_section',
	)
);



my_config_kirki_add_field(
	array(
		'type'        => 'switch',
		'settings'    => 'switch_instagram',
		'label'       => esc_html__( 'Instagram Widget', 'gridos' ),
		'section'     => 'footer_section',
		'default'     => 'Off',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'gridos' ),
			'off' => esc_html__( 'Disable', 'gridos' ),
		],
	)
);

/**social switcher**/

my_config_kirki_add_field(
	array(
		'type'        => 'switch',
		'settings'    => 'switch_info',
		'label'       => esc_html__( 'Enable/Disable Contact Info', 'gridos' ),
		'section'     => 'header_section',
		'default'     => 'off',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'gridos' ),
			'off' => esc_html__( 'Disable', 'gridos' ),
		],
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'text',
		'settings'    => 'phone_number',
		'label'       => esc_html__( 'Enter phone number', 'gridos' ),
		'section'     => 'header_section',
		'default'     => esc_html__( '+1 234 5678 90 00', 'gridos' ),
	)
);


my_config_kirki_add_field(
	array(
		'type'        => 'text',
		'settings'    => 'email',
		'label'       => esc_html__( 'Enter Email address', 'gridos' ),
		'section'     => 'header_section',
		'default'     => esc_html__( 'gridos@domain.com', 'gridos' ),
	)
);


my_config_kirki_add_field(
	array(
		'type'        => 'text',
		'settings'    => 'copyright',
		'label'       => esc_html__( 'Copyright Line Text', 'gridos' ),
		'section'     => 'header_section',
		'default'     => esc_html__( '© 2020 gridos', 'gridos' ),
	)
);


/**page banner image**/

my_config_kirki_add_field(
	array(
		'type'        => 'image',
		'settings'    => 'image_setting_url',
		'label'       => esc_html__( 'Background Image', 'gridos' ),
		'description' => esc_html__( 'Page Banner Background Image.', 'gridos' ),
		'section'     => 'page_banner_section',
		'default'     => '',
	)
);

/**page banner description **/

my_config_kirki_add_field(
	array(
		'type'        => 'text',
		'settings'    => 'archive_description',
		'label'       => esc_html__( 'Archive description text', 'gridos' ),
		'section'     => 'page_banner_section',
		'default'     => '',
	)
);
