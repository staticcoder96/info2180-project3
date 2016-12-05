<? php
$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'ChepoMail';

if($_POST['send'] == Send){
	mail($recipient,$subject,$body,);
	$ack = "Message sent";
	}
	$recipient = $_POST['to'];
	$subject = $_POST['subject'];
	$body = $_POST['message'];
	
$message = <<<EMAIL	
To: $recipient
Purpose: $subject
$body
EMAIL;


//Get information from user.
$subject = $_POST['subject'];
$body = $_POST['message'];

//Setup sql connection to database.
$con = new PDO("mysql:host=$host; dbname=$dbname", "$username", "$password");
if(!$con){
	die("Could not Connect to Database");
}
if(isset($_POST['send'])){
	//Inserting data into the message table
	$mess = $con->prepare("INSERT INTO Message (subject,body,date_sent)
						   VALUES ($subject, $body, GETDATE())");
	
	echo "Information Added Successfully";
} elseif($_POST['cancel']){
	//go back to login page (link)
	$back = <! a href="Home.html">;
	echo $back;
	
}
$con->close();

?>




<script>
//The Ajax Request to send and compose a message.
document.getElementsByClassName("btn btn-success").onclick = function(){request();};

function request(){
	var request = new XMLHttpRequest();
	var feedback = "Message sent"; 
	
	if(!request){
		alert("Bad Request");
		return false;
	} 
	else{
		request.onreadystatechange = function(){
			if(request.readyState === 4 && request.status === 200){
				//feedback.innerHTML = request.responseText;
				document.getElementsByClassName("modal-body").innerHTML = request.responseText;
			}
			else{
				console.log("Error");
				}
		};
		request.open("POST", "message.php?" +feedback, true);
		request.send();
	}
	
}


</script>