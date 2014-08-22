<? include ("header.php") ?>
<? include "nav.php"; ?>

	<h1>Add to your stone inventory</h1>
	<? include("manage_db.php") ?>
	
	<form method="post" id="upload-stone-form" enctype="multipart/form-data">
	
		<li>
			<label>Please select your images.</label>
			<input id="fileupload" type="file" name="files[]" accept="image/*" capture="camera" data-url="server/php/" multiple>
		
			<textarea name="files-uploaded" id="files-uploaded"></textarea>
		</li>
		
		<li>
			<label>Please name your stone.</label>
			<input type="text" name="name" id="name">
		</li>
		
		<li>
			<label>How many do you have?</label>
			<input type="number" name="quantity" id="quantity">
		</li>
		
		<li>
			<label>What shape is your stone?</label>
			<input type="text" name="shape" id="shape">
		</li>
		
		<li>
			<label>What size?</label>
			<input type="text" name="size" id="size">
		</li>
		
		<li>
		
			<label>What color?</label>
			<input type="text" name="color" id="color">
		</li>
		
		<li>
			<label>What is its Mohs hardness?</label>
			<input type="number" name="mohs" id="mohs">
		</li>
		
		<li>
			<label>What else do you have to say?</label>
			<textarea name="notes" id="notes"></textarea>
		</li>
		
		<li>
			<input id="upload-submit" type="submit" value="Upload!">
		</li>
	</form>


<? include ("footer.php"); ?>