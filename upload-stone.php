<? include ("header.php") ?>

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