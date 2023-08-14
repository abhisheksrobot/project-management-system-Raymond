<?php
    if(isset($_POST['hournumber'])){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "pms_user";

        
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $hournumber = $_POST['hournumber'];
        $loading = $_POST['loading'];
        $fb = $_POST['fb'];
        $sleevelining = $_POST['sleevelining'];
        $assembly1 = $_POST['assembly1'];
        $assembly2 = $_POST['assembly2'];

        $sql = "INSERT INTO `pms_user`.`dailydata` (`hournumber`, `loading`, `fb`, `sleevelining`, `assembly1`, `assembly2`, `date`) VALUES ('$hournumber', '$loading', '$fb', '$sleevelining', '$assembly1', '$assembly2', current_timestamp());";

        if (mysqli_query($conn, $sql)) {
            echo "data saved";
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
    <link rel="stylesheet" type="text/css" href="PMSpage2.css">
</head>
<body>
    <div class="container">
        <form class="production-form"  action="#" method="post">
            <h1>
                mtm jkt line 3 (sb)
            </h1>
            <div class="form-row">
                <p id="date"></p>
            </div>
            <div class="form-row">
                <label for="hour-number">Hour Number:</label>
                <input type="number" name = "hournumber" id="hournumber" placeholder="Enter hour number" required>
            </div>
            <div class="form-row">
                <label for="loading">Loading:</label>
                <input type="text" name = "loading" id="loading" placeholder="Enter loading" required>
            </div>
            <div class="form-row">
                <label for="F/B">F/B:</label>
                <input type="text" name = "fb" id="fb" placeholder="Enter F/B" required>
            </div>
            <div class="form-row">
                <label for="sleeve-lining">Sleeve lining:</label>
                <input type="text" id="sleevelining" name = "sleevelining" placeholder="Enter sleeve lining" required>
            </div>
            <div class="form-row">
                <label for="assembly1">Assembly 1:</label>
                <input type="text" name = "assembly1" id="assembly1" placeholder="Enter assembly 1" required>
            </div>
            <div class="form-row">
                <label for="assembly2">Assembly 2:</label>
                <input type="text" name = "assembly2" id="assembly2" placeholder="Enter assembly 2" required>
            </div>
            <div class="form-row">
                <button type="submit">
                    Save
                </button>
            </div>
            <div class="form-row">
                    <a href="PMSpage3.php">
                        BREAKDOWN?
                    </a>
            </div>
        </form>
    </div>

    <script>
        var currentDate = new Date();
        var dateElement = document.getElementById('date');
        dateElement.textContent = currentDate.toDateString();
    </script>
</body>
</html>
