<!--search member landing page-->
<!--This section is for Hakeem-->
<?php
	include 'header.php';
?>
<div class='displayingForm'> 
	<h1>Search for a member!</h1>
	<h2 id="results"></h2>
<!--displaying user actions-->
<?php
//search by ID
if(isset($_POST['search_ID'])){
	echo '<script type="text/javascript">',
     	 'document.getElementById("results").innerHTML = "Results:";',
     	 '</script>';
	if($_POST['member_id'] != ''){
		$ID =  $_POST['member_id'];
		$sql = "SELECT * FROM member WHERE member_id = '$ID';";
		$result = $conn->query($sql);
		//check if member exists
		if ($result->num_rows == 0) {
			echo "<p>There are no records with that ID</p>";
		}
		else {
			while($row = $result->fetch_assoc()){
				echo "<p>ID: ".$row["member_id"]. "<br>First Name: ".$row["firstname"]. "<br>Last Name: ".$row["lastname"]. "<br>Gender: ".$row["gender"]. 
					"<br>Address: ".$row["address"]. "<br>Contact: ".$row["contact"]. "<br>Type: ".$row["type"]. "<br>Year Level: ".$row["year_level"]. 
					"<br>Status: ".$row["status"]. "</p>";
			}
		}
	}
}
//search by first name
if(isset($_POST['search_fname'])){
	echo '<script type="text/javascript">',
     	 'document.getElementById("results").innerHTML = "Results:";',
     	 '</script>';
	if($_POST['member_fname'] != ''){
		$first_name =  $_POST['member_fname'];
		$sql = "SELECT * FROM member WHERE firstname = '$first_name';";
		$result = $conn->query($sql);
		//check if member exists
		if ($result->num_rows == 0) {
			echo "<p>There are no records with that first name.</p>";
		}
		else {
			while($row = $result->fetch_assoc()){
				echo "<p>ID: ".$row["member_id"]. "<br>First Name: ".$row["firstname"]. "<br>Last Name: ".$row["lastname"]. "<br>Gender: ".$row["gender"]. 
					"<br>Address: ".$row["address"]. "<br>Contact: ".$row["contact"]. "<br>Type: ".$row["type"]. "<br>Year Level: ".$row["year_level"]. 
					"<br>Status: ".$row["status"]. "</p>";
			}
		}
	}
}
//search by last name
if(isset($_POST['search_lname'])){
	echo '<script type="text/javascript">',
     	 'document.getElementById("results").innerHTML = "Results:";',
     	 '</script>';
	if($_POST['member_lname'] != ''){
		$last_name =  $_POST['member_lname'];
		$sql = "SELECT * FROM member WHERE lastname = '$last_name';";
		$result = $conn->query($sql);
		//check if member exists
		if ($result->num_rows == 0) {
			echo "<p>There are no records with that last name.</p>	";
		}
		else {
			while($row = $result->fetch_assoc()){
				echo "<p>ID: ".$row["member_id"]. "<br>First Name: ".$row["firstname"]. "<br>Last Name: ".$row["lastname"]. "<br>Gender: ".$row["gender"]. 
					"<br>Address: ".$row["address"]. "<br>Contact: ".$row["contact"]. "<br>Type: ".$row["type"]. "<br>Year Level: ".$row["year_level"]. 
					"<br>Status: ".$row["status"]. "</p>";
			}
		}
	}
}

$gender = filter_input(INPUT_POST, 'member_gender', FILTER_SANITIZE_STRING);

//search by gender
if(isset($_POST['search_gender'])){
	if($gender){
		echo '<script type="text/javascript">',
     	 'document.getElementById("results").innerHTML = "Results:";',
     	 '</script>';
		$sql = "SELECT * FROM member WHERE gender = '$gender';";
		$result = $conn->query($sql);
		//check if member exists
		if ($result->num_rows == 0) {
			echo "<p>There are no " . $gender . "in the records at the moment.</p>";
		}
		else {
			while($row = $result->fetch_assoc()){
				echo "<p>ID: ".$row["member_id"]. "<br>First Name: ".$row["firstname"]. "<br>Last Name: ".$row["lastname"]. "<br>Gender: ".$row["gender"]. 
					"<br>Address: ".$row["address"]. "<br>Contact: ".$row["contact"]. "<br>Type: ".$row["type"]. "<br>Year Level: ".$row["year_level"]. 
					"<br>Status: ".$row["status"]. "</p>";
			}
		}
	}
}

