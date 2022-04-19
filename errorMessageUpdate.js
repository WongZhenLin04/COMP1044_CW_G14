//function for handling update error
function errorHandling(error,subError) {
	switch (error){
		case 1:
			document.getElementById("error").innerHTML = "Error updating name: ";
			break;
		case 2:
			document.getElementById("error").innerHTML = "Error updating gender: ";
			break;
		case 3:
			document.getElementById("error").innerHTML = "Error updating address: ";
			break;
		case 4:
			document.getElementById("error").innerHTML = "Error updating contact: ";
			break;
		case 5:
			document.getElementById("error").innerHTML = "Error updating year level: ";
			break;
		case 6:
			document.getElementById("error").innerHTML = "Error updating status: ";
			break;
		case 7:
			document.getElementById("error").innerHTML = "Error updating date returned: ";
			break;
		case 8:
			document.getElementById("error").innerHTML = "Error updating date borrowed: ";
			break;
		case 9:
			document.getElementById("error").innerHTML = "Error updating due date: ";
			break;
	}
	switch (subError){
		case 1:
			document.getElementById("subError").innerHTML = "Please Don't leave the ID box empty";
			break;
		case 2:
			document.getElementById("subError").innerHTML = "Please enter only alphabets";
			break;
		case 3:
			document.getElementById("subError").innerHTML = "Don't leave all the information boxes empty";
			break;
		case 4:
			document.getElementById("subError").innerHTML = "The ID entered does not exist";
			break;
		case 5:
			document.getElementById("subError").innerHTML = "Please enter only numbers";
			break;
	}
}