<?php

$errors = array();

if(!isset($_POST['fname']) or empty($_POST['fname'])){
    $errors['fname'] = 'Fname is required';
}if(!isset($_POST['lname']) or empty($_POST['lname'])){
    $errors['lname'] = 'Lname is required';
}if(!isset($_POST['gender']) or empty($_POST['gender'])){
    $errors['gender'] = 'Gender is required';
}if(!isset($_POST['username']) or empty($_POST['username'])){
    $errors['username'] = 'Username is required';
}


if(empty($errors)){

    $fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$address = $_POST["address"];
	$country = $_POST["country"];
	$gender = $_POST["gender"];
	$skills = implode(", ", $_POST["skills"]);
	$username = $_POST["username"];
	$password = $_POST["password"];
	$department = $_POST["department"];
	$code = $_POST["code"];

	// $sql = "INSERT INTO user (fname, lname, address, country, gender, skills, username, password, department, code)
	// VALUES ('$fname', '$lname', '$address', '$country', '$gender', '$skills', '$username', '$password', '$department', '$code')";

    $file = fopen('users.txt', 'a');

    fwrite($file, "$fname:$lname:$password:$address:$country:$gender:$skills:$username:$department\n");
    
    fclose($file);
    
    header('location:home.php');


	// if ($conn->query($sql) === TRUE) {
	// 	echo "Thanks " . ($gender == "Male" ? "Mr." : "Miss") . " $fname $lname<br><br>";
	// 	echo "Please Review Your information<br><br>";
	// 	echo "Name: $fname $lname<br><br>";
	// 	echo "Address: $address<br><br>";
	// 	echo "Skills: $skills<br><br>";
	// 	echo "Department: $department";
	// }

}else{
    $errorsStr = json_encode($errors);
    header("location:register.php?errors=$errorsStr");
}


