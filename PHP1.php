<?php

    $servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "form";
	$conn = new mysqli($servername, $username, $password, $dbname);


	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

	$sql = "INSERT INTO user (fname, lname, address, country, gender, skills, username, password, department, code)
	VALUES ('$fname', '$lname', '$address', '$country', '$gender', '$skills', '$username', '$password', '$department', '$code')";

	if ($conn->query($sql) === TRUE) {
		echo "Thanks " . ($gender == "Male" ? "Mr." : "Miss") . " $fname $lname<br><br>";
		echo "Please Review Your information<br><br>";
		echo "Name: $fname $lname<br><br>";
		echo "Address: $address<br><br>";
		echo "Skills: $skills<br><br>";
		echo "Department: $department";
	}
}
?>