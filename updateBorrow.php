<!--update borrow details landing page-->
<?php
	include 'header.php';
?>
<script type="text/javascript" src="errorMessageUpdate.js"></script>
<br><br><br>
<div class='displayingForm'>
	<h1>Update Borrow Details Form:</h1>
	<p id="error">please fill in the ID in each <br>field first before clicking on update</p>
	<p id="subError"></p>
	<p id="warning"></p>
<?php
		//for status
		//=======================================================================================================================
		if (isset($_POST['updateStatus'])&&$_POST['borrowDetailsId']!=''){
			//check to see if ID entered exists
			$ID=$_POST['borrowDetailsId'];
			$sql="SELECT * FROM borrowdetails WHERE borrow_details_id='$ID';";
				$result = $conn->query($sql);
				if ($result->num_rows == 0) {
					echo '<script type="text/javascript">',
     			 		 'errorHandling(6,4)',
     			 		 '</script>';
				}
				else{
					$ID=$_POST['borrowDetailsId'];
					$newStatus=$_POST['newStatus'];
					$sql = "UPDATE borrowdetails SET borrow_status='$newStatus' WHERE borrow_details_id='$ID';";
					if ($conn->query($sql) === TRUE) {
					echo '<script type="text/javascript">',
     			 		 'document.getElementById("error").innerHTML = "Status updated succesfully!";',
     			 		 '</script>';
					}
				} 
		}
		//if id box is empty
		else if (isset($_POST['updateStatus'])&&$_POST['borrowDetailsId']==''){
			echo '<script type="text/javascript">',
     			 'errorHandling(6,1)',
     			 '</script>';
		}
		//=======================================================================================================================
		//for Date return
		//=======================================================================================================================
		else if (isset($_POST['updateDate'])&&$_POST['borrowDetailsIdDate']!=''&&$_POST['returnedDate']!=''){
			//check to see if ID entered exists
			$dateID=$_POST['borrowDetailsIdDate'];
			$sql="SELECT * FROM borrowdetails WHERE borrow_details_id='$dateID';";
			$result = $conn->query($sql);
			if ($result->num_rows == 0) {
				echo '<script type="text/javascript">',
     				 'errorHandling(7,4)',
     				 '</script>';
			}
			else{
				//things to be put into the database
				$newDateTime=$_POST['returnedDate']." ".$_POST['returnedTime'];
				$sql = "UPDATE borrowdetails SET date_return='$newDateTime' WHERE borrow_details_id='$dateID';";
				if ($conn->query($sql) === TRUE) {
					echo '<script type="text/javascript">',
     			 	 'document.getElementById("error").innerHTML = "Date returned updated succesfully!";',
     			 	 '</script>';
     			 	 //check if the returned date entered is before borrowed date, if yes, issue warning
     			 	 $sql="SELECT * FROM borrowdetails WHERE (date_return < date_borrow && borrow_details_id=$dateID);";
     			 	 $result = $conn->query($sql);
     			 	 if ($result->num_rows != 0) {
						echo '<script type="text/javascript">',
     				 	 	 'document.getElementById("warning").innerHTML = "<b>Warning:</b> <br><br> The returned date you have entered is before <br> the borrowed date, please check the returned date <br> again to make sure this is correct";',
     				 		 '</script>';
     				 	$row = $result->fetch_assoc();
     				 	echo '<p><b>Current Borrow Date <br> for Borrow Details ID '.$dateID.': </b><br><br>'.$row['date_borrow'].'</p>'; ;
					}
					//check if the returned date is after the due date, if yes, inform
					else{
						$sql="SELECT * FROM borrowdetails WHERE (date_return > due_date && borrow_details_id=$dateID);";
     			 		$result = $conn->query($sql);
     			 	 	if ($result->num_rows != 0) {
							echo '<script type="text/javascript">',
     				 		 	 'document.getElementById("warning").innerHTML = "<b>Warning:</b> <br><br> The returned date you have entered is after <br> the due date, please inform the member with the member ID of:";',
     				 			 '</script>';
							$row = $result->fetch_assoc();
							echo '<p><b>'.$row['member_id'].'</b></p>';
						}
					}
				} 
			}
		}
		//if date is empty
		else if (isset($_POST['updateDate'])&&$_POST['returnedDate']==''){
			echo '<script type="text/javascript">',
     			 'errorHandling(7,3)',
     			 '</script>';
		}
		//if ID is empty
		else if (isset($_POST['updateDate'])&&$_POST['borrowDetailsIdDate']==''){
			echo '<script type="text/javascript">',
     			 'errorHandling(7,1)',
     			 '</script>';
		}
		//=======================================================================================================================
		//for Date borrow
		//=======================================================================================================================
		else if (isset($_POST['updateBorrowDate'])&&$_POST['borrowDetailsIdDateBorrow']!=''&&$_POST['borrowedDate']!=''){
			//check to see if ID entered exists
			$dateID=$_POST['borrowDetailsIdDateBorrow'];
			$sql="SELECT * FROM borrowdetails WHERE borrow_details_id='$dateID';";
			$result = $conn->query($sql);
			if ($result->num_rows == 0) {
				echo '<script type="text/javascript">',
     			 	 'errorHandling(8,4)',
     			 	 '</script>';
			}
			else{
				//things to be put into the database
				$newDateTime=$_POST['borrowedDate']." ".$_POST['borrowedTime'];
				$dateID=$_POST['borrowDetailsIdDateBorrow'];
				$sql = "UPDATE borrowdetails SET date_borrow='$newDateTime' WHERE borrow_details_id='$dateID';";
				if ($conn->query($sql) === TRUE) {
					echo '<script type="text/javascript">',
     			 	 	 'document.getElementById("error").innerHTML = "Borrowed Date updated succesfully!";',
     			 		 '</script>';
     			 	//check if the returned date entered is before returned date, if yes, issue warning
     			 	$sql="SELECT * FROM borrowdetails WHERE (date_return < date_borrow && borrow_details_id=$dateID);";
     			 	$result = $conn->query($sql);
     			 	if ($result->num_rows != 0) {
						echo '<script type="text/javascript">',
     				 	 	 'document.getElementById("warning").innerHTML = "<b>Warning:</b> <br><br> The borrowed date you have entered is after <br> the returned date, please check the borrowed date <br> again to make sure this is correct";',
     				 		 '</script>';
     				 	$row = $result->fetch_assoc();
     				 	echo '<p><b>Current Return Date <br> for Borrow Details ID '.$dateID.': </b><br><br>'.$row['date_return'].'</p>'; ;
					}
					//check if the returned date entered is after due date, if yes, issue warning, unlikely but just in case
					else{
						$sql="SELECT * FROM borrowdetails WHERE (date_borrow > due_date && borrow_details_id=$dateID);";
     			 		$result = $conn->query($sql);
     			 		if ($result->num_rows != 0) {
							echo '<script type="text/javascript">',
     				 	 		 'document.getElementById("warning").innerHTML = "<b>Warning:</b> <br><br> The borrowed date you have entered is after <br> the due date, please check the borrowed date <br> again to make sure this is correct";',
     				 			 '</script>';
     				 		$row = $result->fetch_assoc();
     				 		echo '<p><b>Current Due Date <br> for Borrow Details ID '.$dateID.': </b><br><br>'.$row['due_date'].'</p>'; ;
						}
					}
				}
			}
		}
		//if date is empty
		else if (isset($_POST['updateBorrowDate'])&&$_POST['borrowedDate']==''){
			echo '<script type="text/javascript">',
     			 'errorHandling(8,3)',
     			 '</script>';
		}
		//if ID is empty
		else if (isset($_POST['updateBorrowDate'])&&$_POST['borrowDetailsIdDateBorrow']==''){
			echo '<script type="text/javascript">',
     			 'errorHandling(8,1)',
     			 '</script>';
		}
		//=======================================================================================================================
		//for due date
		//=======================================================================================================================
		else if (isset($_POST['updateDueDate'])&&$_POST['borrowDetailsIdDateDue']!=''&&$_POST['dueDate']!=''){
			//check to see if ID entered exists
			$dateID=$_POST['borrowDetailsIdDateDue'];
			$sql="SELECT * FROM borrowdetails WHERE borrow_details_id='$dateID';";
			$result = $conn->query($sql);
			if ($result->num_rows == 0) {
				echo '<script type="text/javascript">',
     			 	 'errorHandling(9,4)',
     			 	 '</script>';
			}
			else{
				//things to be put into the database
				$newDateTime=$_POST['dueDate']." ".$_POST['dueTime'];
				$sql = "UPDATE borrowdetails SET due_date='$newDateTime' WHERE borrow_details_id='$dateID';";
				if ($conn->query($sql) === TRUE) {
					echo '<script type="text/javascript">',
     			 	 	 'document.getElementById("error").innerHTML = "Due Date updated succesfully!";',
     			 		 '</script>';
     			 	 //check if the due date entered is before borrowed date, if yes, issue warning
     			 	$sql="SELECT * FROM borrowdetails WHERE (due_date < date_borrow && borrow_details_id=$dateID);";
     			 	$result = $conn->query($sql);
     			 	if ($result->num_rows != 0) {
						echo '<script type="text/javascript">',
     				 	 	 'document.getElementById("warning").innerHTML = "<b>Warning:</b> <br><br> The due date you have entered is before <br> the borrowed date, please check the due date <br> again to make sure this is correct";',
     				 		 '</script>';
     				 	$row = $result->fetch_assoc();
     				 	echo '<p><b>Current Borrow Date <br> for Borrow Details ID '.$dateID.': </b><br><br>'.$row['date_borrow'].'</p>'; ;
					}
					//check if the due date entered is before returned date, if yes, issue warning
					else{
						$sql="SELECT * FROM borrowdetails WHERE (due_date < date_return && borrow_details_id=$dateID);";
     			 		$result = $conn->query($sql);
     			 		if ($result->num_rows != 0) {
							echo '<script type="text/javascript">',
     				 	 		 'document.getElementById("warning").innerHTML = "<b>Warning:</b> <br><br> The due date you have entered is before <br> the returned date, please check the due date <br> again to make sure this is correct";',
     				 			 '</script>';
     				 		$row = $result->fetch_assoc();
     				 		echo '<p><b>Current Returned Date <br> for Borrow Details ID '.$dateID.': </b><br><br>'.$row['date_return'].'</p>'; ;
						}
					}
				} 
			}
		}
		//if date is empty
		else if (isset($_POST['updateDueDate'])&&$_POST['dueDate']==''){
			echo '<script type="text/javascript">',
     			 'errorHandling(9,3)',
     			 '</script>';
		}
		//if ID is empty
		else if (isset($_POST['updateDueDate'])&&$_POST['borrowDetailsIdDateDue']==''){
			echo '<script type="text/javascript">',
     			 'errorHandling(9,1)',
     			 '</script>';
		}
		//=======================================================================================================================
	?>
