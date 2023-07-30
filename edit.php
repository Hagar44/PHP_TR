<?php
    $password = $_GET['password'];

    $data = file('users.txt');

    $user = null;

    foreach ($data as $key => $value) {

        $line = explode(':', $value);

        if($password == $line[2]){
            $user = $line;
            break;
        }

    }

    if(!$user){
        header('location:home.php');
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        
    $fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$address = $_POST["address"];
	$country = $_POST["country"];
	$gender = $_POST["gender"];
	$skills = $_POST["skills"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$department = $_POST["department"];
	$code = $_POST["code"];


        $user[0] = $fname;
        $user[1] = $lname;
        $user[3] = $address;
        $user[4] = $country;
        $user[5] = $gender;
        $user[6] = $skills;
        $user[7] = $username;
        $user[8] = $department;

        $data[$key] = implode(':', $user) . "\n";

        $file = fopen('users.txt', 'w');

        foreach ($data as $key => $value) {
            fwrite($file, $value);
        }

        fclose($file);

        header('location:home.php');
    }


?>


<!DOCTYPE html>
<html>
<head>
    <title>Edit</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="container">
        <h2>Edit User</h2>
        <form method="POST">
            <div class="form-group">
                <label for="fname">First Name:</label>
                <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $user[0]; ?>">
            </div>
            <div class="form-group">
                <label for="lname">Last Name:</label>
                <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $user[1]; ?>">
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" name="address" value="<?php echo $user[3]; ?>">
            </div>
            <div class="form-group">
                <label for="country">Country:</label>
                <select class="form-control" id="country" name="country">
                    <option value="">--Select Country--</option>
                    <option value="Egypt" <?php echo $user[4] == "Egypt" ? "selected" : ""; ?>>Egypt</option>
                    <option value="Canada" <?php echo $user[4] == "Canada" ? "selected" : ""; ?>>Canada</option>
                    <option value="UK" <?php echo $user[4] == "UK" ? "selected" : ""; ?>>UK</option>
                    <option value="Australia" <?php echo $user[4] == "Australia" ? "selected" : ""; ?>>Australia</option>
                </select>
            </div>
            <div class="form-group">
                <label>Gender:</label><br>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="gender" value="Male" <?php echo $user[5] == "Male" ? "checked" : ""; ?>>Male
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="gender" value="Female" <?php echo $user[5] == "Female" ? "checked" : ""; ?>>Female
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label>Skills:</label><br>
                <?php 
                    $skills = explode(", ", $user[6]);
?>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="skills[]" value="PHP" <?php echo in_array("PHP", $skills) ? "checked" : ""; ?>>PHP
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="skills[]" value="J23E" <?php echo in_array("J23E", $skills) ? "checked" : ""; ?>>J23E
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="skills[]" value="MySQL" <?php echo in_array("MySQL", $skills) ? "checked" : ""; ?>>MySQL
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="skills[]" value="PostgreSQL" <?php echo in_array("PostgreSQL", $skills) ? "checked" : ""; ?>>PostgreSQL
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $user[7]; ?>">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" value="<?php echo $user[2]; ?>">
            </div>
            <div class="form-group">
                <label for="department">Department:</label>
                <input type="text" class="form-control" id="department" name="department" value="<?php echo $user[8]; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

</body>
</html>