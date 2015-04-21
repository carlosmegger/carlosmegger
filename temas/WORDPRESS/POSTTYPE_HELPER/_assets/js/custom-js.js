jQuery(function(jQuery) {
	
	
	jQuery('#media-items').bind('DOMNodeInserted',function(){
		jQuery('input[value="Insert into Post"]').each(function(){
				jQuery(this).attr('value','Use This Image');
		});
	});
	
	jQuery('.custom_upload_image_button').click(function() {
		formfield = jQuery(this).siblings('.custom_upload_image');
		preview = jQuery(this).siblings('.custom_preview_image');
		tb_show('', 'media-upload.php?type=image&TB_iframe=true');
		window.send_to_editor = function(html) {
			imgurl = jQuery(html).attr("href");
			id = jQuery(html).text();
			formfield.val(imgurl);
			preview.attr('src', imgurl);
			tb_remove();
		}
		
		return false;
	});
	
	jQuery('.custom_clear_image_button').click(function() {
		var defaultImage = jQuery(this).parent().siblings('.custom_default_image').text();
		jQuery(this).parent().siblings('.custom_upload_image').val('');
		jQuery(this).parent().siblings('.custom_preview_image').attr('src', defaultImage);
		return false;
	});
	
	jQuery('.custom_upload_file_button').click(function() {
		formfield = jQuery(this).siblings('.custom_upload_file');
		preview = jQuery(this).siblings('.custom_preview_file');
		tb_show('', 'media-upload.php?type=file&TB_iframe=true');
		window.send_to_editor = function(html) {
			fileurl = jQuery(html).attr("href");
		   	formfield.val(fileurl);
			
			preview.val(fileurl);
			tb_remove();
		}
		return false;
	});
	
	jQuery('.custom_clear_file_button').click(function() {
		var defaultImage = jQuery(this).parent().siblings('.custom_default_file').text();
		jQuery(this).parent().siblings('.custom_upload_file').val('');
		jQuery(this).parent().siblings('.custom_preview_file').val('');
		return false;
	});
	
	jQuery('.repeatable-add').click(function(event) {
		event.preventDefault();
		var $closest = jQuery(this).closest('td');
		var $fieldLocation = $closest.find('.custom_repeatable li:last');
		var $field = $fieldLocation.clone();
		jQuery('input', $field).val('').attr('name', function(index, name) {
			return name.replace(/(\d+)/, function(fullMatch, n) {
				return Number(n) + 1;
			});
		});
		
		$field.insertAfter($fieldLocation, $closest);
		fixNames($closest);
	});
	
	jQuery('.repeatable-remove').live('click', function(){
		var $parent = jQuery(this).parent();
		var $closest = jQuery(this).closest('td');
		if ($parent.siblings().length > 0) {
			jQuery(this).parent().remove();
		}
		fixNames($closest);
		return false;
	});
	
	/*
	jQuery('.custom_repeatable').sortable({
		opacity: 0.6,
		revert: true,
		cursor: 'move',
		handle: '.sort'
	});
	*/

});

function fixNames ($closest) {
	$closest.find('.custom_repeatable li').each(function(i){
		jQuery('input', jQuery(this)).attr('name', function (index, name){
			return name.replace(/(\d+)/, function(fullMatch, n) {
				return i;
			});
		})
	});
}