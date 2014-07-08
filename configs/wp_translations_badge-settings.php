<?php
/**
*
* fieldconfig for wp-translations-badges/Settings
*
* @package Wp_Translations_Badges
* @author    Myles McNamara <myles@smyl.es>, fxbenard <fxb@wp-translations.org>
* @license GPL-2.0+
* @link http://smyl.es
* @copyright 2014 Myles McNamara, fxbenard
*/


$group = array(
	'label' => __('Settings','wp-translations-badges'),
	'id' => '60981314',
	'master' => 'badge_type',
	'fields' => array(
		'badge_type'	=>	array(
			'label'		=> 	__('Badge Type:','wp-translations-badges'),
			'caption'	=>	__('Type of badge to display','wp-translations-badges'),
			'type'		=>	'dropdown',
			/* translators: Important don't translate translator, developer, donor, supporter */
			'default'	=> 	__( '*translator||I\'m Translating,developer||I\'m Developing,donor||I\'m a Donor,supporter||I\'m a Supporter', 'wp-translations-badges' ),
		),
	),
	'multiple'	=> false,
);