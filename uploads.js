$(document).ready(function(){
	$('#uploadtf').orakuploader({
		orakuploader_path  		  : 'orakuploader/',
		
		orakuploader_main_path : 'foto',
		orakuploader_thumbnail_path : 'foto/tn',
		
		orakuploader_add_image       : 'orakuploader/images/add.png',
		orakuploader_add_label       : 'upload disini',
		
		orakuploader_use_sortable : true,
		orakuploader_maximum_uploads : 1,
		orakuploader_hide_on_exceed : true,
		
		orakuploader_resize_to	     : 350,
		orakuploader_thumbnail_size  : 150
	});
});