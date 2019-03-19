jQuery(function ($) {
	'use strict';
  	$(function() {
  		
  		var $select = $('select[name=page_template]');

  		if ($select.val() == 'page-maintance.php') {
  			$('#tattoo_page_headers_metabox .cmb2-postbox').hide();
  			$('#tattoo_page_small_headers_metabox .cmb2-postbox').hide();
  			$('#tattoo_page_image_headers_metabox .cmb2-postbox').hide();
  			$('#tattoo_page_video_headers_metabox .cmb2-postbox').hide();
  			$('#tattoo_sliders_header_metabox .cmb2-postbox').hide();
  		} else {
  			$('#tattoo_page_maintance_metabox').hide();
  		}

  		$select.on('change', function (e) {
			    var optionSelected = $(this).find("option:selected");
					var valueSelected  = optionSelected.val();

					if (valueSelected == 'page-maintance.php') {
		  			$('#tattoo_page_headers_metabox').hide();
		  			$('#tattoo_page_small_headers_metabox').hide();
		  			$('#tattoo_page_image_headers_metabox').hide();
		  			$('#tattoo_page_video_headers_metabox').hide();
		  			$('#tattoo_sliders_header_metabox').hide();
		  			$('#tattoo_page_maintance_metabox').show();
		  		} else {
		  			$('#tattoo_page_headers_metabox').show();
		  			$('#tattoo_page_small_headers_metabox').show();
		  			$('#tattoo_page_image_headers_metabox').show();
		  			$('#tattoo_page_video_headers_metabox').show();
		  			$('#tattoo_sliders_header_metabox').show();
		  			$('#tattoo_page_maintance_metabox').hide();
		  		}
			});
  	});
});