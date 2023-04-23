<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Table using bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css" />
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
                <div class="row my-3">
                    <div class="col-10">
                        <p>STUDENTS</p>
                    </div>
                    <div class="icon col-2">
                        <a href="form.php" class="btn btn-success">ADD STUDENTS</a>
                    </div>
                </div>
                <table class="table">
                    <tr>
                        
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Branch</th>
                        <th>Hostel</th>
                        <th>Additional Subjects</th>
                        <th>Address</th>
                    </tr>
                    <?php
                    $conn = mysqli_connect("localhost", "root", "", "school");
                    $sql = "SELECT * FROM student";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr><td>" . $row['first_name'] . "</td><td>" . $row['last_name'] . "</td><td>" . $row['mobile'] . "</td><td>" . $row['email'] . "</td><td>" . $row['branch'] . "</td><td>" . $row['hostel'] . "</td><td>" . $row['subject'] . "</td><td>" . $row['address'] . "</td>";
                        }
                    } else {
                        echo "No result";
                    }
                    mysqli_close($conn);
                    ?>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>
