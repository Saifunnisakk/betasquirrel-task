<?php
require('db.php');
require('head.php');
?>

<body>
    <?php
    require('navbar.php');
    ?>
    <div class="container-fluid">
  <div class="container_height row">
       <?php
        require('sidebar.php');
        ?>
    <div class="col-10">
				<div class="row-12 my-3 ">
 <h2><u>Update Student Details</u></h2>
                </div>
               
            
            <div>
                <?php
                function sanitizeField($field)
                {
                    $field = trim($field);
                    $field = stripslashes($field);
                    $field = htmlspecialchars($field);
                    return $field;
                }

                if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['ID'])) {
                    $ID = $_GET['ID'];
                } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $ID = $_POST['ID'];
                } else {
                    $ID = false;
                }

                if (!$ID && $_SERVER['REQUEST_METHOD'] === 'GET') {
                    header("Location: index.php");
                } else {
                    $isError = false;
                    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                        $sql = "SELECT * FROM student WHERE id = '$ID'";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();

                        $first_name = $row['first_name'];
                        $last_name = $row['last_name'];
                        $mobile = $row['mobile'];
                        $email = $row['email'];
                        $branch = $row['branch'];
                        $address = $row['address'];
                        $subject = json_decode($row['subject']);
                        $hostel = $row['hostel'];
                    }

                    $nameErr = '';
                    $emailErr = '';
                    $last_nameErr = '';
                    $mobileErr = '';
                    $branchErr = '';
                    $hostelErr = '';
                    $addressError = '';

                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $first_name = sanitizeField($_POST['first_name']);
                        $last_name = sanitizeField($_POST['last_name']);
                        $mobile = sanitizeField($_POST['mobile']);
                        $email = sanitizeField($_POST['email']);
                        $branch = sanitizeField($_POST['branch']);
                        $address = sanitizeField($_POST['address']);
                        $subject = isset($_POST['subject']) ? $_POST['subject'] : [];
                        $hostel = sanitizeField($_POST['hostel']);

                        if (empty($first_name)) {
                            $nameErr = 'First Name is mandatory!';
                            $isError = true;
                        }

                        if (empty($last_name)) {
                            $last_nameErr = 'Last Name is mandatory!';
                            $isError = true;
                        }

                        if (empty($mobile)) {
                            $mobileErr = 'Mobile Number is mandatory!';
                            $isError = true;
                        }

                        if (empty($email)) {
                            $emailErr = 'Email Address is mandatory!';
                            $isError = true;
                        }

                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            $emailErr = "Invalid email format";
                            $isError = true;
                        }

                        if (empty($branch)) {
                            $branchErr = 'Branch is mandatory!';
                            $isError = true;
                        }

                        if (empty($address)) {
                            $addressError = 'Address is mandatory!';
                            $isError = true;
                        }

                        if (!$isError) {
                            $sql = "UPDATE `student` SET `first_name` = '$first_name', `last_name` = '$last_name', `mobile` = '$mobile', `email` = '$email', `branch` = '$branch', `address` = '$address', `subject` = '" . json_encode($subject) . "', `hostel` = '$hostel' WHERE `student`.`id` = '$ID'";

                            if ($conn->query($sql) === true) {
                                echo '<div class="alert alert-success">Student details updated successfully!</div>';
                            } else {
                                echo '<div class="alert alert-danger">Error updating student details: ' . $conn->error . '</div>';
                            }
                        }
                    }
                }
                ?>
                <form class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <div class="form-group">
                        <label class="control-label col-sm-2">First Name:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="first_name" value="<?php echo $first_name ?? ''; ?>" required>
                            <span class="text-danger"><?php echo $nameErr; ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Last Name:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="last_name" value="<?php echo $last_name ?? ''; ?>" required>
                            <span class="text-danger"><?php echo $last_nameErr; ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Mobile:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="mobile" value="<?php echo $mobile ?? ''; ?>" required>
                            <span class="text-danger"><?php echo $mobileErr; ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Email:</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" name="email" value="<?php echo $email ?? ''; ?>" required>
                            <span class="text-danger"><?php echo $emailErr; ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Branch:</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="branch" required>
                                <option value="">Select</option>
                                <option value="CSE" <?php if ($branch === 'CSE') echo 'selected'; ?>>Computr science</option>
                                <option value="Civil" <?php if ($branch === 'Civil') echo 'selected'; ?>>civil</option>
                                <option value="Mech" <?php if ($branch === 'Mech') echo 'selected'; ?>>Mechanical</option>
                                <option value="EEE" <?php if ($branch === 'EEE') echo 'selected'; ?>>Electrical</option>
                                <option value="IT" <?php if ($branch === 'IT') echo 'selected'; ?>>Information Technology</option>
                                <option value="ECE" <?php if ($branch === 'ECE') echo 'selected'; ?>>Electronics</option>
                            </select>
                            <span class="text-danger"><?php echo $branchErr; ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Address:</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" name="address" required><?php echo $address ?? ''; ?></textarea>
                            <span class="text-danger"><?php echo $addressError; ?></span>
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="control-label col-sm-2">Subjects:</label>
                        <div class="col-sm-6">
                            <?php
                            $subject = array('Cyber security', 'Artifical intelegence', 'IOT', 'Block chain', 'Robotics');
                            foreach ($subject as $subject_name) {
                                $checked = in_array($subject_name, $subject) ? 'checked' : '';
                                echo '<label class="checkbox-inline"><input type="checkbox" name="subject[]" value="' . $subject_name . '" ' . $checked . '>' . $subject_name . '</label>';
                            }
                            ?>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="control-label col-sm-2">Hostel:</label>
                        <div class="col-sm-6">
                            <div class="radio">
                                <label><input type="radio" name="hostel" value="Yes" <?php if ($hostel === 'Yes') echo 'checked'; ?>>Yes</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="hostel" value="No" <?php if ($hostel === 'No') echo 'checked'; ?>>No</label>
                            </div>
                            <span class="text-danger"><?php echo $hostelErr; ?></span>
                        </div>
                    </div>
                    <input type="hidden" name="ID" value="<?php echo $ID; ?>">
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-6">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
