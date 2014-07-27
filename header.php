<html>

<head>

<title>The Stone Inventory</title>

<link href="css/screen.css" media="screen" rel="stylesheet" type="text/css" />

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/vendor/jquery.ui.widget.js"></script>
<script src="js/jquery.iframe-transport.js"></script>
<script src="js/jquery.fileupload.js"></script>

<script>

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

</script>

</head>

<body>

<div id="global-wrapper">