
jQuery(function($){
	var selection = false;
	var wp_translations_badgesShortcodePanel = $('#wp-translations-badges-shortcode-panel-tmpl').html();

	$('body').append(wp_translations_badgesShortcodePanel);
	$('.media-modal-backdrop, .media-modal-close').on('click', function(){
		wp_translations_badges_hideModal();
	})
	$(document).keyup(function(e) {
		if (e.keyCode == 27) {
			wp_translations_badges_hideModal();
		}
	});

	// show modal
	$('#wp-translations-badges-shortcodeinsert').click(function(){

		if($(this).data('shortcode')){
			window.send_to_editor('['+$(this).data('shortcode')+']');
			return;
		}

		// autoload item
		var autoload = $('.wp-translations-badges-autoload');
		if(autoload.length){
			wp_translations_badges_loadtemplate(autoload.data('shortcode'));
		}
		$('#wp-translations-badges-category-selector').on('change', function(){
			wp_translations_badges_loadtemplate('');
			$('.wp-translations-badges-elements-selector').hide();
			$('#wp-translations-badges-elements-selector-'+this.value).show().val('');
		});

		$('.wp-translations-badges-elements-selector').on('change', function(){
			wp_translations_badges_loadtemplate(this.value);
		});

		if(typeof tinyMCE !== 'undefined'){
			if(tinyMCE.activeEditor !== null){
				selection = tinyMCE.activeEditor.selection.getContent();
			}else{
				selection = false;
			}
		}else{
			selection = false;
		}
		if(selection.length > 0){
			$('#wp-translations-badges-content').html(selection);
		}
		$('#wp-translations-badges-shortcode-panel').show();
	});
	$('#wp-translations-badges-insert-shortcode').on('click', function(){
		wp_translations_badges_sendCode();
	})
	// modal tabs
	$('#wp-translations-badges-shortcode-config').on('click', '.wp-translations-badges-shortcode-config-nav li a', function(){
		$('.wp-translations-badges-shortcode-config-nav li').removeClass('current');
		$('.group').hide();
		$(''+$(this).attr('href')+'').show();
		$(this).parent().addClass('current');
		return false;
	});


});

function wp_translations_badges_loadtemplate(shortcode){
	var target = jQuery('#wp-translations-badges-shortcode-config');
	if(shortcode.length <= 0){
		target.html('');
	}
	target.html(jQuery('#wp-translations-badges-'+shortcode+'-config-tmpl').html());
}

function wp_translations_badges_sendCode(){

	var shortcode = jQuery('#wp-translations-badges-shortcodekey').val(),
		output = '['+shortcode,
		ctype = '',
		fields = {};

	if(shortcode.length <= 0){return; }

	if(jQuery('#wp-translations-badges-shortcodetype').val() === '2'){
		ctype = jQuery('#wp-translations-badges-default-content').val()+'[/'+shortcode+']';
	}
	jQuery('#wp-translations-badges-shortcode-config input,#wp-translations-badges-shortcode-config select,#wp-translations-badges-shortcode-config textarea').not('.configexclude').each(function(){
		if(this.value){
			// see if its a checkbox
			var thisinput = jQuery(this),
				attname = this.name;

			if(thisinput.prop('type') == 'checkbox'){
				if(!thisinput.prop('checked')){
					return;
				}
			}
			if(thisinput.prop('type') == 'radio'){
				if(!thisinput.prop('checked')){
					return;
				}
			}

			if(attname.indexOf('[') > -1){
				attname = attname.split('[')[0];
				var newloop = {};
				newloop[attname] = this.value;
				if(!fields[attname]){
					fields[attname] = [];
				}
				fields[attname].push(newloop);
			}else{
				var newfield = {};
				fields[attname] = this.value;
			}
		}
	});
	for( var field in fields){
		if(typeof fields[field] == 'object'){
			for(i=0;i<fields[field].length; i++){
				output += ' '+field+'_'+(i+1)+'="'+fields[field][i][field]+'"';
			}
		}else{
			output += ' '+field+'="'+fields[field]+'"';
		}
	}
	wp_translations_badges_hideModal();
	window.send_to_editor(output+']'+ctype);

}
function wp_translations_badges_hideModal(){
	jQuery('#wp-translations-badges-shortcode-panel').hide();
	wp_translations_badges_loadtemplate('');
	jQuery('#wp-translations-badges-elements-selector').show();
	jQuery('.wp-translations-badges-elements-selector').val('');
	jQuery('#wp-translations-badges-category-selector').val('');
}
