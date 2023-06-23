<?php

// CONEXIUNE DB

$con=mysqli_connect("localhost","root","","test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {
    // if the request is POST
	if($_SERVER["REQUEST_METHOD"]=="POST"){ 
		if(!isEmpty()){ // in case of one field empty
			echo "<p style='color: red;'>Complete all the camps of the form</p>"; // print error 
			echo "<script>alert(Complete all the camps of the form)</script>"; // other version 
		}
		else{
			// post methods for every field in form
			$name = $_POST['name']; 
            $email = $_POST['email'];
			$htmlskills = $_POST['html-skill-value'];
			$cssskills = $_POST['css-skill-value'];
			$phpskills = $_POST['php-skill-value'];
			$jsskills = $_POST['js-skill-value'];
            // is email valid ?
			if(!email_validate()){
				echo "<p style='color:red'>Invalid email!</p>";
				echo "<script>alert(Invalid email!)</script>"; // other version
			}else{
				// allowed file extensions
				$allowedTypes = ['image/jpeg', 'image/gif', 'image/png'];
				$fileType = $_FILES['photo']['type'];
                // is another format? 
				if(!in_array($fileType, $allowedTypes)){
					echo "<p style='color: red;'>Not suported file extension</p>";
				}
				else{
					if($htmlskills < 1 || $cssskills < 1 || $phpskills < 1 || $jsskills < 1){
						echo "<p style='color: red;'>Values need to be between 1 and 10.</p>";
					}else{
					// if is the format we are looking put the image in the design folder
					$uploadDir = 'design/';
					$uploadFile = $uploadDir . basename($_FILES['photo']['name']);
					$photoId = uniqid(); // unique ID 
                    // insert in DB 
					if(move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile)){
						$sql = "INSERT INTO  (name, email, skills, photo_id) VALUES ('$name', '$email', '$htmlskills', '$cssskills', '$phpskills', '$jsskills', '$photoId')"; // sql script
					    if(mysqli_query($con, $sql)){
							echo "<p style='color: green;'>Successful added!</p>";
						}else{
							echo "<p style='color: red;'>Error: " . mysqli_error($con) . "</p>";
						}
					}
					else{
						echo "<p style='color: red;'>Image not updated!</p>";
					}
				}
			}	
		}}
			
	}

}

function isEmpty(){
	return empty($_POST['name']) || empty($_POST['email']) || empty($_FILES['photo']) || empty($_POST['skills']);
}
function email_validate(){
	return filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
}


mysqli_close($con);
?>