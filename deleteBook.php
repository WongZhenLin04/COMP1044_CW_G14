<!--delete book landing page-->
<?php
	include 'header.php';
?>
<div class='displayingForm'>
 	<h1>Delete Book Form</h1>
	<p id="error">please fill in the ID in each <br>field first before clicking on delete</p>
	<p id="subError"></p>
</div>
<br><br>
</div>
<?php
	if (isset($_POST["deleteBook"])&&$_POST["book_id"]!='') {
		//check if ID is present
		$ID=$_POST["book_id"];
		$sql = "SELECT * FROM `book` WHERE book_id='" . $_POST["book_id"] . "'";
		$result = $conn->query($sql);
		if ($result->num_rows != 0){
			$sql = "SELECT * FROM `book` INNER JOIN borrowdetails ON book.book_id=borrowdetails.book_id WHERE borrowdetails.book_id=$ID";
			$result = $conn->query($sql);
			//check if book is being borrowed
			if ($result->num_rows == 0) {
				$sql = "DELETE FROM book WHERE book_id ='" . $_POST["book_id"] . "'";
				if ($conn -> query($sql) === TRUE){
					echo '<script type="text/javascript">',
     					 'document.getElementById("error").innerHTML = "Book deleted succesfully!";',
     					 '</script>';
				}
			}
			else{
				echo '<script type="text/javascript">',
     				 'document.getElementById("error").innerHTML = "Error deleting book:<br><br> Book is being borrowed<br> cannot be deleted";',
     				 '</script>';
			}
		}
		else{
			echo '<script type="text/javascript">',
     			 'document.getElementById("error").innerHTML = "Error deleting book: There are no books with that ID";',
     			 '</script>';
		}
	}
	else if (isset($_POST["deleteBook"])&&$_POST["book_id"]==''){
		echo '<script type="text/javascript">',
     		 'document.getElementById("error").innerHTML = "Error deleting book: Please don\'t leave the ID field empty";',
     		 '</script>';
	}
?>
<!--deletion form-->
<div class='displayingForm'>
	<form class="deleteBook" action="deleteBook.php" method="post">
		<h2>Book ID to delete: </h2>
		<input type="text" id="book_id" name="book_id" placeholder="Book ID..."><br><br>
		<button type="submit" name="deleteBook">Delete!</button>
	</form>
</div>
<br><br>
<div class='displayingForm'>
	<a href="land.php">Click here to go back to main page</a><br><br>
	<a href="bookLand.php">Click here to go back to the Books landing page</a>
</div>