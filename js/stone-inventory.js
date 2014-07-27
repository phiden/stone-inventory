$(document).ready(function() {

	console.log('hello world');

	$(function () {
	    $('#fileupload').fileupload({
	        dataType: 'json',
	        done: function (e, data) {
	        
	        	console.log(data.result);
	            $.each(data.result.files, function (index, file) {
	                $('<p/>').text(file.url).appendTo("#files-loaded");
	                $('#files-uploaded').val(file.url);
	            });
	        }
	    });
	});	
})
