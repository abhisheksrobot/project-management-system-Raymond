<?php
    if(isset($_POST['Breakdown'])){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "pms_user";

        
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $Breakdown = $_POST['Breakdown'];
        $Operation = $_POST['Operation'];
        $Machine = $_POST['Machine'];
        $Starttime = $_POST['Starttime'];
        $Endtime = $_POST['Endtime'];

        $sql = "INSERT INTO `pms_user`.`breakdown` (`Breakdown`, `Operation`, `Machine`, `Starttime`, `Endtime`, `date`) VALUES ('$Breakdown', '$Operation', '$Machine', '$Starttime', '$Endtime', current_timestamp());";

        if (mysqli_query($conn, $sql)) {
            echo header('Location: PMSpage2.php');
        } 
        else {
            echo "Error inserting data: " . mysqli_error($conn);
        
        }
          
          mysqli_close($conn);

    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Production Management System - Form</title>
    <link rel="stylesheet" type="text/css" href="PMSpage3.css">
</head>
<body>
    <div class="container">
        <form class="production-form" action="#" method="post">
            <div class="form-row">
                <p id="date"></p>
            </div>
            <div class="form-row">
                <label for="Breakdown-number">Breakdown Number:</label>
                <input type="number" id="Breakdown-number" name = "Breakdown" placeholder="Enter Breakdown number" required>
            </div>
            <div class="form-row">
                <h2>
                    mtm jkt line 3 (sb)
                </h2>
            </div>
            <div class="form-row">
                <label for="operation">Operation:</label>
                <input type="text" id="operation" name= "Operation" placeholder=" " required>
            </div>
            <div class="form-row">
                <label for="machine">Machine:</label>
                <input type="text" id="machine" name = "Machine" placeholder="Enter machine" required>
            </div>
            <div class="form-row">
                <label for="starttime">Start time:</label>
                <input type="text" id="start time" name = "Starttime" placeholder="Enter start time" required>
            </div>
            <div class="form-row">
                <label for="endtime">End time:</label>
                <input type="text" id="endtime" name = "Endtime" placeholder="Enter End time" required>
            </div>
            <div class="form-row">
                <button type="submit">
                    Save
                </button>
            </div>
        </form>
    </div>
</body>
</html>