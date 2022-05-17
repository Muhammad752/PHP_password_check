<?php
    require_once 'includes/header.php';
?> 
<form action="includes/login-inc.php" method="post">
    <p><input id="name" type="text" name="name" placeholder="UserName" required></p>
    <p><input id="password" type="password" name="password" placeholder="Password" required></p>
    <button type="submit" name="submit">Login</button>
    <button onclick="location.href='register.php'">Register</button>
</form>

<?php
    require_once 'includes/footer.php';
?>