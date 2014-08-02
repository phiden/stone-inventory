<?

error_reporting(E_ALL);
ini_set('display_errors', '1');

// source: http://www.inmotionhosting.com/support/edu/website-design/using-php-and-mysql/php-insert-database

// When someone submits a comment, they "POST" the comment to the server.
// Therefore, we only want to insert a comment to the database if there
// is POST data. The if statement below checks to see if someone has
// posted data to the page
if( $_POST )
{
  // At this point in the code, we know someone has posted data and
  // is trying to post a comment. We therefore need to now connect
  // to the database

  // Below we are setting up our connection to the server. Because
  // the database lives on the same physical server as our php code,
  // we are connecting to "localhost". inmoti6_myuser and mypassword
  // are the username and password we setup for our database when
  // using the "MySQL Database Wizard" within cPanel
  $con = mysql_connect("localhost","root","root");

  // The statement above has just tried to connect to the database.
  // If the connection failed for any reason (such as wrong username
  // and or password, we will print the error below and stop execution
  // of the rest of this php script
  if (!$con)
  {
    die('Could not connect: ' . mysql_error());
  }

  // We now need to select the particular database that we are working with
  // In this example, we setup (using the MySQL Database Wizard in cPanel) a
  // database named inmoti6_mysite
  mysql_select_db("stone_inventory", $con);

  // We now need to create our INSERT command to insert the user's
  // comment into the database.
  //
  // Let's first take a look at the sample INSERT code we received when we
  // used phpMyAdmin to create a test comment:
  //
  //
  // If we ran this command, it would insert the same exact comment from John
  // Smith every time. What we need to do is update this query so that it
  // includes all of the data that the user typed in.
  //
  // When we set up our HTML Form, some of the text boxes we used were:
  // <input type='text' name='name' id='name' />
  // <input type='text' name='email' id='email' />
  // The important information we need from this is the "id" that is set.
  // For example, to get the user's name, we can grab the 'name'. To
  // get their email address, we need to get the value of 'email'.
  //
  // Using the $_POST variable, we can get this data. This is what we're
  // doing below
  $stone_name = $_POST['name'];
  $stone_images = $_POST['files-uploaded'];
  $stone_quantity = $_POST['quantity'];
  $stone_shape = $_POST['shape'];
  $stone_size = $_POST['size'];
  $stone_color = $_POST['color'];
  $stone_mohs = $_POST['mohs'];
  //$stone_used = $_POST['radio-choice'];
  $stone_notes = $_POST['notes'];

  // We now have all of the data that the user inputed. What you don't want
  // to do is trust the user's input. Savy users / hackers may attempt to use
  // an sql injection attack in order to run sql statements that you did not
  // intend to run. For example, the following is a basic query for checking
  // someone's username and password:
  //
  // SELECT * FROM users WHERE user='USERNAME' AND password='PASSWORD'
  //
  // In the above, we're assuming the user typed USERNAME as their username and
  // PASSWORD as their PASSWORD. But, what if the user typed the following as
  // their password?
  //
  // ' OR ''='
  //
  // The new query would then be the following:
  //
  // SELECT * FROM users WHERE user='USERNAME' AND password='' OR ''=''
  //
  // Running the above query would allow anyone to login as any user! We can use
  // the mysql_real_escape_string function to escape the user's input. If used in
  // the above example, the new query would read:
  //
  // SELECT * FROM users WHERE user='USERNAME' AND password='\' OR \'\'=\''
  //
  // Because the single quotes are "escaped" (i.e. appended with a backslash), the
  // hackers attempt would fail.
  $stone_name = mysql_real_escape_string($stone_name);
  $stone_images = mysql_real_escape_string($stone_images);
  $stone_quantity = mysql_real_escape_string($stone_quantity);
  $stone_shape = mysql_real_escape_string($stone_shape);
  $stone_size = mysql_real_escape_string($stone_size);
  $stone_color = mysql_real_escape_string($stone_color);
  $stone_mohs = mysql_real_escape_string($stone_mohs);
  //$stone_used = mysql_real_escape_string($stone_used);
  $stone_notes = mysql_real_escape_string($stone_notes);
  
  // We also need to get the article id, so we know if the comment belongs
  // to page 1 or if it belongs to page 2. The article id is going to be
  // passed in the URL. For example, looking at this URL:
  //
  // http://phpandmysql.inmotiontesting.com/page1.php?id=1
  //
  // The article id is 1. To get data from the url, use the $_GET variable,
  // as in:
  //$articleid = $_GET['id'];

  // We also want to add a bit of security here as well. We assume that the $article_id
  // is a number, but if someone changes the URL, as in this manner:
  // http://phpandmysql.inmotiontesting.com/page2.php?id=malicious_code_goes_here
  // ... then they will have the potential to run any code they want in your
  // database. The following code will check to ensure that $article_id is a number.
  // If it is not a number (IE someone is trying to hack your website), it will tell
  // the script to stop executing the page
  
  /*
   INSERT INTO `inmoti6_mysite`.`comments` (`id`, `name`, `email`, `website`,
        `comment`, `timestamp`, `articleid`) VALUES (NULL, '$stone_name',
        '$stone_email', '$stone_website', '$stone_comment',
        CURRENT_TIMESTAMP, '$articleid');
        
  
  
  if( ! is_numeric($articleid) )
    die('invalid article id');*/

  // At this point, we've grabbed all of the data that we need. We now need
  // to update our SQL query. For example, instead of "John Smith", we'll
  // use $stone_name. Below is our updated SQL command:
  $query = "INSERT INTO `stone_inventory`.`stones` (`id`, `images`, `name`, `quantity`, `shape`, `color`, `size`, `mohs`, `notes`) VALUES (NULL, '$stone_images', '$stone_name', '$stone_quantity', '$stone_shape', '$stone_color', '$stone_size', '$stone_mohs', '$stone_notes');";
        
  // Our SQL stated is stored in a variable called $query. To run the SQL command
  // we need to execute what is in the $query variable.
  mysql_query($query);

  // We can inform the user to what's going on by printing a message to
  // the screen using php's echo function
  echo "<h2>Yay! You did it!</h2>";
  echo $stone_images;
  
  // At this point, we've added the user's comment to the database, and we can
  // now close our connection to the database:
  mysql_close($con);
}

?>
