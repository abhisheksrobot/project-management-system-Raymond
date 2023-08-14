<?php
    $username = $_POST['username'];
    $password = $_POST['password'];


    $con = new mysqli("localhost", "root", "","pms_user" );

    if($con->connect_error){
        die("connection to this database failed due to".$con->connect_error);
    }

    else{
        $stmt = $con->prepare("SELECT * FROM user WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt_result = $stmt->get_result();

        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();

            if($data['password'] === $password){
                echo header('Location: PMSpage2.php');
            }

            else{
                echo "<h2>INVALID USERNAME OR PASSWORD</h2>";
            }

        }

        else{
            echo "<h2>INVALID USERNAME PASSWORD</h2>";
        }

    }

?> 