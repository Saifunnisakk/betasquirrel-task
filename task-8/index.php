<?php
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
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Branch</th>
                        <th>Hostel</th>
                        <th>Additional Subjects</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                    <?php

                    $conn = mysqli_connect("localhost", "root", "", "school");
                    $sql = "SELECT * FROM student";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                            <td><?php echo $row['ID']; ?></td>
                            <td><?php echo $row['first_name']; ?></td>
                            <td><?php echo $row['last_name']; ?></td>
                            <td><?php echo $row['mobile']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['branch']; ?></td>
                            <td><?php echo $row['hostel']; ?></td>
                            <td><?php echo $row['subject']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td>
                  <a class="button" href="edit.php?ID=<?php echo $row['ID'];  ?>">
                    <i class="fa-solid fa-pencil"></i>
                  </a>
                  <a class="button" href="view.php?ID=<?php echo $row['ID'];  ?>">
                    <i class="fa-solid fa-eye"></i>
                  </a>
                  <a class="button" href="delete.php?ID=<?php echo $row['ID'];  ?>" onclick="return confirm('Are you sure to delete?');">
                    <i class="fa-solid fa-trash"></i>
                  </a>


                </td>
              </tr>
            <?php }
                    
          } else { ?>
                     <tr>
                        <td colspan="6">No Records Found!</td>
                     </tr>
                     <?php
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
