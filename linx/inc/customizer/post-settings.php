<?php

LINX_Kirki::add_section( $kirki_prefix . 'post_settings', array(
	'title' => esc_html__( 'Post Settings', 'linx' ),
  'priority' => 15,
) );

LINX_Kirki::add_field( 'linx', array(
	'type' => 'toggle',
	'settings' => $kirki_prefix . 'first_post_full',
	'label' => esc_html__( 'Make first post full width', 'linx' ),
	'section' => $kirki_prefix . 'post_settings',
	'default' => false,
) );

LINX_Kirki::add_field( 'linx', array(
	'type' => 'toggle',
	'settings' => $kirki_prefix . 'disable_post_tags',
	'label' => esc_html__( 'Disable post tags', 'linx' ),
	'section' => $kirki_prefix . 'post_settings',
	'default' => false,
) );

LINX_Kirki::add_field( 'linx', array(
	'type' => 'toggle',
	'settings' => $kirki_prefix . 'disable_author_box',
	'label' => esc_html__( 'Disable author box', 'linx' ),
	'section' => $kirki_prefix . 'post_settings',
	'default' => false,
) );

LINX_Kirki::add_field( 'linx', array(
	'type' => 'toggle',
	'settings' => $kirki_prefix . 'disable_related_posts',
	'label' => esc_html__( 'Disable related posts', 'linx' ),
	'section' => $kirki_prefix . 'post_settings',
	'default' => false,
) );

LINX_Kirki::add_field( 'linx', array(
	'type' => 'slider',
	'settings' => $kirki_prefix . 'excerpt_length',
	'label' => esc_html__( 'Excerpt length', 'linx' ),
	'section' => $kirki_prefix . 'post_settings',
	'default' => 12,
	'choices' => array(
		'min' => 0,
		'max' => 100,
		'step' => 1,
	),
) );