</div>
<br><br>
<div class='displayingForm'>
	<h2>Update Borrow Status:</h2>
	<!--form for updating status-->
	<Form method="post">
		<input type="text" name="borrowDetailsId" placeholder="Borrow Details Id..."><br><br>
		<select name="newStatus">
  			<option value="returned">returned</option>
  			<option value="pending">pending</option>
  		</select>
		<br><br>
  		<button type="submit" name="updateStatus">Update!</button>
	</Form>
	<!--form for date borrowed-->
	<h2>Update Date Borrowed:</h2>
	<p>time format: hh:mm:ss PM/AM</p>
	<Form method="post">
		<input type="text" name="borrowDetailsIdDateBorrow" placeholder="Borrow Details Id..."><br><br>
		<input type="date" name="borrowedDate"><br><br>
		<input value="00:00:00" type="time" name="borrowedTime" step="1">
		<br><br>
  		<button type="submit" name="updateBorrowDate">Update!</button><br><br>
	</Form>
	<!--form for date returned-->
	<h2>Update Date Returned:</h2>
	<p>time format: hh:mm:ss PM/AM</p>
	<Form method="post">
		<input type="text" name="borrowDetailsIdDate" placeholder="Borrow Details Id..."><br><br>
		<input type="date" name="returnedDate"><br><br>
		<input value="00:00:00" type="time" name="returnedTime" step="1">
		<br><br>
  		<button type="submit" name="updateDate">Update!</button><br><br>
	</Form>
	<!--form for due date-->
	<h2>Update Due Date:</h2>
	<p>time format: hh:mm:ss PM/AM</p>
	<Form method="post">
		<input type="text" name="borrowDetailsIdDateDue" placeholder="Borrow Details Id..."><br><br>
		<input type="date" name="dueDate"><br><br>
		<input value="00:00:00" type="time" name="dueTime" step="1">
		<br><br>
  		<button type="submit" name="updateDueDate">Update!</button><br><br>
	</Form>
</div>
<br><br>
<div class='displayingForm'>
	<a href="land.php">Click here to go back to main page</a><br><br>
	<a href="bookLand.php">Click here to go back to the Books landing page</a>
</div>