//search by address
if(isset($_POST['search_address'])){
	echo '<script type="text/javascript">',
     	 'document.getElementById("results").innerHTML = "Results:";',
     	 '</script>';
	if($_POST['member_address'] != ''){
		$address = $_POST['member_address'];
		$sql = "SELECT * FROM member WHERE address = '$address';";
		$result = $conn->query($sql);
		//check if member exists
		if ($result->num_rows == 0) {
			echo "<p>There are no records with that address.</p>";
		}
		else {
			while($row = $result->fetch_assoc()){
				echo "<p>ID: ".$row["member_id"]. "<br>First Name: ".$row["firstname"]. "<br>Last Name: ".$row["lastname"]. "<br>Gender: ".$row["gender"]. 
					"<br>Address: ".$row["address"]. "<br>Contact: ".$row["contact"]. "<br>Type: ".$row["type"]. "<br>Year Level: ".$row["year_level"]. 
					"<br>Status: ".$row["status"]. "</p>";
			}
		}
	}
}
//search by contact
if(isset($_POST['search_contact'])){
	echo '<script type="text/javascript">',
     	 'document.getElementById("results").innerHTML = "Results:";',
     	 '</script>';
	if($_POST['member_contact'] != ''){
		$contact = $_POST['member_contact'];
		$sql = "SELECT * FROM member WHERE contact = '$contact';";
		$result = $conn->query($sql);
		//check if member exists
		if ($result->num_rows == 0) {
			echo "<p>There are no records with that contact.</p>";
		}
		else {
			while($row = $result->fetch_assoc()){
				echo "<p>ID: ".$row["member_id"]. "<br>First Name: ".$row["firstname"]. "<br>Last Name: ".$row["lastname"]. "<br>Gender: ".$row["gender"]. 
					"<br>Address: ".$row["address"]. "<br>Contact: ".$row["contact"]. "<br>Type: ".$row["type"]. "<br>Year Level: ".$row["year_level"]. 
					"<br>Status: ".$row["status"]. "</p>";
			}
		}
	}
}

$type = filter_input(INPUT_POST, 'member_type', FILTER_SANITIZE_STRING);

//search by type
if(isset($_POST['search_type'])){
	if($type){
		echo '<script type="text/javascript">',
     	 'document.getElementById("results").innerHTML = "Results:";',
     	 '</script>';
		$sql = "SELECT * FROM member WHERE type = '$type';";
		$result = $conn->query($sql);
		//check if member exists
		if ($result->num_rows == 0) {
			echo "<p>There are no " . $gender . "in the records at the moment.</p>";
		}
		else {
			while($row = $result->fetch_assoc()){
				echo "<p>ID: ".$row["member_id"]. "<br>First Name: ".$row["firstname"]. "<br>Last Name: ".$row["lastname"]. "<br>Gender: ".$row["gender"]. 
					"<br>Address: ".$row["address"]. "<br>Contact: ".$row["contact"]. "<br>Type: ".$row["type"]. "<br>Year Level: ".$row["year_level"]. 
					"<br>Status: ".$row["status"]. "</p>";
			}
		}
	}
}

$year_level = filter_input(INPUT_POST, 'member_year', FILTER_SANITIZE_STRING);

//search by year level
if(isset($_POST['search_year_level'])){
	echo '<script type="text/javascript">',
     	 'document.getElementById("results").innerHTML = "Results:";',
     	 '</script>';
	if($year_level){
		$sql = "SELECT * FROM member WHERE year_level = '$year_level';";
		$result = $conn->query($sql);
		//check if member exists
		if ($result->num_rows == 0) {
			echo "<p>There are no " . $year_level . " .</p>";
		}
		else {
			while($row = $result->fetch_assoc()){
				echo "<p>ID: ".$row["member_id"]. "<br>First Name: ".$row["firstname"]. "<br>Last Name: ".$row["lastname"]. "<br>Gender: ".$row["gender"]. 
					"<br>Address: ".$row["address"]. "<br>Contact: ".$row["contact"]. "<br>Type: ".$row["type"]. "<br>Year Level: ".$row["year_level"]. 
					"<br>Status: ".$row["status"]. "</p>";
			}
		}
	}
}

