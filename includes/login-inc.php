<?php

    if(isset($_POST["submit"])){

        require 'database.php';
        
        $username=$_POST["name"];
        $password=$_POST["password"];
        
        if(empty($username) || empty($password)){
            header("Location: ../login.php?error=empty");
            exit();
        }else{
            $sql="SELECT * FROM `users` WHERE username=?";
            $stmt=mysqli_stmt_init($con);

            if(!mysqli_stmt_prepare($stmt,$sql)){
                 header("Location: ../login.php");
                 exit();
            }

            mysqli_stmt_bind_param($stmt,"s",$username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if($row=mysqli_fetch_assoc($result)){
                $passCheck=password_verify($password,$row["password"]);
                if($passCheck==false){
                    header("Location: ../login.php?error=wrongPass1");
                    exit();
                }elseif($passCheck==true){
                    session_start();
                    $_SESSION['sessionId']=$row["Id"];
                    $_SESSION['username']=$row["username"];

                    header("Location: ../index.php?loggedIn");
                    exit();
                }
                else{
                    header("Location: ../login.php?error=wrongPass");
                    exit();
                }
                 
            }else{
                header("Location: ../login.php?error=usernameTaken");
                exit();
            }
        
        }
    }
?>