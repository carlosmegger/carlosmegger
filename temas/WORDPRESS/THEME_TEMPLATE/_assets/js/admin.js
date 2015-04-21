jQuery(document).ready(function(){
	
	/*- IMAGE UPLOADER [START] -*/
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
	/*- IMAGE UPLOADER [END] -*/
	
	/*- FILE UPLOADER [START] -*/
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
	/*- FILE UPLOADER [END] -*/
	
	/*- OPTIONS > BANNER > REMOVE [START] -*/
	jQuery('tr.banner a[href=#]').bind('click', function(){
		$this = jQuery(this);
		
		$this.closest('tr.banner').find('input').remove();
		$this.closest('tr.banner').fadeOut();
		
		return false;
	});
	/*- OPTIONS > BANNER > REMOVE [END] -*/
	
	/*- BREAD CRUMB [START] -*/
	jQuery('.repeatable-add').click(function(event) {
		
		event.preventDefault();
		var $closest = jQuery(this).closest('div');
		var $fieldLocation = $closest.find('ul li:last');
		
		if($fieldLocation.css('display') == 'none'){
		
			$fieldLocation.show();
		
		} else {
			
			var $field = $fieldLocation.clone();
			jQuery('input', $field).val('').attr('name', function(index, name) {
				return name.replace(/(\d+)/, function(fullMatch, n) {
					return Number(n) + 1;
				});
			});
			
			$field.insertAfter($fieldLocation, $closest);
			fixNames($closest);
			
		}
		
	});
	
	jQuery('.repeatable-remove').live('click', function(){
		var $parent = jQuery(this).parent();
		var $closest = jQuery(this).closest('td');
		if ($parent.siblings().length > 0) {
			jQuery(this).parent().remove();
		} else {
			jQuery(this).parent().hide();
			jQuery(this).parent().find('input').val('');
		}
		fixNames($closest);
		return false;
	});
	/*- BREAD CRUMB [END] -*/
	
	/*- CHECKBOX MULTI VALUES [START] -*/
	var valores = new Array();
	valores[0] = "green";
	valores[1] = "yellow";
	valores[2] = "red";
	
	jQuery('.checkbox').bind({
		click: function(event){
			event.preventDefault();
			
			var $this = jQuery(this);
			var $input = jQuery('.'+$this.attr('id'));
			
			if(parseInt($input.val()) < valores.length - 1){
				$input.val(parseInt($input.val()) + 1);
			} else {
				$input.val(0);
			}
			
			$this.removeClass('yellow red green').addClass(valores[parseInt($input.val())]);
		}
	});
	/*- CHECKBOX MULTI VALUES [END] -*/
	
	
	/*- TAXONOMY TIPO-MIDIA RADIO [START] -*/
    var taxonomy = 'midia-tipo';  
    jQuery('#' + taxonomy + 'checklist li :radio, #' + taxonomy + 'checklist-pop :radio').live( 'click', function(){  
        var t = jQuery(this), c = t.is(':checked'), id = t.val();  
        jQuery('#' + taxonomy + 'checklist li :radio, #' + taxonomy + 'checklist-pop :radio').prop('checked',false);  
        jQuery('#in-' + taxonomy + '-' + id + ', #in-popular-' + taxonomy + '-' + id).prop( 'checked', c );  
    });  
	/*- TAXONOMY TIPO-MIDIA RADIO [END] -*/
	
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