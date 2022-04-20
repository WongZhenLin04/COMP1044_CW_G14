<!--delete member landing page-->
<?php
	include 'header.php';
?>
<div class='displayingForm'>
	<h1>Delete member Form</h1>
	<p id="error">please fill in the ID in each <br>field first before clicking on delete</p>
	<p id="subError"></p>
</div>
<br><br>

<?php


if (isset($_POST['deleteMember']) && $_POST['member_id']!= '') {
	$sql = "SELECT * FROM `member` WHERE member_id = '" . $_POST['member_id'] . "'";
	$result = $conn->query($sql);
	if ($result->num_rows != 0) {
		$ID=$_POST['member_id'];
		$sql = "SELECT * FROM borrowdetails INNER JOIN member ON member.member_id=borrowdetails.member_id WHERE borrowdetails.member_id='$ID'";
		$result = $conn->query($sql);
		if ($result -> num_rows == 0) {
			echo "here";
			$sql = "DELETE FROM member WHERE member_id = '$ID'";
			if ($conn->query($sql) === TRUE) {
				echo '<script type="text/javascript">', 'document.getElementById("error").innerHTML = "Member deleted succesfully";', '</script>';
			} 
		}
		else {
			echo '<script type="text/javascript">', 'document.getElementById("error").innerHTML = "Error deleting member: <br><br>Member is borrowing a book";', '</script>';
		} 
	}
	else{
		echo '<script type="text/javascript">', 'document.getElementById("error").innerHTML = "Error deleting member: <br><br>Member does not exist";', '</script>';
	}
}
else if (isset($_POST['deleteMember']) && $_POST['member_id'] =='' ) {
		echo '<script type="text/javascript">',
     		 'document.getElementById("error").innerHTML = "Error deleting member:<br><br> Please don\'t leave the ID field empty";',
     		 '</script>';
}
?>


<!--add code between here-->
<div class="displayingForm">

<form class="deleteMember" action="deleteMember.php" method="post">
	<h2>Insert Member ID to delete: </h2>
	<input type="text" id="member_id" name="member_id" placeholder="Member ID"><br><br>
	<button type="submit" name="deleteMember">Delete!</button>
</form>

</div>
<!--add code between here or anywhere reallye-->
<br><br>
<div class='displayingForm'>
	<a href="land.php">Click here to go back to main page</a><br><br>
	<a href="memberLand.php">Click here to go back to the Members landing page</a>
</div>
