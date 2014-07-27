<html>

<head>

<title>The Stone Inventory</title>

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

Hello world!

<? include("manage_db.php") ?>

	<form method="post" enctype="multipart/form-data">
	
		Please select your images.
		<input id="fileupload" type="file" name="files[]" accept="image/*" capture="camera" data-url="server/php/" multiple>
		
		<div id="files-loaded">
		Loaded files go here.
		</div>
		
		<textarea name="files-uploaded" id="files-uploaded"></textarea>
		
		Please name your stone.
		<input type="text" name="name" id="name">
		
		How many do you have?
		<input type="number" name="quantity" id="quantity">
		
		What shape is your stone?
		<input type="text" name="shape" id="shape">
		
		What size?
		<input type="number" name="size" id="size">
		
		What color?
		<input type="text" name="color" id="color">
		
		What is its Mohs hardness?
		<input type="number" name="mohs" id="mohs">
		
		What else do you have to say?
		<textarea name="notes" id="notes"></textarea>
		
		<input type="submit" value="Save">
		
	</form>

</body>

</html>