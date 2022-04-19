<!--search book landing page-->
<!--This section is for Gele-->
<?php
	include 'header.php';
?>
<div class='displayingForm'> 
	<h1>Search for a book!</h1>
	<h2 id="results"></h2>

<!--add code between here-->
<?php
//search by ID
if(isset($_POST['search_ID'])){
	echo '<script type="text/javascript">',
     	 'document.getElementById("results").innerHTML = "Results:";',
     	 '</script>';
	if($_POST['book_id'] != ''){
		$ID =  $_POST['book_id'];
		$sql = "SELECT * FROM book WHERE book_id = '$ID';";
		$result = $conn->query($sql);
		//check if book exists
		if ($result->num_rows == 0) {
			echo "<p>There are no book records with that ID</p>";
		}
		else {
			while($row = $result->fetch_assoc()){
				echo "<p>ID: ".$row["book_id"]. " <br>book title: ".$row["book_title"]. " <br>category ID: ".$row["category_id"]. " <br>author: ".$row["author"]. 
					" <br>book copies: ".$row["book_copies"]. " <br>book pub: ".$row["book_pub"]. " <br>publisher name: ".$row["publisher_name"]. " <br>isbn: ".$row["isbn"]. 
					" <br>copyright year: ".$row["copyright_year"]. "<br>date added: ".$row["date_added"]. "  <br>status: ".$row["status"]. "</p>";
			}
		}
	}
}
//search by book title
if(isset($_POST['search_btitle'])){
	echo '<script type="text/javascript">',
     	 'document.getElementById("results").innerHTML = "Results:";',
     	 '</script>';
	if($_POST['book_title'] != ''){
		$title =  $_POST['book_title'];
		$sql = "SELECT * FROM book WHERE book_title = '$title';";
		$result = $conn->query($sql);
		//check if book exists
		if ($result->num_rows == 0) {
			echo "<p>There are no book records with that title</p>";
		}
		else {
			while($row = $result->fetch_assoc()){
				echo "<p>ID: ".$row["book_id"]. " <br>book title: ".$row["book_title"]. " <br>category ID: ".$row["category_id"]. " <br>author: ".$row["author"]. 
					" <br>book copies: ".$row["book_copies"]. " <br>book pub: ".$row["book_pub"]. " <br>publisher name: ".$row["publisher_name"]. " <br>isbn: ".$row["isbn"]. 
					" <br>copyright year: ".$row["copyright_year"]. "<br>date added: ".$row["date_added"]. "  <br>status: ".$row["status"]. "</p>";
			}
		}
	}
}
//search by category ID
if(isset($_POST['search_cID'])){
	echo '<script type="text/javascript">',
     	 'document.getElementById("results").innerHTML = "Results:";',
     	 '</script>';
	if($_POST['category_id'] != ''){
		$cID =  $_POST['category_id'];
		$sql = "SELECT * FROM book WHERE category_id = '$cID';";
		$result = $conn->query($sql);
		//check if book exists
		if ($result->num_rows == 0) {
			echo "<p>There are no book records with that category ID</p>";
		}
		else {
			while($row = $result->fetch_assoc()){
				echo "<p>ID: ".$row["book_id"]. " <br>book title: ".$row["book_title"]. " <br>category ID: ".$row["category_id"]. " <br>author: ".$row["author"]. 
					" <br>book copies: ".$row["book_copies"]. " <br>book pub: ".$row["book_pub"]. " <br>publisher name: ".$row["publisher_name"]. " <br>isbn: ".$row["isbn"]. 
					" <br>copyright year: ".$row["copyright_year"]. "<br>date added: ".$row["date_added"]. "  <br>status: ".$row["status"]. "</p>";
			}
		}
	}
}
//search by author
if(isset($_POST['search_author'])){
	echo '<script type="text/javascript">',
     	 'document.getElementById("results").innerHTML = "Results:";',
     	 '</script>';
	if($_POST['author'] != ''){
		$book_author=  $_POST['author'];
		$sql = "SELECT * FROM book WHERE author = '$book_author';";
		$result = $conn->query($sql);
		//check if book exists
		if ($result->num_rows == 0) {
			echo "<p>There are no book records with that author </p>";
		}
		else {
			while($row = $result->fetch_assoc()){
				echo "<p>ID: ".$row["book_id"]. " <br>book title: ".$row["book_title"]. " <br>category ID: ".$row["category_id"]. " <br>author: ".$row["author"]. 
					" <br>book copies: ".$row["book_copies"]. " <br>book pub: ".$row["book_pub"]. " <br>publisher name: ".$row["publisher_name"]. " <br>isbn: ".$row["isbn"]. 
					" <br>copyright year: ".$row["copyright_year"]. "<br>date added: ".$row["date_added"]. "  <br>status: ".$row["status"]. "</p>";
			}
		}
	}
}
//search by the copies of a book 
if(isset($_POST['search_bcopies'])){
	echo '<script type="text/javascript">',
     	 'document.getElementById("results").innerHTML = "Results:";',
     	 '</script>';
	if($_POST['book_copies'] != ''){
		$copies=  $_POST['book_copies'];
		$sql = "SELECT * FROM book WHERE book_copies = '$copies';";
		$result = $conn->query($sql);
		//check if book exists
		if ($result->num_rows == 0) {
			echo "<p>There are no book records with that copies </p>";
		}
		else {
			while($row = $result->fetch_assoc()){
				echo "<p>ID: ".$row["book_id"]. " <br>book title: ".$row["book_title"]. " <br>category ID: ".$row["category_id"]. " <br>author: ".$row["author"]. 
					" <br>book copies: ".$row["book_copies"]. " <br>book pub: ".$row["book_pub"]. " <br>publisher name: ".$row["publisher_name"]. " <br>isbn: ".$row["isbn"]. 
					" <br>copyright year: ".$row["copyright_year"]. "<br>date added: ".$row["date_added"]. "  <br>status: ".$row["status"]. "</p>";
			}
		}
	}
}
//search by the publisher of the book
if(isset($_POST['search_bpub'])){
	echo '<script type="text/javascript">',
     	 'document.getElementById("results").innerHTML = "Results:";',
     	 '</script>';
	if($_POST['book_pub'] != ''){
		$pub =  $_POST['book_pub'];
		$sql = "SELECT * FROM book WHERE book_pub = '$pub';";
		$result = $conn->query($sql);
		//check if book exists
		if ($result->num_rows == 0) {
			echo "<p>There are no book records with that publisher</p>";
		}
		else {
			while($row = $result->fetch_assoc()){
				echo "<p>ID: ".$row["book_id"]. " <br>book title: ".$row["book_title"]. " <br>category ID: ".$row["category_id"]. " <br>author: ".$row["author"]. 
					" <br>book copies: ".$row["book_copies"]. " <br>book pub: ".$row["book_pub"]. " <br>publisher name: ".$row["publisher_name"]. " <br>isbn: ".$row["isbn"]. 
					" <br>copyright year: ".$row["copyright_year"]. "<br>date added: ".$row["date_added"]. "  <br>status: ".$row["status"]. "</p>";
			}
		}
	}
}
//search by the publisher name of the book
if(isset($_POST['search_pubname'])){
	echo '<script type="text/javascript">',
     	 'document.getElementById("results").innerHTML = "Results:";',
     	 '</script>';
	if($_POST['publisher_name'] != ''){
		$pubname =  $_POST['publisher_name'];
		$sql = "SELECT * FROM book WHERE publisher_name = '$pubname';";
		$result = $conn->query($sql);
		//check if book exists
		if ($result->num_rows == 0) {
			echo "<p>There are no book records with that publisher name</p>";
		}
		else {
			while($row = $result->fetch_assoc()){
				echo "<p>ID: ".$row["book_id"]. " <br>book title: ".$row["book_title"]. " <br>category ID: ".$row["category_id"]. " <br>author: ".$row["author"]. 
					" <br>book copies: ".$row["book_copies"]. " <br>book pub: ".$row["book_pub"]. " <br>publisher name: ".$row["publisher_name"]. " <br>isbn: ".$row["isbn"]. 
					" <br>copyright year: ".$row["copyright_year"]. "<br>date added: ".$row["date_added"]. "  <br>status: ".$row["status"]. "</p>";
			}
		}
	}
}
if(isset($_POST['search_isbn'])){
	echo '<script type="text/javascript">',
     	 'document.getElementById("results").innerHTML = "Results:";',
     	 '</script>';
	if($_POST['isbn'] != ''){
		$bisbn=  $_POST['isbn'];
		$sql = "SELECT * FROM book WHERE isbn = '$bisbn';";
		$result = $conn->query($sql);
		//check if book exists
		if ($result->num_rows == 0) {
			echo "<p>There are no book records with that ibsn</p>";
		}
		else {
			while($row = $result->fetch_assoc()){
				echo "<p>ID: ".$row["book_id"]. " <br>book title: ".$row["book_title"]. " <br>category ID: ".$row["category_id"]. " <br>author: ".$row["author"]. 
					" <br>book copies: ".$row["book_copies"]. " <br>book pub: ".$row["book_pub"]. " <br>publisher name: ".$row["publisher_name"]. " <br>isbn: ".$row["isbn"]. 
					" <br>copyright year: ".$row["copyright_year"]. "<br>date added: ".$row["date_added"]. "  <br>status: ".$row["status"]. "</p>";
			}
		}
	}
}
//search by copyright year
if(isset($_POST['search_cpyyr'])&&is_numeric($_POST['copyright_year'])){
	echo '<script type="text/javascript">',
     	 'document.getElementById("results").innerHTML = "Results:";',
     	 '</script>';
	if($_POST['copyright_year'] != ''){
		$cpyyr =  $_POST['copyright_year'];
		$sql = "SELECT * FROM book WHERE copyright_year = '$cpyyr';";
		$result = $conn->query($sql);
		//check if book exists
		if ($result->num_rows == 0) {
			echo "<p>There are no book records with that copyright year</p>";
		}
		else {
			while($row = $result->fetch_assoc()){
				echo "<p>ID: ".$row["book_id"]. " <br>book title: ".$row["book_title"]. " <br>category ID: ".$row["category_id"]. " <br>author: ".$row["author"]. 
					" <br>book copies: ".$row["book_copies"]. " <br>book pub: ".$row["book_pub"]. " <br>publisher name: ".$row["publisher_name"]. " <br>isbn: ".$row["isbn"]. 
					" <br>copyright year: ".$row["copyright_year"]. "<br>date added: ".$row["date_added"]. "  <br>status: ".$row["status"]. "</p>";
			}
		}
	}
}
if(isset($_POST['search_cpyyr'])&&!is_numeric($_POST['copyright_year'])){
	echo "<p>Please only enter valid year <br>numbers when searching with copyright year</p>";
}

