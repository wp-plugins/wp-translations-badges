<?php
	if(empty($settings['default'])){
		$settings['default'] = 'fxbenard';
		if(empty($value)){
			$value = $settings['default'];
		}
	}
	$parts = explode(',', $settings['default']);
	$total_parts = count($parts);
	if($total_parts) $width = (100 / $total_parts);
	$default = null;
?>

	<input name="<?php echo $name; ?>" class="widefat" type="text" ref="<?php echo $groupid; ?>" id="<?php echo $id; ?>" value="<?php echo sanitize_text_field( $value ); ?>">