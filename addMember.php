<!--add member landing page-->
<?php
	include 'header.php';
?>
<div class='displayingForm'> 
	<h1>Add Member Form</h1>
	<p id="error"></p>

<?php


 if(isset($_POST['addMember']))
{	 
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$gender = $_POST['gender'];
	$address = $_POST['address'];
	$contact = $_POST['contact']; 
	$type = $_POST['type']; 
	$year_level = $_POST['year_level'];
	$status = $_POST['status'];
	$checkfirstname = str_replace(' ', '', $firstname);
	$checklastname = str_replace(' ', '', $lastname);
	//check if all fields are filled
	if (empty($firstname) OR empty($lastname) OR empty($gender) OR empty($address) OR empty($type) OR empty($year_level) OR empty($status))
	{
		echo '<script type="text/javascript">',
     		 'document.getElementById("error").innerHTML = "Error adding member:<br><br>Please fill in all the boxes";',
     		 '</script>';
    }
	//if no contact number, $contact is NULL
	else
	{
		//check if member already exists with the same details
		$check="SELECT * FROM member WHERE firstname = '$firstname' AND lastname = '$lastname' AND gender = '$gender' AND address = '$address' AND contact = '$contact' AND type = '$type' AND year_level = '$year_level' AND status = '$status'";
   	 	$result = $conn->query($check);
	
    	if ($result->num_rows > 0) 
		{
      	  echo '<script type="text/javascript">',
     		   'document.getElementById("error").innerHTML = "Error adding member: <br><br>Member already exists";',
     		   '</script>';
		}
		else 
		{
			if (!is_numeric($contact)){
				echo '<script type="text/javascript">',
     		   		 'document.getElementById("error").innerHTML = "Error adding member: <br><br>Please only enter numbers for contact";',
     		   		 '</script>';
			}
			else if(!ctype_alpha($checkfirstname)||!ctype_alpha($checklastname)){
				echo '<script type="text/javascript">',
     		   		 'document.getElementById("error").innerHTML = "Error adding member: <br><br>Please only enter alphabets for <br><br>first name and last name";',
     		   		 '</script>';
			}
			else{
	  			$addsql = "INSERT INTO member (firstname, lastname, gender, address, contact, type, year_level, status) VALUES ('$firstname','$lastname','$gender','$address', '$contact', '$type', '$year_level', '$status')";
	   			if ($conn->query($addsql) === TRUE)
	   			{
	       			echo'<script type="text/javascript">',
     		   		 	'document.getElementById("error").innerHTML = "Member succesfully added";',
     		   			'</script>';
	   			}
	   		}
		}
	}
}
// ===========================================================================================================
?>
</div><br><br>

<div class='displayingForm'>

	<Form method="post">
		<h2>First name:</h2>
		<input type="text" name="firstname" placeholder="First Name"><br><br>
		<h2>Last name:</h2>
		<input type="text" name="lastname" placeholder="Last Name"><br><br>
		<h2>Gender:</h2>
		<select name="gender">
  			<option value="Male">Male</option>
  			<option value="Female">Female</option>
  		</select><br><br>
		<h2>Address:</h2>
		<input type="text" name="address" placeholder="Address"><br><br>
		<h2>Contact:</h2>
		<input type="text" name="contact" placeholder="Contact"><br><br>
		<h2>Type:</h2>
		<select name="type">
  			<option value="Student">Student</option>
			<option value="Teacher">Teacher</option>
			<option value="Non-Teaching">Non-Teaching</option>
  			<option value="Employee">Employee</option>
			<option value="Contruction">Contruction</option>
  		</select><br><br>
		<h2>Year Level:</h2>
		<select name="year_level">
  			<option value="First Year">First Year</option>
			<option value="Second Year">Second Year</option>
			<option value="Third Year">Third Year</option>
  			<option value="Faculty">Faculty</option>
  		</select><br><br>
		<h2>Status:</h2>
		<select name="status">
  			<option value="Active">Active</option>
  			<option value="Banned">Banned</option>
  		</select><br><br>
		
		<button type="submit" name="addMember">Add Member!</button><br><br>
		
	</Form>
	
</div>


?>



<!--add code between here-->
<br><br>
<div class='displayingForm'>
	<a href="land.php">Click here to go back to main page</a><br><br>
	<a href="memberLand.php">Click here to go back to the Members landing page</a>
</div>