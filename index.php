<?php
    $insert = 0;
    if(isset($_POST['name']))
    {
        //Set connection variables
        $server = "localhost";
        $username = "root";
        $password = "";


        //Create a database connection
        $con = mysqli_connect($server, $username, $password);

        //Check for connection success
        if(!$con)
        {
            die("connection to this database failed due to".
            mysqli_conncet_error());
        }
        

        //Collect post variables
        $name = $_POST['name'];
        $batch = $_POST['batch'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $desc = $_POST['desc'];


        //Execute Query
        $sql = "INSERT INTO `trip`.`trip` (`name`, `batch`, `age`,
        `gender`, `phone`, `other`, `date`) VALUES ('$name', '$batch',
        '$age', '$gender', '$phone', '$desc', current_timestamp());";
        
        
        //Flag varification
        if($con->query($sql) == true){
            $insert += 1;
        }else{
            $insert -= 1;
            echo "ERROR : $sql <br> $con->error";
        }


        //Close the database connection
        $con->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img src="bg.jpg" alt="UIU" class="bg">
    <div class="container">
        <h1>Welcome to UIU Cox's Bazar Trip form</h1>
        <br>
        <p>Enter your detailes and submit this form to confirm your
            participation in the Trip
        </p>
        <?php
            if($insert == 1){
                echo "<p class='subMsg'>You have successfully submitted your detailes, Thank you</p>";
            }else if($insert == -1){
                echo "<p class='subMsg'>Something is wrong, Please check</p>";
            }
        ?>

        <form action="index.php" class="form" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="batch" id="Batch" placeholder="Enter your Batch">
            <input type="text" name="age" id="Age" placeholder="Enter your Age">
            <input type="text" name="gender" id="Gender" placeholder="Enter your Gender">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone no">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
            <button class="btn">Clear</button>
        </form>
        
    </body>
    <script src="index.js"></script>
</body>
</html>