$status = filter_input(INPUT_POST, 'member_status', FILTER_SANITIZE_STRING);

//search by status
if(isset($_POST['search_status'])){
	echo '<script type="text/javascript">',
     	 'document.getElementById("results").innerHTML = "Results:";',
     	 '</script>';
	if($status){
		$sql = "SELECT * FROM member WHERE status = '$status';";
		$result = $conn->query($sql);
		//check if member exists
		if ($result->num_rows == 0) {
			echo "<p>There are no " . $status . " members.</p>";
		}
		else {
			while($row = $result->fetch_assoc()){
				echo "<p>ID: ".$row["member_id"]. "<br>First Name: ".$row["firstname"]. "<br>Last Name: ".$row["lastname"]. "<br>Gender: ".$row["gender"]. 
					"<br>Address: ".$row["address"]. "<br>Contact: ".$row["contact"]. "<br>Type: ".$row["type"]. "<br>Year Level: ".$row["year_level"]. 
					"<br>Status: ".$row["status"]. "</p>";
			}
		}
	}
}
?>
</div>
<br><br>
<!-- || Forms || -->
	<div class = 'displayingForm'>
		<!-- search by ID -->
		<form method = "post">
			<p>Type in the ID you want to search <br>and press the Submit button.</p>
			<input type = "text" name = "member_id" placeholder = "Type ID here"><br><br>
			<button type = "submit" name = "search_ID">Submit!</button><br><br>
		</form>
		<form method = "post">
			<p>Type in the first name you want to <br>search and press the Submit button.</p>
			<input type = "text" name = "member_fname" placeholder = "Type first name here"><br><br>
			<button type = "submit" name = "search_fname">Submit!</button><br><br>
		</form>
		<form method = "post">
			<p>Type in the last name you want to<br> search and press the Submit button.</p>
			<input type = "text" name = "member_lname" placeholder = "Type last name here"><br><br>
			<button type = "submit" name = "search_lname">Submit!</button><br><br>
		</form>
		<form method = "post">
			<p>Select the gender you want to search <br>and press the Submit button.</p>
			<select name = "member_gender">
				<option value = "Male">Male</option>
				<option value = "Female">Female</option>
			</select>
			<br><br>
			<button type = "submit" name = "search_gender">Submit!</button><br><br>
		</form>
		<form method = "post">
			<p>Type in the address you want to <br>search and press the Submit button.</p>
			<input type = "text" name = "member_address" placeholder = "Type address here"><br><br>
			<button type = "submit" name = "search_address">Submit!</button><br><br>
		</form>
		<form method = "post">
			<p>Type in the contact	you want to <br>search and press the Submit button.</p>
			<input type = "text" name = "member_contact" placeholder = "Type contact here"><br><br>
			<button type = "submit" name = "search_contact">Submit!</button><br><br>
		</form>
		<form method = "post">
			<p>Select in the type you want to <br>search and press the Submit button.</p>
			<select name = "member_type">
				<option value = "Teacher">Teacher</option>
				<option value = "Student">Student</option>
			</select>
			<br><br>
			<button type = "submit" name = "search_type">Submit!</button><br><br>	
		</form>
		<form method = "post">
			<p>Please select the year level you are <br>searching for.</p>
			<select name = "member_year">
				<option value = "First Year">First Year</option>
				<option value = "Second Year">Second Year</option>
				<option value = "Third Year">Third Year</option>
				<option value = "Fourth Year">Fourth Year</option>
				<option value = "Faculty">Faculty</option>
			</select>
			<br><br>
			<button type = "submit" name = "search_year_level">Submit!</button><br><br>
		</form>
		<form method = "post">
			<p>Select the status you want to <br>search and press the Submit button.</p>
			<select name = "member_status">
				<option value = "Active">Active</option>
				<option value = "Banned">Banned</option>
			</select>
			<br><br>
			<button type = "submit" name = "search_status">Submit!</button><br><br>	
		</form>
	</div>
<!--add code between here or anywhere really-->
<br><br>
<div class='displayingForm'>
	<a href="land.php">Click here to go back to main page</a><br><br>
	<a href="memberLand.php">Click here to go back to the Members landing page</a>
</div>