
<?php
    require_once 'includes/header.php';
    require 'includes/database.php'
?>

<?php
    if(isset($_SESSION['sessionId'])){
        echo "Logged in successifully<br>";
        $sql="SELECT * FROM users";
        $result=mysqli_query($con,$sql);
        $rowCount=mysqli_num_rows($result);
        if($rowCount>0){
            echo "USERS: "."<br>";
            while($row=mysqli_fetch_assoc($result)){
                echo "&emsp;".$row["username"]."<br>";
            }
        }
    }
    else{
        echo "Home";
    }
?>

<?php
    require_once 'includes/footer.php';
?>