//search by date added
if(isset($_POST['search_dateadd'])){
	echo '<script type="text/javascript">',
     	 'document.getElementById("results").innerHTML = "Results:";',
     	 '</script>';
	if($_POST['date_added'] != ''){
		$date=$_POST['date_added']." ".$_POST['time_added'];
		$sql = "SELECT * FROM book WHERE date_added = '$date';";
		$result = $conn->query($sql);
		//check if book exists
		if ($result->num_rows == 0) {
			echo "<p>There are no book records with that date </p>";
		}
		else {
			while($row = $result->fetch_assoc()){
				echo "<p>ID: ".$row["book_id"]. " <br>book title: ".$row["book_title"]. " <br>category ID: ".$row["category_id"]. " <br>author: ".$row["author"]. 
					" <br>book copies: ".$row["book_copies"]. " <br>book pub: ".$row["book_pub"]. " <br>publisher name: ".$row["publisher_name"]. " <br>isbn: ".$row["isbn"]. 
					" <br>copyright year: ".$row["copyright_year"]. "<br>date added: ".$row["date_added"]. "  <br>status: ".$row["status"]. "</p>";
			}
		}
	}
}

$status = filter_input(INPUT_POST, 'book_status', FILTER_SANITIZE_STRING);

//search by book status
if(isset($_POST['search_status'])){
	echo '<script type="text/javascript">',
     	 'document.getElementById("results").innerHTML = "Results:";',
     	 '</script>';
	if($status){
		$sql = "SELECT * FROM book WHERE status = '$status';";
		$result = $conn->query($sql);
		//check if book exists
		if ($result->num_rows == 0) {
			echo "<p>There are no records of " . $status . " books .</p><";
		}
		else {
			while($row = $result->fetch_assoc()){
				echo "<p>ID: ".$row["book_id"]. " <br>book title: ".$row["book_title"]. " <br>category ID: ".$row["category_id"]. " <br>author: ".$row["author"]. 
					" <br>book copies: ".$row["book_copies"]. " <br>book pub: ".$row["book_pub"]. " <br>publisher name: ".$row["publisher_name"]. " <br>isbn: ".$row["isbn"]. 
					" <br>copyright year: ".$row["copyright_year"]. "<br>date added: ".$row["date_added"]. "  <br>status: ".$row["status"]. "</p>";
			}
		}
	}
}
?>
</div>
<br><br>
<div class='displayingForm'> 
	<form method = "post">
		<p>Type in the ID you want to search <br>and press the Submit button.</p>
		<input type = "text" name = "book_id" placeholder = "Book ID"><br><br>
		<button type = "submit" name = "search_ID">Submit!</button><br><br>
	</form>
	<form method = "post">
			<p>Type in the title of the book  you want to <br>search and press the Submit button.</p>
			<input type = "text" name = "book_title" placeholder = "Book title"><br><br>
			<button type = "submit" name = "search_btitle">Submit!</button><br><br>
	</form>
	<form method = "post">
			<p>Type in the catergory ID of the book you want to <br>search and press the Submit button.</p>
			<input type = "text" name = "category_id" placeholder = "category ID"><br><br>
			<button type = "submit" name = "search_cID">Submit!</button><br><br>
	</form>
	<form method = "post">
			<p>Type in the author of the book you want to <br>search and press the Submit button.</p>
			<input type = "text" name = "author" placeholder = "Author name"><br><br>
			<button type = "submit" name = "search_author">Submit!</button><br><br>
	</form>
	<form method = "post">
			<p>Type in the copies of a book you want to <br>search and press the Submit button.</p>
			<input type = "text" name = "book_copies" placeholder = "copies of book"><br><br>
			<button type = "submit" name = "search_bcopies">Submit!</button><br><br>
	</form>
	<form method = "post">
			<p>Type in the book publisher you want to <br>search and press the Submit button.</p>
			<input type = "text" name = "book_pub" placeholder = "Publisher"><br><br>
			<button type = "submit" name = "search_bpub">Submit!</button><br><br>
	</form>
	<form method = "post">
			<p>Type in the publisher name of the book you want to <br>search and press the Submit button.</p>
			<input type = "text" name = "publisher_name" placeholder = "Publisher name"><br><br>
			<button type = "submit" name = "search_pubname">Submit!</button><br><br>
	</form>
	<form method = "post">
			<p>Type in the isbn of the book you want to <br>search and press the Submit button.</p>
			<input type = "text" name = "isbn" placeholder = "ISBN"><br><br>
			<button type = "submit" name = "search_isbn">Submit!</button><br><br>
	</form>
	<form method = "post">
			<p>Type in the copyright year of the book you want to <br>search and press the Submit button.</p>
			<input type = "text" name = "copyright_year" placeholder = "Copyright Year"><br><br>
			<button type = "submit" name = "search_cpyyr">Submit!</button><br><br>
	</form>
	<form method = "post">
			<p>Type in the date added of the book you want to <br>search and press the Submit button.</p>
			<input type="date" name="date_added"><br><br>
			<input value="00:00:00" type="time" name="time_added" step="1"><br><br>
			<button type = "submit" name = "search_dateadd">Submit!</button><br><br>
	</form>
	<form method = "post">
			<p>Please select the year level you are <br>searching for.</p>
			<select name = "book_status">
				<option value = "Old">Old</option>
				<option value = "New">New</option>
				<option value = "Damage">Damage</option>
				<option value = "Lost">Lost</option>
				<option value = "Archive">Archive</option>
			</select>
			<br><br>
			<button type = "submit" name = "search_status">Submit!</button><br><br>
		</form>
</div>

<br><br>
<div class='displayingForm'>
	<a href="index.php">Click here to go back to main page</a><br><br>
	<a href="bookLand.php">Click here to go back to the Books landing page</a>
</div>
