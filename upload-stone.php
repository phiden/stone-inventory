<? include ("header.php") ?>
<? include("manage_db.php") ?>

	<form method="post" id="upload-stone-form" enctype="multipart/form-data">
	
		<li>Please select your images.<br>
		<input id="fileupload" type="file" name="files[]" accept="image/*" capture="camera" data-url="server/php/" multiple>
		
		<div id="files-loaded">
			Loaded files go here.
		</div>
		
		<textarea name="files-uploaded" id="files-uploaded"></textarea>
		</li>
		
		<li>
			Please name your stone.
			<input type="text" name="name" id="name">
		</li>
		
		<li>
			How many do you have?
			<input type="number" name="quantity" id="quantity">
		</li>
		
		<li>
			What shape is your stone?
			<input type="text" name="shape" id="shape">
		</li>
		
		<li>
			What size?
			<input type="text" name="size" id="size">
		</li>
		
		<li>
		
			What color?
			<input type="text" name="color" id="color">
		</li>
		
		<li>
			What is its Mohs hardness?
			<input type="number" name="mohs" id="mohs">
		</li>
		
		<li>
			What else do you have to say?
			<textarea name="notes" id="notes"></textarea>
		</li>
		
		<li>
			<input type="submit" value="Save">
		</li>
	</form>


<? include ("footer.php"); ?>