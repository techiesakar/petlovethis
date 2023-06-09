<?php

/**
 * Pet Love This Theme Customizer
 *
 * @package Pet_Love_This
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function petlovethis_customize_register($wp_customize)
{
	$wp_customize->get_setting('blogname')->transport = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

	if (isset($wp_customize->selective_refresh)) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector' => '.site-title a',
				'render_callback' => 'petlovethis_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector' => '.site-description',
				'render_callback' => 'petlovethis_customize_partial_blogdescription',
			)
		);
	}





	// For Social Link



	// Add a new section for social links.
	$wp_customize->add_section('petlovethis_social_links_section', array(
		'title'    => __('Social Links', 'petlovethis'),
		'priority' => 160,
	));

	// Add settings and controls for each social link.
	$social_links = array('facebook', 'tiktok', 'instagram', 'linkedin', 'twitter', 'whatsapp');

	foreach ($social_links as $platform) {
		// Add setting.
		$wp_customize->add_setting("petlovethis_{$platform}_link", array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		));

		// Add control.
		$wp_customize->add_control("petlovethis_{$platform}_link", array(
			'label'    => ucfirst($platform),
			'section'  => 'petlovethis_social_links_section',
			'type'     => 'url',
			'priority' => 10,
		));
	}
}
add_action('customize_register', 'petlovethis_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function petlovethis_customize_partial_blogname()
{
	bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function petlovethis_customize_partial_blogdescription()
{
	bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function petlovethis_customize_preview_js()
{
	wp_enqueue_script('petlovethis-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), _S_VERSION, true);
}
add_action('customize_preview_init', 'petlovethis_customize_preview_js');
