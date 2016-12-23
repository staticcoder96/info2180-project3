<?php
$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'ChepoMail';

//Get information from user.
$first = $_POST['firstname']; 
$last = $_POST['lastname'];
$user = $_POST['username'];
$mail = $_POST['email'];
$pass = $_POST['pass'];
$cpass = $_POST['password_confirm'];
$subject = $_POST['subject'];
$body = $_POST['message'];

//Setup sql connection to database.
$con = new PDO("mysql:host=$host; dbname=$dbname", "$username", "$password");
if(!$con){
	die("Could not Connect to Database");
}
if(isset($_POST['register'])){
	//inserting data into the User table
	
	$add = $con->prepare("INSERT INTO User (firstname,lastname,username,password) 
						VALUES ('$first','$last','$user','$pass')");

	
	echo "Information Added Successfully";
}
$con->close();

?>

<script>
//Ajax request for registration
document.getElementsByClassName("btn btn-success btn-md btn-block").onclick = function(){request();};

function request(){
	var request = new XMLHttpRequest();
	var feedback = "Information Added Successfully"; 
	
	if(!request){
		alert("Bad Request");
		return false;
	} 
	else{
		request.onreadystatechange = function(){
			if(request.readyState === 4 && request.status === 200){
				feedback.innerHTML = request.responseText;
				//document.getElementsByClassName("registration-form").innerHTML = request.responseText;
			}
			else{
				console.log("Error");
				}
		};
		request.open("POST", "register.php?" +feedback, true);
		request.send();
	}
	
}


</script>