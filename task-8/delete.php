<?php
require('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['ID'])) {
    $ID = $_GET['ID'];
} else {
    $ID = false;
}

if (!$ID && $_SERVER['REQUEST_METHOD'] === 'GET') {
    header("Location: index.php");
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $sql = "DELETE FROM student WHERE id = '$ID'";
        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
        } else {
            echo $conn->error;
        }
        $conn->close();
    }
}