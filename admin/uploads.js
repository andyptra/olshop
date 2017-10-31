$(document).ready(function(){
	$('#images6ex').orakuploader({
		orakuploader_path  		  : 'orakuploader/',
		
		orakuploader_main_path : 'foto',
		orakuploader_thumbnail_path : 'foto/tn',
		
		orakuploader_add_image       : 'orakuploader/images/add.png',
		orakuploader_add_label       : 'Cari gambar',
		
		orakuploader_use_sortable : true,
		orakuploader_maximum_uploads : 5,
		orakuploader_hide_on_exceed : true,
		

		orakuploader_thumbnail_size  : 150
	});
});

$(document).ready(function(){
	$('#images6ex1').orakuploader({
		orakuploader_path  		  : 'orakuploader/',
		
		orakuploader_main_path : 'foto',
		orakuploader_thumbnail_path : 'foto/tn',
		
		orakuploader_add_image       : 'orakuploader/images/add.png',
		orakuploader_add_label       : 'maksimal 1 gambar',
		
		orakuploader_use_sortable : true,
		orakuploader_maximum_uploads : 1,
		orakuploader_hide_on_exceed : true,
		
		orakuploader_resize_to	     : 350,
		orakuploader_thumbnail_size  : 150
	});
});



$(document).ready(function(){
	$('#slides').orakuploader({
		orakuploader_path  		  : 'orakuploader/',
		
		orakuploader_main_path : 'foto',
		orakuploader_thumbnail_path : 'foto/tn',
		
		orakuploader_add_image       : 'orakuploader/images/add.png',
		orakuploader_add_label       : '1 gambar saja',
		
		orakuploader_use_sortable : true,
		orakuploader_maximum_uploads : 1,
		orakuploader_hide_on_exceed : true,
		
		orakuploader_crop_to_width: 1140,
		orakuploader_crop_to_height: 570,
		
		orakuploader_crop_thumb_to_width: 135,
		orakuploader_crop_thumb_to_height: 100
		

	});
});




