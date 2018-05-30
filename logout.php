<?php
session_start();//session is a way to store information (in variables) to be used across multiple pages.
//session_destroy();
unset($_SESSION['login']); 
?>
<?php
$redirect_page='Location: login.php';
header($redirect_page);
?>