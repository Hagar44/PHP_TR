<?php

if(isset($_GET['errors'])){
    $arrErrors = json_decode($_GET['errors'], true);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Form </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
	<form action='save.php' method='POST'>

		<div class="form-group">
			<label for="fname">First Name:</label>
			<input type="text" class="form-control" id="fname" name="fname" placeholder="First Name">
			<span><?php if(isset($arrErrors['fname'])){echo $arrErrors['fname'];} ?></span>
		</div>

		<div class="form-group">
			<label for="lname">Last Name:</label>
			<input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name">
			<span><?php if(isset($arrErrors['lname'])){echo $arrErrors['lname'];} ?></span>
		</div>

		<div class="form-group">
			<label for="address">Address:</label>
			<input type="text" class="form-control" id="address" name="address" placeholder="Address">
		</div>

		<div class="form-group">
			<label for="country">Country:</label>
			<select class="form-control" id="country" name="country">
				<option value="">--Select Country--</option>
				<option value="Egypt">Egypt</option>
				<option value="Canada">Canada</option>
				<option value="UK">UK</option>
				<option value="Australia">Australia</option>
			</select>
		</div>

		<div class="form-group">
			<label>Gender:</label><br>
			<div class="form-check-inline">
				<label class="form-check-label">
					<input type="radio" class="form-check-input" name="gender" value="Male">Male
				</label>
			</div>
			<div class="form-check-inline">
				<label class="form-check-label">
					<input type="radio" class="form-check-input" name="gender" value="Female">Female
				</label>
			</div>
			<span><?php if(isset($arrErrors['gender'])){echo $arrErrors['gender'];} ?></span>
		</div>

		<div class="form-group">
			<label>Skills:</label><br>
			<div class="form-check-inline">
				<label class="form-check-label">
					<input type="checkbox" class="form-check-input" name="skills[]" value="PHP">PHP
				</label>
			</div>
			<div class="form-check-inline">
				<label class="form-check-label">
					<input type="checkbox" class="form-check-input" name="skills[]" value="J23E">J23E
				</label>
			</div>
			<div class="form-check-inline">
				<label class="form-check-label">
					<input type="checkbox" class="form-check-input" name="skills[]" value="MySQL">MySQL
				</label>
			</div>
			<div class="form-check-inline">
				<label class="form-check-label">
					<input type="checkbox" class="form-check-input" name="skills[]" value="PostgreSQL">PostgreSQL
				</label>
			</div>
		</div>

		<div class="form-group">
			<label for="username">Username:</label>
			<input type="text" class="form-control" id="username" name="username" placeholder="Username">
			<span><?php if(isset($arrErrors['username'])){echo $arrErrors['username'];} ?></span>
		</div>

		<div class="form-group">
			<label for="password">Password:</label>
			<input type="password" class="form-control" id="password" name="password" placeholder="Password">
		</div>

		<div class="form-group">
			<label for="department">Department:</label>
			<input type="text" class="form-control" id="department" name="department" placeholder="Department">
		</div>

		<div class="form-group">
			<label for="code">Security Code:</label><br>
			<label style="margin-right: 10px;">Sh489c</label>
			<input type="text" class="form-control" id="code" name="code">
			<span><?php if(isset($arrErrors['code'])){echo $arrErrors['code'];} ?></span>
		</div>

		<button type="submit" class="btn btn-primary">Submit</button>
		<button type="reset" class="btn btn-secondary">Reset</button>

	</form>
</div>

</body>
</html>