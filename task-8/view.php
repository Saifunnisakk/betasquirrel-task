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
        
                <h2><u>View Student Details</u></h2>
            </div>
            <div>
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['ID'])) {
                    $ID = $_GET['ID'];
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
                    $conn->close();
                }
                ?>

            </div>
            <div class="form-container">

                <div class="row-container">
                    <div class="input-container"></div>
                    <div class="input-container"></div>
                </div>

                <div class="row-container">
                    <div class="input-container">
                        <label for="first_name">
                            First Name :
                        </label>
                        <p><?php echo $first_name; ?></p>
                    </div>
                    <div class="input-container">
                        <label for="last_name">
                            Last Name :
                        </label>
                        <p><?php echo $last_name; ?></p>
                    </div>
                </div>
                <div class="row-container">
                    <div class="input-container">
                        <label for="mobile">Mobile :</label>
                        <p><?php echo $mobile; ?></p>
                    </div>
                    <div class="input-container">
                        <label for="email">Email :</label>
                        <p><?php echo $email; ?></p>
                    </div>
                </div>
                <div class="row-container">
                    <div class="input-container">
                        <label for="branch">Branch :</label>
                        <p><?php echo $branch; ?></p>
                    </div>
                    <div class="input-container">
                        <label>Opted for hostel facility :</label>
                        <p><?php echo $hostel == 1 ? 'Yes' : 'No'; ?></p>
                    </div>
                </div>
                <div class="row-container">
                    <div class="input-container">
                        <label>Additional Subjects Opted: </label>
                        <p><?php echo join(', ', $subject); ?></p>
                    </div>
                </div>
                <div class="row-container">
                    <div class="input-container">
                        <label for="address">
                            Permanent Address :
                        </label>
                        <p><?php echo $address; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>

</html>
