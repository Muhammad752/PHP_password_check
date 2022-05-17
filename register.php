<?php
    require_once 'includes/header.php';
?>  

<form action="includes/register-inc.php" method="post">
    <p><input type="text" name="name" placeholder="UserName" required></p>
    <p><input type="password" name="password" placeholder="Password" required></p>
    <p><input type="password" name="rPassword" placeholder="Repeat Password" required></p>
    <button onclick="location.href='login.php'" >Login</button>
    <button type="submit" name="submit">Register</button>
</form>

<?php
    require_once 'includes/footer.php';
?>