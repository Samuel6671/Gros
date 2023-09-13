<?php
    session_start();

    include("db.php");
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $name = $_POST['username'];
        $address = $_POST['address'];

        if (!empty($name) && !empty($address) && !is_numeric($address)){

            $query = "select * from grocess where address = '$address' limit 1";
            $result = mysqli_query($con,$query);

            if($result){
                if ($result && mysqli_num_rows($result) > 0) {
                
                        $user_data = mysqli_fetch_assoc($result);
                    
                        if($user_data['name'] == $name){
    
                            header("Location: index.php");
                            die;
    
                        }
                }
            }
    
            echo "<script type='text/javascript'> alert('wrong username or password')</script>";

        }else{
            echo "<script type='text/javascript'> alert('wrong username or paassword')</script>";

        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login">
        <h1>Login</h1>
        <h4>It's free and only takes a minute</h4>
        <form method="POST">
            <label>Name</label>
            <input type="name" name="username" required>
            <label>Address</label>
            <input type="address" name="address" required>
            <input type="submit" name="" value="submit">
        </form>
        <p>Haven't ordered yet? <a href="index.php">order here</a></p>
    </div>
</body>
</html>