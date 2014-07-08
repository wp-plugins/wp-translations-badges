<?php
	$custom_style = '';
	$badge_type = $atts['badge_type'];
	$alignment = $atts['alignment'];
	if($alignment == 'left') $custom_style = 'float: left;';
	if($alignment == 'right') $custom_style = 'float: right;';
	if($alignment == 'center') $custom_style = 'text-align: center';
?>
<div class="wp_t_badge" style="<?php echo $custom_style; ?>">
	<?php
		if($badge_type == 'translator'):
			$username = $atts['username'];
	?>
     <a href="http://transifex.com/accounts/profile/<?php echo $username; ?>"><img src="<?php echo plugins_url( 'assets/images/wp_t_badge_translator.png', dirname(__FILE__) );?>" alt="<?php _e( 'I am a Translator in WP-Translations Community', 'wp-translations-badges' );?>" title="<?php _e( 'I am a Translator in WP-Translations Community', 'wp-translations-badges' );?>" /></a>

	<?php
		elseif($badge_type == 'developer'):
			$project_slug = $atts['project_slug'];
	?>
    <a href="http://transifex.com/projects/p/<?php echo $project_slug; ?>"><img src="<?php echo plugins_url( 'assets/images/wp_t_badge_developer.png', dirname(__FILE__) );?>" alt="<?php _e( 'I Use WP-Translations Community for my i18n', 'wp-translations-badges' );?>" title="<?php _e( 'I Use WP-Translations Community for my i18n', 'wp-translations-badges' );?>" width="150" height="134" /></a>
	<?php
		elseif($badge_type == 'donor'):
	?>
    <a href="http://wp-translations.org/"><img src="<?php echo plugins_url( 'assets/images/wp_t_badge_donator.png', dirname(__FILE__) );?>" alt="<?php _e( 'I am a Proud Donor of WP-Translations Community', 'wp-translations-badges' );?>" title="<?php _e( 'I am a Proud Donor of WP-Translations Community', 'wp-translations-badges' );?>" width="150" height="134" /></a>
	<?php
		elseif($badge_type == 'supporter'):
	?>
    <a href="http://wp-translations.org/"><img src="<?php echo plugins_url( 'assets/images/wp_t_badge_supporter.png', dirname(__FILE__) );?>" alt="<?php _e( 'I am a big Fan of WP-Translations Community', 'wp-translations-badges' );?>" title="<?php _e( 'I am a big Fan of WP-Translations Community', 'wp-translations-badges' );?>" width="150" height="134" /></a>
	<?php
		endif;
	?>
</div>
