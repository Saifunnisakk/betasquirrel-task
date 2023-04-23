 <!DOCTYPE html>
<html>

<head>
	<title>Form using bootstrap</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
</head>

<body>
	 <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
  <div class="container-fluid justify-content-between">
    <a class="navbar-brand font-weight-bold"href="index.php">
      <img src="images/logo.svg" alt="Logo" width="60" height="70" class="d-inline-block align-text-center" />
      ONE SCHOOL
    </a>
    <a class="navbar-brand" href="#">
      <img class="rounded-circle" src="images/person.webp" alt="profile" width="60" height="60" />
    </a>
  </div>
</nav>

<div class="container-fluid">
  <div class="container_height row">
    <div class="sidebar_border col-2 border-end bg-light">
      <ul class="list-unstyled">
        <li class="my-4 mx-5 font-weight-bold">STUDENTS</li>
        <li class="my-4 mx-5 font-weight-bold">STAFF</li>
        <li class="my-4 mx-5 font-weight-bold">EXAMS</li>
      </ul>
</div>

			<div class="col-10">
				<div class="row-12 my-3 font-weight-bold">STUDENT REGISTRATION</div>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="needs-validation row g-3" method="post" novalidate>
					
					<div class="col-sm-12 col-md-6">
						<label for="first-name" class="form-label">First Name <span class="text-danger">*</span></label>
						<input required class="form-control <?php if (!empty($nameErr)) {
																echo 'is-invalid';
															} ?>" placeholder="Enter student's frist name" id="first-name" type="text" name="first_name" />
						<div class="invalid-feedback"><?php if (!empty($nameErr)) {
															echo $nameErr;
														} else {
															echo 'First name required';
														}
														?></div>
					</div>
					<div class="col-sm-12 col-md-6">
						<label for="last-name" class="form-label ">Last Name <span class="text-danger">*</span></label>
						<input type="text" required class="form-control <?php if (!empty($last_nameErr)) {
																			echo 'is-invalid';
																		} ?>" name="last_name" id="last-name" placeholder="Enter Student's Last Name" />
						<div class="invalid-feedback"><?php
														if (!empty($last_nameErr)) {
															echo $last_nameErr;
														} else {
															echo 'last name required';
														}

														?></div>

					</div>
					<div class="col-sm-12 col-md-6">
						<label for="mobile" class="form-label ">Mobile <span class="text-danger">*</span></label>
						<input required type="tel" class="form-control <?php if (!empty($mobileErr)) {
																			echo 'is-invalid';
																		} ?>" name="mobile" id="mobile" placeholder="Enter Parents's Mobile Number" />
						<div class="invalid-feedback"><?php
														if (!empty($mobileErr)) {
															echo $mobileErr;
														} else {
															echo 'mobile number required';
														}

														?></div>

					</div>
					
					<div class="col-sm-12 col-md-6">
						<label for="email" class="form-label ">Email <span class="text-danger">*</span></label>
						<input required type="email" class="form-control <?php if (!empty($emailErr)) {
																				echo 'is-invalid';
																			} ?>" name="email" id="email" placeholder="Enter Parents's Email ID" />
						<div class="invalid-feedback"><?php
														if (!empty($emailErr)) {
															echo $emailErr;
														} else {
															echo 'email number required';
														}

														?></div>

					</div>
					
					<div class="col-sm-12 col-md-6">
						<label for="branch" class="form-label">Branch <span class="text-danger">*<span></label>
						<select name="branch" id="branch" class="form-select <?php if (!empty($branchErr)) {
																					echo 'is-invalid';
																				} ?>" required>
							<option value="">select your branch</option>
							<option value="computer science">Computr science</option>
							<option value="civil">civil</option>
							<option value="mechanical">Mechanical</option>
							<option value="electrical">Electrical</option>
                            <option value="information technology">Information Technology</option>
                            <option value="Electronics">Electronics</option>
						</select>
						<div class="invalid-feedback"><?php if (!empty($branchErr)) {
															echo $branchErr;
														} else {
															echo 'branch is required';
														}
														?></div>
					</div>
					
					<div class="col-sm-12 col-md-6">
						<label for="hostel" class="form-label d-block">Do you need hostel facility <span class="text-danger">*<span></label>
						<div class="form-check form-check-inline fix">
							<input type="radio" class="form-check-input" id="yes" name="hostel" value="yes" required>
							<label for="yes" class="form-check-label">Yes</label>
						</div>
						<div class="form-check form-check-inline fix">
							<input type="radio" class="form-check-input <?php if (!empty($hostelErr)) {
																			echo 'is-invalid';
																		} ?>" id="no" name="hostel" value="no" required>
							<label for="no" class="form-check-label">NO</label>
							<div class="invalid-feedback  absolute"><?php if (!empty($hostelErr)) {
																		echo $hostelErr;
																	} else {
																		echo 'please select hostel facility';
																	}
																	?></div>
						</div>

					</div>
					
					<div class="col-sm-12 col-md-6">
						<label for="subjects" class="form-label d-block">Additional subjects</label>
						<div class="form-check form-check-inline">
							<input type="checkbox" class="form-check-input" id="cybersecurity" name="subjects[]" value="cybersecurity">
							<label for="cybersecurity" class="form-check-label">Cyber security</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="checkbox" class="form-check-input" id="ai" name="subjects[]" value="Artifical intelegence">
							<label for="ai" class="form-check-label">Artifical intelegence</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="checkbox" class="form-check-input" id="iot" name="subjects[]" value="IOT">
							<label for="iot" class="form-check-label">IOT</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="checkbox" class="form-check-input" id="blockchain" name="subjects[]" value="blockchain">
							<label for="blockchain" class="form-check-label">Block chain</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="checkbox" class="form-check-input" id="robotics" name="subjects[]" value="robotics">
							<label for="robotics" class="form-check-label">Robotics</label>
						</div>
					</div>
					
					<div class="col-sm-12 col-md-6">
						<label for="address" class="form-label d-block">Address <span class="text-danger">*<span></label>
						<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address" value="address" required></textarea>
						<div class="invalid-feedback"><?php if (!empty($textErr)) {
															echo $textErr;
														} else {
															echo 'text area is required';
														}
														?></div>
					</div>
					
					
					<div class="col-sm-12 col-md-6 offset-6 text-end">
						<button class="btn btn-danger btn-md" type="reset">
							<i class="bi bi-reply"></i>
							Reset
						</button>
						<button class="btn btn-success btn-md" type="submit">
							<i class="bi bi-person-plus-fill"></i>
							Submit
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="js/script.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	<script>
		// Example starter JavaScript for disabling form submissions if there are invalid fields
		(() => {
			'use strict'

			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			const forms = document.querySelectorAll('.needs-validation')

			// Loop over them and prevent submission
			Array.from(forms).forEach(form => {
				form.addEventListener('submit', event => {
					if (!form.checkValidity()) {
						event.preventDefault()
						event.stopPropagation()
					}

					form.classList.add('was-validated')
				}, false)
			})
		})()
	</script>
    <?php
	// define variables and set to empty values
	$nameErr = $emailErr = $last_nameErr = $mobileErr = $branchErr = $hostelErr = "";
	$first_name = $email = $last_name = $mobile = $branch = $hostel = $subjects = $subject = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// validate name
		if (empty($_POST["first_name"])) {
			$nameErr = "Name is mandatory";
		} else {
			$first_name = test_input($_POST["first_name"]);
			// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z ]*$/", $first_name)) {
				$nameErr = "Only letters and white space allowed";
			}
		}
		// validate last name
		if (empty($_POST["last_name"])) {
			$last_nameErr = "last name is mandatory";
		} else {
			$last_name = test_input($_POST["last_name"]);
		}
		// validate email
		if (empty($_POST["email"])) {
			$emailErr = "Email is mandatory";
		} else {
			$email = test_input($_POST["email"]);
			// check if email is well-formed
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "Invalid email format";
			}
		}
		// validate mobile
		if (empty($_POST["mobile"])) {
			$mobileErr = "mobile is mandatory";
		} else {
			$mobile = test_input($_POST["mobile"]);
		}
		// validate branch
		if (empty($_POST["branch"])) {
			$branchErr = "branch is mandatory";
		} else {
			$branch = test_input($_POST["branch"]);
		}
		// validate hostel
		if (empty($_POST["hostel"])) {
			$hostelErr = "hostel is mandatory";
		} else {
			$hostel = test_input($_POST["hostel"]);
		}
		//subject
		$subjects = $_POST['subjects'];
		foreach ($subjects as $row) {
			$subject .= $row . ",";
		}

		// validate text area
		if (empty($_POST["address"])) {
			$textErr = "address is mandatory";
		} else {
			$address = test_input($_POST["address"]);
		}

		// if there are no errors, insert data into database
		if (empty($nameErr) && empty($emailErr) && empty($branchErr) && empty($last_nameErr) && empty($hostelErr)) {
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "school";

			// create connection
			$conn = new mysqli($servername, $username, $password, $dbname);

			// check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			// prepare and bind statement
			$stmt = $conn->prepare("INSERT INTO student (first_name, last_name, mobile, email, branch, hostel,subject,address) VALUES (?, ?, ?, ?, ?, ?, ?,?)");
			$stmt->bind_param("ssssssss", $first_name, $last_name, $mobile, $email, $branch, $hostel, $subject, $address);

			// execute statement
			if ($stmt->execute() === TRUE) {
				echo "New record created successfully";
				header("Location: main.php");
				exit();
			} else {
				echo "Error: " . $stmt->error;
			}

			// close statement and connection
			$stmt->close();
			$conn->close();
		}
	}


	function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	?>

</body>

</html>
