<html>

<head>

<title>The Stone Inventory</title>

</head>

<body>

Hello world.

<? include("manage_db.php") ?>

<form method="post">

	Please select your images.
	<input type="file" mutliple="true" accept="image/*" capture="camera">
	
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
	
	Has it been used?
	<label for="radio-choice-1">Yes</label>
	<input type="radio" name="radio-choice-1" id="radio-choice" tabindex="2" value="choice-1">
	
	<label for="radio-choice-2">No</label>
	<input type="radio" name="radio-choice-2" id="radio-choice" tabindex="3" value="choice-2">
	
	What else do you have to say?
	<textarea name="notes" id="notes"></textarea>
	
	<input type='hidden' name='id' id='id' value='<? echo $_GET["id"]; ?>' />
	
	<input type="submit" value="Save">
	
</form>

</body>

</html>