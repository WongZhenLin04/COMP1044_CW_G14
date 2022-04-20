<!--add book landing page-->
<?php
	include 'header.php';
?>
<div class='displayingForm'> 
	<h1>Add Book Form</h1>
	<p id="error"></p>
<?php


 if(isset($_POST['addBook']))
{	 
	$book_title = $_POST['book_title'];
	$category_id = $_POST['category_id'];
	$author = $_POST['author'];
	$book_pub = $_POST['book_pub'];
	$publisher_name = $_POST['publisher_name']; 
	$isbn = $_POST['isbn'];
	$copyright_year = $_POST['copyright_year'];
	$status = $_POST['status'];
	
	
	//set date as current date 
	$date_added = date('Y-m-d H:i:s');
	
	
	//check if all fields are filled
	if (empty($book_title) OR empty($category_id) OR empty($author) OR empty($book_pub) OR empty($publisher_name) OR empty($isbn) OR empty($copyright_year) OR empty($status))
	{
		echo "<p>Please fill in all fields of the form!</p>";
    }
	else{
	  //check if book exists, if exist, book_copies++
	  	$check="SELECT * FROM book WHERE book_title = '$book_title' AND category_id = '$category_id' AND author = '$author' AND book_pub = '$book_pub' AND publisher_name = '$publisher_name' AND isbn = '$isbn' AND copyright_year = '$copyright_year' AND status = '$status'";
   	  	$result = $conn->query($check);
  	  	if ($result->num_rows > 0) 
	 	{
			$sql = "UPDATE book SET book_copies = book_copies + 1 WHERE book_title = '$book_title' AND author = '$author'";     
	 	  	if ($conn->query($sql) === TRUE)
	 	  	{
	 	    	echo'<script type="text/javascript">',
     			 	'document.getElementById("error").innerHTML = "Book added successfully";',
     			 	'</script>';
		  	}
	  	}
	  	else if(!is_numeric($copyright_year)){
	  		echo'<script type="text/javascript">',
     			 'document.getElementById("error").innerHTML = "Error adding book: <br><br>Please only enter numbers for the copyright year";',
     			 '</script>';
	  	}
	 	else
	  	{
	 		$book_copies = '1';
			$addsql = "INSERT INTO book (book_title, category_id, author, book_copies, book_pub, publisher_name, isbn, copyright_year, date_added, status) VALUES ('$book_title','$category_id','$author','$book_copies', '$book_pub', '$publisher_name', '$isbn', '$copyright_year', '$date_added', '$status')";
	 		if ($conn->query($addsql) === TRUE)
	 		{
				echo'<script type="text/javascript">',
     			 	'document.getElementById("error").innerHTML = "Book added successfully";',
     			 	'</script>';
			}
		}
	}
}
?>
</div>
<br><br>
<div class='displayingForm'>

	<Form method="post">
		<h2>Book Title:</h2>
		<input type="text" name="book_title" placeholder="Book Title"><br><br>
		<h2>Category:</h2>
		<select name="category_id">
  			<option value="1">Periodical</option>
  			<option value="2">English</option>
			<option value="3">Math</option>
			<option value="4">Science</option>
  			<option value="5">Encyclopedia</option>
			<option value="6">Filipiniana</option>
  			<option value="7">Newspaper</option>
			<option value="8">General</option>
			<option value="9">References</option>
  		</select><br><br>
		<h2>Author name:</h2>
		<input type="text" name="author" placeholder="Author"><br><br>
		<h2>Book publisher:</h2>
		<input type="text" name="book_pub" placeholder="Book Publisher"><br><br>
		<h2>Publisher Name:</h2>
		<input type="text" name="publisher_name" placeholder="Publisher Name"><br><br>
		<h2>ISBN:</h2>
		<input type="text" name="isbn" placeholder="ISBN"><br><br>
		<h2>Copyright Year:</h2>
		<input type="text" name="copyright_year" placeholder="Copyright Year"><br><br>
		<h2>Bok status:</h2>
		<select name="status">
  			<option value="New">New</option>
  			<option value="Old">Old</option>
			<option value="Lost">Lost</option>
			<option value="Damaged">Damaged</option>
  			<option value="Archived">Archived</option>
  		</select><br><br>
		
		<button type="submit" name="addBook">Add Book!</button>
		
	</Form>
	
</div>
<br><br>
<div class='displayingForm'>
	<a href="land.php">Click here to go back to main page</a><br><br>
	<a href="bookLand.php">Click here to go back to the Books landing page</a>
</div>