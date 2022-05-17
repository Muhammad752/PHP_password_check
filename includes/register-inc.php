<?php

    if(isset($_POST["submit"])){

        require 'database.php';
        
        $username=$_POST["name"];
        $password=$_POST["password"];
        $rpassword=$_POST["rPassword"];
        
        
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } 
        else{
            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                $nameErr = "Only letters and white space allowed";
                header("Location: ../login.php?$name=empty");
                exit();
            }
        }   


        if(empty($username) || empty($password) || empty($rpassword)){
            header("Location: ../login.php?error=empty");
            exit();
        }
        elseif($password !== $rpassword){
            header("Location: ../register.php?error=passNotMatch");
            exit();
        }
        else{
            $sql="SELECT username FROM `Users` WHERE username=?";
            $stmt=mysqli_stmt_init($con);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                 header("Location: ../register.php");
                 exit();
            }
            mysqli_stmt_bind_param($stmt,"s",$username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            if($rowCount=mysqli_stmt_num_rows($stmt)>0){
                 header("Location: ../register.php?error=usernameTaken");
                 exit();
            }
             else{
                 $sql="INSERT INTO `users`(`username`, `password`) VALUES (?,?)";
                 $stmt=mysqli_stmt_init($con);
                 if(!mysqli_stmt_prepare($stmt,$sql)){
                    header("Location: ../register.php");
                    exit();
                 }
                 else{
                    $hashedPas=password_hash($password,PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt,"ss",$username,$hashedPas);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);

                    header("Location: ../login.php");
                    exit();
                }
            }
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
?>