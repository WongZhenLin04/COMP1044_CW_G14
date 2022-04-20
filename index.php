<!--Login page-->
<?php
	include 'header.php';
?>
<div class='selection'>
	<h1>Please Login <br>to your account:</h1>
	<p id="error"></p>
	<!--start of form-->
	<form name="f1" method = "POST">
		<p>Username:</p> 
		<input type = "text" name  = "username" />
		<p>Password:</p>
		<input type = "password" name  = "password" />
		<br><br>
		<button type="submit" name="login">Login!</button> 
	</form>
	<br>   
</div>
<?php
//checking for login validitity code
	if (isset($_POST['login'])&&$_POST['username']!=''&&$_POST['password']!=''){
		//preventing weird inputs
		$username = $_POST['username'];  
		$password = $_POST['password'];
		$username = stripcslashes($username);  
   	 	$password = stripcslashes($password);  
   	 	$username = mysqli_real_escape_string($conn, $username);  
    	$password = mysqli_real_escape_string($conn, $password);
    	//check in database if login details are correct
    	$sql="SELECT * FROM users WHERE username='$username' && password='$password';";
    	$result = $conn->query($sql);
    	$row = $result->fetch_assoc();
    	$count = mysqli_num_rows($result);
    	if($count == 1){  
            echo '<meta http-equiv="refresh" content="0; URL=land.php" />';  
        }
        else{
        	echo '<script type="text/javascript">',
     		 'document.getElementById("error").innerHTML = "Username or Password is incorrect!";',
     		 '</script>';
        }    
	}
	//if username or password is empty
	if (isset($_POST['login'])&&($_POST['username']==''||$_POST['password']=='')){
		echo '<script type="text/javascript">',
     		 'document.getElementById("error").innerHTML = "Please don\'t leave any of the fields empty!";',
     		 '</script>';
	}
?>